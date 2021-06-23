
<?php
use kartik\tabs\TabsX;
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
<?
    echo TabsX::widget([
    'position' => TabsX::POS_ABOVE,
    'align' => TabsX::ALIGN_LEFT,
    'items' => [
        [
            'label' => 'One',
            'content' => 'Anim pariatur cliche...',
            'active' => true
        ],
        [
            'label' => 'Two',
            'content' => 'Anim pariatur cliche...',
            'headerOptions' => ['style'=>'font-weight:bold'],
            'options' => ['id' => 'myveryownID'],
        ],
        [
            'label' => 'Dropdown',
            'items' => [
                 [
                     'label' => 'DropdownA',
                     'content' => 'DropdownA, Anim pariatur cliche...',
                 ],
                 [
                     'label' => 'DropdownB',
                     'content' => 'DropdownB, Anim pariatur cliche...',
                 ],
            ],
        ],
    ],
]);?>

    <code><?= __FILE__ ?></code>
</div>
