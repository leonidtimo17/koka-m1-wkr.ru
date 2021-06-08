<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
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
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            'timestamp',
//            'idUser',
            //'idCategory',
            'status',
            //'photoBefore',
            //'photoAfter',
            //'reason:ntext',
            //'address',
            //'maxprice',

            [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{cancel} {solve} {action}',
                    'buttons' => [
                            'cancel' => function ($url, $model){
                                if ($model->status == 'Новая'){
                                    return Html::a('Отремонтировано', ['/request/cancel', 'id' => $model->id]);
                                }
                            },
                            'solve' => function ($url, $model){
                                if ($model->status == 'Новая'){
                                    return Html::a('Ремонтируется', ['/request/solve', 'id' => $model->id]);
                                }
                            },
                            'action' => function ($url, $model){
                                if ($model->status == 'Ремонтируется'){
                                    return Html::a('Отремонтировано', ['/request/action', 'id' => $model->id]);
                                }
                            },
                    ]
            ],
        ],
    ]); ?>


</div>
