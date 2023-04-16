<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
$this->title = 'Товары';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Товары</h4>
                    <p class="card-category">Список товаров в статусе (активные, урхивные)</p>
                    <a class="btn btn-success" href="/shop/product/create">Добавить товар</a>
                </div>
                <div class="card-body table-responsive">
                    <?php
                    Pjax::begin(['id' => 'products']);
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'tableOptions' => [
                            'class' => 'table table-bordered table-hover'
                        ],
                        'columns' => [
                            [
                                'class' => 'yii\grid\CheckboxColumn',
                            ],
                            'id',
                            'name:ntext',
                            'price:ntext',
                            'status:ntext',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header'=>'',
                                'headerOptions' => [
                                    'width' => 130
                                ],
                                'template' => '{view} {update} {delete}',
                                'buttons' => [
                                    'view' => function ($url,$model) {
                                        return Html::a('<i class="material-icons">open_in_new</i>', $url, [
                                            "rel" => "tooltip",
                                            "title" => "Перейти в карточку",
                                            "class" => "btn btn-primary btn-link btn-sm",
                                            "style" => "padding: 3px;"
                                        ]);
                                    },
                                    'update' => function ($url,$model) {
                                        return Html::a('<i class="material-icons">edit_document</i>', $url, [
                                            "rel" => "tooltip",
                                            "title" => "Редактировать товар",
                                            "class" => "btn btn-primary btn-link btn-sm",
                                            "style" => "padding: 3px;"
                                        ]);
                                    },
                                    'delete' => function ($url,$model) {
                                        return Html::a('<i class="material-icons">delete</i>', $url, [
                                            "rel" => "tooltip",
                                            "title" => "Удалить товар",
                                            "class" => "btn btn-primary btn-link btn-sm",
                                            "style" => "padding: 3px;"
                                        ]);
                                    },
                                ],
                            ],
                        ],
                    ]);
                    Pjax::end();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="actions">
    <span class="left">
        Выберите товары
    </span>
    <span class="right">
        <span class="left">
            <button type="button" disabled class="btn btn-sm btn-danger" onclick="deleteProducts()">Удалить</button>
        </span>
        <span class="left">
            <button type="button" disabled class="btn btn-sm btn-warning" onclick="archiveProducts()">В архив</button>
        </span>
        <span class="left">
            <button type="button" disabled class="btn btn-sm btn-success" onclick="unArchiveProducts()">Активировать</button>
        </span>
    </span>
</div>
<style>
    .actions {
        position: fixed;
        z-index: 99999;
        background: #fff;
        width: 100%;
        bottom: 0px;
        left: 260px;
        padding: 10px;
    }
</style>