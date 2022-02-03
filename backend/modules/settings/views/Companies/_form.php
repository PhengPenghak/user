<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\DataPicker;
Datapicker::register($this);
/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\Companies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companies-form">

  <?php $form = ActiveForm::begin(['enableAjaxValidation' => true]); ?>

  <?= $form->field($model, 'id')->textInput() ?>

  <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'company_email')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'company_address')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model,'company_start_date')->textInput(['id'=>'datepicker', 'readonly'=>true])?>

  <?= $form->field($model, 'company_created_date')->textInput() ?>

  <?= $form->field($model, 'company_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

  <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>



  <?php
      $script = <<< JS
          $("#datepicker").keydown(function(){
            return false;
          });
          $(function () {
        $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
        });
        JS;
      $this->registerJs($script); ?>
</div>