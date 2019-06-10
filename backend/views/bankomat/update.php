<?php

/* @var $this yii\web\View */
/* @var $tag bank\privat\Bankomat */
/* @var $model bank\privat\BankomatForm */

$this->title = 'Редактировать Банкомат: ' . $bankomat->id;
$this->params['breadcrumbs'][] = ['label' => 'Банкоматы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $bankomat->id, 'url' => ['view', 'id' => $bankomat->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="bankomat-update">

    <h1><?= yii\helpers\Html::encode($this->title) ?></h1>
    
    <?= $this->render('_form', [
        'model' => $model,
       
    ]) ?>

</div>
