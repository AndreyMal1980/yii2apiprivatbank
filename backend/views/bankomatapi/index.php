<style>
    h1{
        text-align: center;
    }

    #before-load {
        position: fixed; /*фиксированное положение блока*/
        left: 0; /*положение элемента слева*/
        top: 0; /*положение элемента сверху*/
        right: 0; /*положение элемента справа*/
        bottom: 0; /*положение элемента снизу*/
        background: #fff; /*цвет заднего фона блока*/
        z-index: 1001; /*располагаем его над всеми элементами на странице*/
    }
    #before-load i {
        font-size: 70px; /*размер иконки*/
        position: absolute; /*положение абсолютное, позиционируется относительно его ближайшего предка*/
        left: 50%; /*слева 50% от ширины родительского блока*/
        top: 50%; /*сверху 50% от высоты родительского блока*/
        margin: -35px 0 0 -35px; /*смещение иконки, чтобы она располагалась по центру*/
    }
</style>
<?php
$this->title = 'Bankomats';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><b> Обновить список банкоматов</b></h1>

<?php $form = yii\widgets\ActiveForm::begin(['id' => 'update-bankomat-form']) ?>

        <?= yii\helpers\Html::submitButton('Обновить список банкоматов', ['class' => 'btn btn-lg btn-success']); ?>

<?php yii\widgets\ActiveForm::end() ?>

