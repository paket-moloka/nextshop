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
            <?php $form = ActiveForm::begin(['action' => 'edit?id='.$model->id]);?>
            <button class="btn btn-success">Сохранить</button>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php
                echo $form->field($model, 'name')->textInput();
                echo $form->field($model, 'price')->textInput();
                echo $form->field($model, 'count')->textInput();
                echo $form->field($model, 'article')->textInput();
                echo $form->field($model, 'cat_id')->dropDownList(Products::getCats());
                echo $form->field($model, 'summary')->textarea();
                echo $form->field($model, 'meta_description')->textarea();
                echo $form->field($model, 'description')->textarea(['rows' => 7]);
                ActiveForm::end();
            ?>
        </div>
        <div class="col-md-6">
            <?php
            foreach ($model->getFeatures() as $feature) {
                echo "<p><b>".$feature['feature']->name."</b> ".$feature['value']->value." <a href='/shop/product/remove-feature?id=".$model->id."&feature_id=".$feature['map']->id."'><i class='material-icons'>delete</i></a></p>";
            }
            echo "<hr/>";
            $mapModel = new \app\models\ProductsFeaturesValuesMap();
            $form = ActiveForm::begin([
                'action' => 'add-feature?id='.$model->id,
                'fieldConfig' => [
                    'template' => "{input}"
                ],
            ]);
            echo $form->field($mapModel, 'product_id')->hiddenInput(['value' => $model->id]);
            ?>
            <div class="row">
                <div class="col-md-12">
                    <h4>Добавить параметр</h4>
                </div>
                <div class="col-md-5">
                    <p>Название</p>
                    <?= $form->field($mapModel, 'feature_id')->dropDownList(Products::getFeaturesList());?>
                </div>
                <div class="col-md-5">
                    <p>Значение</p>
                    <?= $form->field($mapModel, 'feature_value_id')->dropDownList(Products::getFeatureValuesList())?>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-success btn-sm">OK</button>
                </div>
            </div>
            <?php
            ActiveForm::end();
            ?>
        </div>
    </div>
</div>