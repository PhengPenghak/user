<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Locations;
use phpDocumentor\Reflection\Location;
use backend\assets\Select2;
Select2::register($this);
/* @var $this yii\web\View */
/* @var $model backend\models\Locations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="locations-form">

  <?php $form = ActiveForm::begin(); 
       $dataBranches = ArrayHelper::map(Locations::find()->all(),'id','zip_code')    ?>
  <?=
            $form->field($model, 'zip_code')->dropDownList(
            $dataBranches,
            ['prompt' => 'select Zip Code','class'=>' isSelect2']
        );
        ?>
  <!-- <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true]) ?> -->


  <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

  <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>
  <?php
      $script = <<< JS
              $('.isSelect2').select2({
                  placeholder: "Select a state",
                  width: "100%",
                  'id'=>'zipCode'
              });
              JS;
              $this->registerJs($script);

          ?>
</div>
<?php

$script = <<< JS 
    
  // here you right all your javascript stuff

    $('#zipcode') .change(function(){
        var zipCode = $(this).val{
            Alert(zipCode);
        }
    //    alert(); 
        $.get('index.php?r=locations/get-city-province',{})
    });
    JS;
    $this registerJS($script);
?>