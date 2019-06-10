<?php

use bank\privat\entities\Bankomat;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\forms\Shop\TagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Банкоматы';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><b> Банкоматы Приват Банка </b></h1>

<div class="bamkomats">

    <p>
        <?= Html::a('Создать Банкомат', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'attribute' => 'id',
                'value' => function (Bankomat $model) {
                    return Html::a(Html::encode($model->id), ['view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            [
                'label' => "Тип",
                'attribute' => 'type',
            ],
            [
                'label' => 'Город',
                'attribute' => 'cityRU',
            ],
          /*  [
                'label' => 'Город',
                'attribute' => 'cityUA',
            ],
            [
                'label' => 'Город',
                'attribute' => 'cityEN',
            ],*/
            [
                'label' => 'Адресс',
                'attribute' => 'fullAddressRu',
            ],
          /* [
                'label' => 'Адресс',
                'attribute' => 'fullAddressUa',
            ],
            [
                'label' => 'Адресс',
                'attribute' => 'fullAddressEn',
            ],*/
            [
                'label' => 'Место',
                'attribute' => 'placeRu',
            ],
           /* [
                'label' => 'Место',
                'attribute' => 'placeUa',
            ],*/
            [
                'label' => 'Широта',
                'attribute' => 'latitude',
            ],
            [
                'label' => 'Долгота',
                'attribute' => 'longitude',
            ],
            ['class' => ActionColumn::class],
        ],
    ]);
    ?>
</div>


