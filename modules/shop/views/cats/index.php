<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
$this->title = 'Категории';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Категории</h4>
                </div>
                <div class="card-body table-responsive">
                    <?php
                    Pjax::begin(['id' => 'cats']);
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'tableOptions' => [
                            'class' => 'table table-bordered table-hover'
                        ],
                        'columns' => [
                            'id',
                            'name:ntext',
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
                                            "title" => "Перейти в категорию",
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
