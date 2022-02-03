<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Companies;
use backend\assets\Select2;
use yii\bootstrap4\Alert;
Select2::register($this);
/* @var $this yii\web\View */
/* @var $model backend\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-form">

  <?php $form = ActiveForm::begin();
    $dataBranches = ArrayHelper::map(Companies::find()->all(),'id','company_name')    ?>
  <?=
            $form->field($model, 'companies_company_id')->dropDownList(
            $dataBranches,
            ['prompt' => 'select company','class'=>' isSelect2']
        );
        ?>
  <?= $form->field($model, 'branch_name')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'branch_address')->textInput(['maxlength' => true]) ?>


  <?= $form->field($model, 'branch_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => 'status']) ?>

  <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>


  <?php
      $script = <<< JS
              $('.isSelect2').select2({
                  placeholder: "Select a state",
                  width: "100%",
              });
              JS;
              $this->registerJs($script);

          ?>
</div>