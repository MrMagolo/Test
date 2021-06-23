<?php

/* @var $this yii\web\View */
$this->title = 'Contact';

use yii\bootstrap\Tabs;
use yii\bootstrap\ActiveForm;
?>


<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

<?= Tabs::widget([
        'items' => [
            [
                'label' => 'One',
                'content' => $this->render('contact_form1', ['model' => $model, 'form' => $form]),
                'active' => true
            ],
            [
                'label' => 'Two',
                'content' => $this->render('contact_form2', ['model' => $model, 'form' => $form]),
            ],
            [
                'label' => 'Two',
                'content' => $this->render('contact_form2', ['model' => $model, 'form' => $form]),
            ],
            [
                'label' => 'Two',
                'content' => $this->render('contact_form2', ['model' => $model, 'form' => $form]),
            ],
        ]]);
 ?>
    <?php ActiveForm::end(); ?>
    
    