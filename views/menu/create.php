<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model wokster\menu\models\Menu */

$this->title = 'Создать пункт меню';
$this->params['breadcrumbs'][] = ['label' => 'пункты меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
