
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\bootstrap\Tabs;
?>
<div class="product-form">


    <?php $form = ActiveForm::begin(); ?>


    <?= $productForm->errorSummary($form); ?>
    <div class="row" >
    <div class="col-lg-4">
    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Personal Details',
                'content' => $this->render('form1', ['productForm' => $productForm, 'form' => $form]),
                'active' => true
            ],
            [
                'label' => 'Bank Details',
                'content' => $this->render('form2', ['productForm' => $productForm, 'form' => $form]),
            ],
            /*
            [
                'label' => 'Product',
                'content' => $this->render('form3', ['productForm' => $productForm, 'form' => $form]),
            ],
            */
        ]]);
 ?>


</div>
    <?php ActiveForm::end(); ?>
   
</div>