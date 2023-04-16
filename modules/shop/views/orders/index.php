<?php
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Html;
$this->title = 'Заказы';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">Заказы:</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#new" data-toggle="tab">Новые</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#in_progress" data-toggle="tab">В работе</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#done" data-toggle="tab">Завершённые</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#returns" data-toggle="tab">Возвраты</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="new">
                            <?php
                                Pjax::begin(['id' => 'new']);
                                echo GridView::widget([
                                    'dataProvider' => $dataProvider1,
                                    'filterModel' => $searchModel,
                                    'tableOptions' => [
                                        'class' => 'table table-bordered table-hover'
                                    ],
                                    'columns' => [
                                        'id',
                                        'first_name:ntext',
                                        'name:ntext',
                                        'last_name:ntext',
                                        'company:ntext',
                                        'email:ntext',
                                        'phone:ntext',
                                        'city:ntext',
                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'header'=>'',
                                            'headerOptions' => [
                                                'width' => 110
                                            ],
                                            'template' => '{view}',
                                            'buttons' => [
                                                'view' => function ($url,$model) {
                                                    return Html::a('<i class="material-icons">open_in_new</i>', $url, [
                                                        "rel" => "tooltip",
                                                        "title" => "Перейти в карточку",
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
                        <div class="tab-pane" id="in_progress">
                            <?php
                            Pjax::begin(['id' => 'in_progress']);
                            echo GridView::widget([
                                'dataProvider' => $dataProvider2,
                                'filterModel' => $searchModel,
                                'tableOptions' => [
                                    'class' => 'table table-bordered table-hover'
                                ],
                                'columns' => [
                                    'id',
                                    'first_name:ntext',
                                    'name:ntext',
                                    'last_name:ntext',
                                    'company:ntext',
                                    'email:ntext',
                                    'phone:ntext',
                                    'city:ntext',
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'header'=>'',
                                        'headerOptions' => [
                                            'width' => 110
                                        ],
                                        'template' => '{view}',
                                        'buttons' => [
                                            'view' => function ($url,$model) {
                                                return Html::a('<i class="material-icons">open_in_new</i>', $url, [
                                                    "rel" => "tooltip",
                                                    "title" => "Перейти в карточку",
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
                        <div class="tab-pane" id="done">
                            <?php
                            Pjax::begin(['id' => 'done']);
                            echo GridView::widget([
                                'dataProvider' => $dataProvider3,
                                'filterModel' => $searchModel,
                                'tableOptions' => [
                                    'class' => 'table table-bordered table-hover'
                                ],
                                'columns' => [
                                    'id',
                                    'first_name:ntext',
                                    'name:ntext',
                                    'last_name:ntext',
                                    'company:ntext',
                                    'email:ntext',
                                    'phone:ntext',
                                    'city:ntext',
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'header'=>'',
                                        'headerOptions' => [
                                            'width' => 110
                                        ],
                                        'template' => '{view}',
                                        'buttons' => [
                                            'view' => function ($url,$model) {
                                                return Html::a('<i class="material-icons">open_in_new</i>', $url, [
                                                    "rel" => "tooltip",
                                                    "title" => "Перейти в карточку",
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
                        <div class="tab-pane" id="returns">
                            <?php
                            Pjax::begin(['id' => 'returns']);
                            echo GridView::widget([
                                'dataProvider' => $dataProvider4,
                                'filterModel' => $searchModel,
                                'tableOptions' => [
                                    'class' => 'table table-bordered table-hover'
                                ],
                                'columns' => [
                                    'id',
                                    'first_name:ntext',
                                    'name:ntext',
                                    'last_name:ntext',
                                    'company:ntext',
                                    'email:ntext',
                                    'phone:ntext',
                                    'city:ntext',
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'header'=>'',
                                        'headerOptions' => [
                                            'width' => 110
                                        ],
                                        'template' => '{view}',
                                        'buttons' => [
                                            'view' => function ($url,$model) {
                                                return Html::a('<i class="material-icons">open_in_new</i>', $url, [
                                                    "rel" => "tooltip",
                                                    "title" => "Перейти в карточку",
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
    </div>
</div>
