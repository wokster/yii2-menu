<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model wokster\menu\models\Menu */

$this->title = 'Редактировать пункт меню: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'пункты меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="menu-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
