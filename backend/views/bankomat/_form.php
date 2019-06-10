<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model bank\private\forms\BancomatForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bankomat-form">

     <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cityRU')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cityUA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cityEN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fullAddressRu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fullAddressUa')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fullAddressEn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'placeRu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'placeUa')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>
    
    
    <?php 
   /* echo '<pre>';
    print_r($bankomat);
     echo '</pre>';*/
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
