<?php

/* @var $this yii\web\View */
/* @var $model bank\privat\BankomatForm */

$this->title = 'Создать Новый Банкомат';
$this->params['breadcrumbs'][] = ['label' => 'Список Банкоматов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bankomat-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
