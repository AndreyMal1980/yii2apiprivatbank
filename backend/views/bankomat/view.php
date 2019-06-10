<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $tag bank\entities\Bankomat */
  
 

$this->title = $bankomat->id;
$this->params['breadcrumbs'][] = ['label' => 'Список Банкоматов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bankomat-view">

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $bankomat->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $bankomat->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <h1><?= Html::encode($this->title) ?></h1>
    
            <?= DetailView::widget([
                'model' => $bankomat,
                'attributes' => [
                    'id',
                    'type',
                    'cityRU',
                    'cityUA',
                    'cityEN',
                    'fullAddressRu',
                    'fullAddressUa',
                    'fullAddressEn',
                    'placeRu',
                    'placeUa',
                    'latitude',
                    'longitude'
                ],
            ]) ?>
        </div>
 
