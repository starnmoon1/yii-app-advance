<?php

use backend\models\Category;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Category */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1>Danh muc </h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
            <p class="pull-right">
                <?= Html::a('Them moi', ['create'], ['class' => 'btn btn-success btn-small']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\CheckboxColumn'],
                    ['attribute' => 'id',
                        'headerOptions' => ['style' => 'width:15px; text-align:center'],
                        'contentOptions' => ['style' => 'width:15px; text-align:center'],
                    ],

                    'name',
                    'slug',
                    ['attribute' => 'parent',
                        'content' => function ($model) {
                            if ($model->parent == 0) {
                                return 'Root';
                            } else {
                                $parent = Category::findOne($model->parent);
                                if ($parent) {
                                    return $parent->name;
                                } else {
                                    return 'khong ro';
                                }

                            }
                        },
                        'headerOptions' => ['style' => 'width:15px; text-align:center'],
                        'contentOptions' => ['style' => 'width:15px; text-align:center'],
                    ],

                    ['attribute' => 'status',
                        'content' => function ($model) {
                            if ($model->status == 0) {
                                return '<span class="label label-danger"> Khong kich hoat</span>';
                            } else {
                                return '<span class="label label-success" > Kich hoat</span>';
                            }
                        },
                        'headerOptions' => ['style' => 'width:15px; text-align:center'],
                        'contentOptions' => ['style' => 'width:15px; text-align:center'],
                    ],
                    [
                        'attribute' => 'created_at',
                        'content' => function ($model) {
                            return  date('d/m/Y', $model->created_at);
                        },
                        'headerOptions' => ['style' => 'width:30px; text-align:center'],
                        'contentOptions' => ['style' => 'width:30px; text-align:center'],
                    ],
                    //'updated_at',

                    ['class' => 'yii\grid\ActionColumn',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('View', $url, ['class' => 'btn btn-xs btn-primary']);
                            },
                            'update' => function ($url, $model) {
                                return Html::a('Edit', $url, ['class' => 'btn btn-xs btn-success']);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('Delete', $url,
                                    ['class' => 'btn btn-xs btn-danger',
                                        'data-confirm' => 'Ban co chac chan muon xoa',
                                        'data-method' => 'post'
                                    ]);
                            },
                        ]
                    ],
                ],
            ]); ?>
        </div>
    </div>


</div>
