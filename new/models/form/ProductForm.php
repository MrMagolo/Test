<?php
namespace app\models\form;

use app\models\Product;
use app\models\Parcel;
use Yii;
use yii\base\Model;
use yii\widgets\ActiveForm;

class ProductForm extends Model
{
    private $_product;
    private $_parcel;

    public function rules()
    {
        return [
            [['Product'], 'required'],
            [['Parcel'], 'safe'],
        ];
    }

    public function afterValidate()
    {
        $error = false;
        if (!$this->product->validate()) {
            $error = true;
        }
        if (!$this->parcel->validate()) {
            $error = true;
        }
        if ($error) {
            $this->addError(null); // add an empty error to prevent saving
        }
        parent::afterValidate();
    }

    public function save()
    {
        if (!$this->validate()) {
            return false;
        }
        $transaction = Yii::$app->db->beginTransaction();
        if (!$this->product->save()) {
            $transaction->rollBack();
            return false;
        }
        $this->parcel->product_id = $this->product->id;
        if (!$this->parcel->save(false)) {
            $transaction->rollBack();
            return false;
        }
        $transaction->commit();
        return true;
    }

    public function getProduct()
    {
        return $this->_product;
    }

    public function setProduct($product)
    {
        if ($product instanceof Product) {
            $this->_product = $product;
        } else if (is_array($product)) {
            $this->_product->setAttributes($product);
        }
    }

    public function getParcel()
    {
        if ($this->_parcel === null) {
            if ($this->product->isNewRecord) {
                $this->_parcel = new Parcel();
                $this->_parcel->loadDefaultValues();
            } else {
                $this->_parcel = $this->product->parcel;
            }
        }
        return $this->_parcel;
    }

    public function setParcel($parcel)
    {
        if (is_array($parcel)) {
            $this->parcel->setAttributes($parcel);
        } elseif ($parcel instanceof Parcel) {
            $this->_parcel = $parcel;
        }
    }

    public function errorSummary($form)
    {
        $errorLists = [];
        foreach ($this->getAllModels() as $id => $model) {
            $errorList = $form->errorSummary($model, [
                'header' => '<p>Please fix the following errors for <b>' . $id . '</b></p>',
            ]);
            $errorList = str_replace('<li></li>', '', $errorList); // remove the empty error
            $errorLists[] = $errorList;
        }
        return implode('', $errorLists);
    }

    private function getAllModels()
    {
        return [
            'Product' => $this->product,
            'Parcel' => $this->parcel,
        ];
    }
    
}