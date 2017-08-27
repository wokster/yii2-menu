<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use wokster\menu\models\Menu;

/* @var $this yii\web\View */
/* @var $model wokster\menu\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin([
    ]); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">

                <div class="box-header with-border">
                    <h3 class="box-title">Заполните форму</h3>
                </div>

                <div class="box-body">

                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <?= $form->field($model, 'sort')->textInput() ?>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <?= $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(Menu::find()->andWhere(['parent_id'=>0])->all(),'id','title'),['prompt'=>'Корневая']) ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
  <?php ActiveForm::end(); ?>
</div>
