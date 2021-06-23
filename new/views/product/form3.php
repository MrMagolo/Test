
<?php

$script = <<< JS
$(function() {
    $("[name=toggler]").click(function(){
            $('.toHide').hide();
            $("#blk-"+$(this).val()).show('slow');
    });
 });

JS;

$this->registerJs($script);

?>
<label><input id="rdb1" type="radio" name="toggler" value="1" />Bridge Financing</label>
<label><input id="rdb2" type="radio" name="toggler" value="2" />Investment Fund Placement</label>

<div id="blk-1" class="toHide" style="display:none">
        <?= $form->field($productForm->product, 'FirstName')->textInput() ?>
        <?= $form->field($productForm->product, 'LastName')->textInput() ?>
        <?= $form->field($productForm->product, 'IdNumber')->textInput() ?>
        <?= $form->field($productForm->product, 'Email')->textInput() ?>
</div>
<div id="blk-2" class="toHide" style="display:none">
        <?= $form->field($productForm->product, 'PostalCode')->textInput() ?>
        <?= $form->field($productForm->product, 'City')->textInput() ?>
        <?= $form->field($productForm->product, 'Region')->textInput() ?>
        <?= $form->field($productForm->product, 'Country')->textInput() ?>
</div>



