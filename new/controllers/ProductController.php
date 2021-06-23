<?php
namespace app\controllers;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\form\ProductForm;
use app\models\Product;
use Yii;


class ProductController extends Controller
{
    public function actionCreate()
    {
        
        $productForm = new ProductForm();
        $productForm->product = new Product;
        $productForm->setAttributes(Yii::$app->request->post());
        if (Yii::$app->request->post() && $productForm->save()) {
            Yii::$app->getSession()->setFlash('success', 'Contact has been created.');
            return $this->redirect(['update', 'id' => $productForm->product->id]);
        } elseif (!Yii::$app->request->isPost) {
            $productForm->load(Yii::$app->request->get());
        }
        return $this->render('create', ['productForm' => $productForm]);
    }

    
    public function actionUpdate($id)
    {
        $productForm = new ProductForm();
        $productForm->product = $this->findModel($id);
        $productForm->setAttributes(Yii::$app->request->post());
        if (Yii::$app->request->post() && $productForm->save()) {
            Yii::$app->getSession()->setFlash('success', 'Product has been updated.');
            return $this->redirect(['update', 'id' => $productForm->product->id]);
        } elseif (!Yii::$app->request->isPost) {
            $productForm->load(Yii::$app->request->get());
        }
        return $this->render('update', ['productForm' => $productForm]);
    }
    
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }
        throw new HttpException(404, 'The requested page does not exist.');
    }
}