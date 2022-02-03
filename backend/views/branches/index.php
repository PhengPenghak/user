<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Create Branches', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <button type="button" value="<?= Url::to(['branches/create']) ?>" class="btn btn-success triggerModal">Create Branches</button>

     <?php
        Modal::begin([
            'title'=>'Add New Branches',
            'id'=>'modal',
            'size'=>'modal-lg'
        ]);
        echo "<div id='modalContent'></div>";
        Modal::end();
     ?> 

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model){
            if($model->branch_status == 'active'){
                return ['class' => 'danger'];            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'id',
                'label'=>'company_name',
                'value' => 'companiesCompany.company_name',
            ],

            'branch_name',
            'branch_address',
            'branch_created_date',
            'branch_status',
            [
                'class' => ActionColumn::className(),
            ],
        
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
<?php

$script = <<< JS
    $(document).on("click",".triggerModal",function(){
        // alert("hELLO WORLD");
        $("#modal").modal("show").find("#modalContent").load($(this).attr("value"));
    })


JS;
$this->registerJs($script);

?>