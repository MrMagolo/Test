<?php
use yii\helpers\ArrayHelper;
use app\models\Product;
use app\models\ProductForm;
?>
       <?= $form->field($productForm->product, 'FirstName')->textInput() ?>
        <?= $form->field($productForm->product, 'LastName')->textInput() ?>
        <?= $form->field($productForm->product, 'IdNumber')->textInput() ?>
        <?= $form->field($productForm->product, 'Email')->textInput() ?>
        <?= $form->field($productForm->product, 'PhoneNumber')->textInput() ?>
        <?= $form->field($productForm->product, 'PostalAdress')->textInput() ?>
        <?= $form->field($productForm->product, 'PostalCode')->textInput() ?>
        <?= $form->field($productForm->product, 'City')->textInput() ?>
        <?= $form->field($productForm->product, 'Region')->textInput() ?>
        <?= $form->field($productForm->product, 'Country')->textInput() ?>
        <?php
    $a= ['0' => 'Kenya', '1' => 'Uganda','2' => 'Tanzania','3' => 'Ethiopia','4' => 'Egypt','5' => 'Madagascar','6' => 'Burundi','7' => 'South Africa','8' => 'Djibouti'];
    echo $form->field($productForm, 'Product')->dropDownList($a,['prompt'=>'Select Option']);
?>
