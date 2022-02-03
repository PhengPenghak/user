<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Locations;
use backend\assets\Select2;
Select2::register($this);
/* @var $this yii\web\View */
/* @var $model backend\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">
<?php $form = ActiveForm::begin();?>

     <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?> 

    <?php $form = ActiveForm::begin();

        $dataBranches = ArrayHelper::map(Locations::find()->all(),'id','zip_code')    ?>
        <?=
            $form->field($model, 'zip_code')->dropDownList(
            $dataBranches,
            ['prompt' => 'select a Zip Code','class'=>' isSelect2']
        );

      ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

    <?php
        $script = <<< JS
                $('.isSelect2').select2({
                    placeholder: "Select a state",
                    width: "100%",
                });
                JS;
                $this->registerJs($script);

     ?>

