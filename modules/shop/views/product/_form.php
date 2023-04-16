<?php

use app\models\Categories;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$template = '
        <div class="row">
            <div class="col-md-6">
                <div class="input-group input-group-dynamic mb-4">
                    <label class="form-label">{label}</label>
                    {input}
                </div>
            </div>
            <div class="col-md-4">{error}</div>
        </div>
        ';
?>
<?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
]); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput()?>
            <?= $form->field($model, 'cat_id')->dropDownList(Categories::cats())?>
            <?= $form->field($model, 'article')->textInput()?>
            <?= $form->field($model, 'status')->dropDownList([1 => 'Активный',0 => 'В архив'])?>
            <?= $form->field($model, 'price')->textInput()?>
            <?= $form->field($model, 'count')->textInput()?>
            <?= $form->field($model, 'summary')->textarea()?>
            <?= $form->field($model, 'meta_description')->textarea()?>
            <?= $form->field($model, 'description', [
                    'template' => '{label}<br>{input}'
            ])->textarea(['id' => 'editor'])?>
        </div>
        <div class="col-md-6">
            <h4>Фотографии товара</h4>
            <?php $images = $model->getImages();?>
            <?php if (count($images) > 0) {?>
                <section class="gallery">
                    <?php $i = 0; foreach ($images as $image) {?>
                        <div class="gallery__item">
                            <input type="radio" id="img-<?= $i?>" checked name="gallery" class="gallery__selector"/>
                            <img class="gallery__img" src="<?= $image?>" alt=""/>
                            <label for="img-<?= $i?>" class="gallery__thumb"><img src="<?= $image?>" alt=""/></label>
                        </div>
                    <?php $i++; }?>
                </section>
            <?php }?>
            <div class="addFile">
                <?= $form->field($uploadModel, 'files[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
</div>

<style>
    * {
        box-sizing: border-box;
    }
    img {
        max-width: 100%;
        vertical-align: top;
    }
    .gallery {
        display: flex;
        margin: 10px auto;
        max-width: 600px;
        position: relative;
        padding-top: 66.6666666667%;
    }
    @media screen and (min-width: 600px) {
        .gallery {
            padding-top: 400px;
        }
    }
    .gallery__img {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }
    .gallery__thumb {
        padding-top: 6px;
        margin: 6px;
        display: block;
    }
    .gallery__selector {
        position: absolute;
        opacity: 0;
        visibility: hidden;
    }
    .gallery__selector:checked + .gallery__img {
        opacity: 1;
    }
    .gallery__selector:checked ~ .gallery__thumb &gt;
    img {
        box-shadow: 0 0 0 3px #0be2f6;
    }
</style>

<?php ActiveForm::end(); ?>
