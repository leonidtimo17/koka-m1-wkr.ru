<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создание заявки', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'name',
            'timestamp',
            'address',
            'description:ntext',
//            'idUser',
//            'idCategory',
            [
                    'attribute' => 'idCategory',
                    'value' => 'category.name'
            ],
            //'photoBefore',
//            'photoAfter',
            //'reason:ntext',

            'maxprice',
            'status',

            [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {delete}',

            ],
        ],
    ]); ?>


</div>
