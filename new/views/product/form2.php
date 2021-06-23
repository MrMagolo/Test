       <?php
       use yii\helpers\Html;
       ?>
        <?= $form->field($productForm->parcel, 'BankName')->textInput() ?>
        <?= $form->field($productForm->parcel, 'BankBranch')->textInput() ?>
        <?= $form->field($productForm->parcel, 'AccountName')->textInput() ?>
        <?= $form->field($productForm->parcel, 'AccountNumber')->textInput() ?>
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
