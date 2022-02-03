<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Companies;
use backend\models\Branches;

/* @var $this yii\web\View */
/* @var $model backend\models\Departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>
   
   <?= $form->field($model, 'companies_company_id')->dropDownList(
        ArrayHelper::map(Companies::find()->all(), 'id', 'company_name'),
        ['prompt'=>'Select Company',
        'onchange'=>'
        $.post( "index.php?r=branches/lists&id='.'"+$(this).val(),function(data){
            $("select#departments-branches_branch_id").html(data);
        });'
    
    ]); ?>

   
   <?= $form->field($model, 'branches_branch_id')->dropDownList(
        ArrayHelper::map(Branches::find()->all(), 'id', 'branch_name'),
        ['prompt'=>'Select Branch',
    ]); ?>
   
    <?= $form->field($model, 'departments_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'departments_status')->dropDownList([ 'áctive' => 'Áctive', 'incative' => 'Incative', ], ['prompt' => 'status']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
