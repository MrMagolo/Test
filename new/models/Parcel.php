<?php
namespace app\models;

use \yii\db\ActiveRecord;

class Parcel extends ActiveRecord
{
    public static function tableName()
    {
        return 'bank';
    }
    
    public function rules()
    {
        return [
            [['BankName', 'BankBranch', 'AccountName', 'AccountNumber'], 'required'],
            [['client_id'], 'exist', 
              'skipOnError' => true, 
              'targetClass' => Product::className(), 
              'targetAttribute' => ['client_id' => 'id']]
        ];
    }
    
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'client_id']);
    }
}