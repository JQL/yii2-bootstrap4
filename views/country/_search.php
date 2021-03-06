<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CountrySearch */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="country-search">

  <?php
  $form = ActiveForm::begin([
      'action' => ['index'],
      'method' => 'get',
      'options' => [
        'data-pjax' => 1
      ],
  ]);
  ?>

  <?= $form->field($model, 'code') ?>

  <?= $form->field($model, 'name') ?>

  <?= $form->field($model, 'population') ?>

  <div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
