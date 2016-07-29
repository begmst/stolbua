<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Points */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="points-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ref_user_id')->textInput() ?>

    <?= $form->field($model, 'ref_organization_id')->textInput() ?>

    <?= $form->field($model, 'ref_point_material_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitute')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitute')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'added_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
