<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<div class="row" >
<div class="col-lg-5">
<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
<?= $form->field($model, 'BankName') ?>
<?= $form->field($model, 'BankBranch') ?>
<?= $form->field($model, 'AccountName') ?>
<?= $form->field($model, 'AccountNumber') ?>
<
<div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>
    <?php ActiveForm::end(); ?>
    </div>
    </div>