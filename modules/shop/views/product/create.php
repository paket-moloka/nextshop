<?php
use yii\helpers\Html;

$this->title = 'Создание товара';
?>
<div class="container-fluid" style="background: #fff">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <?= $this->render('_form', [
        'model' => $model,
        'uploadModel' => $uploadModel,
    ]) ?>

</div>