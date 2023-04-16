<?php
use yii\widgets\ActiveForm;
use app\models\Products;

$this->title = $model->name;
?>
<div class="container-fluid" style="background: #fff">
    <div class="row">
        <div class="col-md-12">
            <h2><?= $model->name?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php
            $form = ActiveForm::begin(['action' => 'edit?id='.$model->id]);
            ?>
            <button class="btn btn-success">Сохранить</button>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php
            echo $form->field($model, 'name')->textInput();
            echo $form->field($model, 'meta_title')->textarea();
            echo $form->field($model, 'meta_keywords')->textarea();
            echo $form->field($model, 'meta_description')->textarea();
            echo $form->field($model, 'description')->textarea();
            ActiveForm::end();
            ?>
        </div>
    </div>
</div>