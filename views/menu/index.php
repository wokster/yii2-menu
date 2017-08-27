<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel wokster\menu\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'пункты меню';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index row">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="col-xs-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <span class="label label-default">записей <?= $dataProvider->getCount()?> из <?= $dataProvider->getTotalCount()?></span>
              <div class="box-tools pull-right">
                <?=Html::a(\rmrevin\yii\fontawesome\FA::icon('plus'),\yii\helpers\Url::toRoute('/menu/menu/create'),['class'=>'btn btn-box-tool'])?>
              </div>
            </div>
            <div class="box-body">
                        <?= GridView::widget([
            'summary' => '',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            'parent_id',
            'url:url',
            ['attribute'=>'visibility', 'value'=>'visibility', 'filter'=>[1=>'Виден',3=>'Не виден']],
            'sort',

                        ['class' => 'yii\grid\ActionColumn',
                        'template'=>'{update}{hide}{delete}',
                        'buttons'=>[
                            'hide'=>function($url, $model){                            
                                $icon = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
                                $text = 'cкрыть';
                                if($model->sort < 0){
                                $icon = '<i class="fa fa-eye" aria-hidden="true"></i>';
                                $text = 'показать';
                                }
                                return Html::a($icon, $url, [
                                    'class' => '',
                                    'data-pjax' => '1',
                                    'title' => $text,
                                    'data' => [
                                    'confirm' => 'Вы хотите скрыть этот пункт меню?',
                                    'method' => 'post',
                                    ],
                                ]);
                                },
                        ],
                    ],
                    ],
                ]); ?>
                        </div>
        </div>
    </div>
</div>
<div>