<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
$this->title = 'Пользователи';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Пользователи</h4>
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
                            'id',
                            'login:ntext',
                            [
                                'attribute' => 'name',
                                'value' => function ($data) {
                                    return $data->getParams()['name'];
                                }
                            ],
                            [
                                'attribute' => 'role',
                                'value' => function ($data) {
                                    return $data->getRole();
                                }
                            ],
                            [
                                'attribute' => 'status',
                                'value' => function ($data) {
                                    return $data->getStatus();
                                }
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header'=>'',
                                'headerOptions' => [
                                    'width' => 110
                                ],
                                'template' => '{view} {delete}',
                                'buttons' => [
                                    'view' => function ($url,$model) {
                                        if ($model->status == \app\models\Users::STATUS_ACTIVE) {
                                            return Html::a('<i class="material-icons">lock_person</i>', '/shop/users/block?id='.$model->id, [
                                                "rel" => "tooltip",
                                                "title" => "В бан",
                                                "class" => "btn btn-danger btn-link btn-sm",
                                                "style" => "padding: 3px;"
                                            ]);
                                        } else {
                                            return Html::a('<i class="material-icons">lock_clock</i>', '/shop/users/unblock?id='.$model->id, [
                                                "rel" => "tooltip",
                                                "title" => "Разблокировать",
                                                "class" => "btn btn-success btn-link btn-sm",
                                                "style" => "padding: 3px;"
                                            ]);
                                        }
                                    },
                                    'delete' => function ($url,$model) {
                                        return Html::a('<i class="material-icons">delete</i>', $url, [
                                            "rel" => "tooltip",
                                            "title" => "Удалить пользователя",
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
