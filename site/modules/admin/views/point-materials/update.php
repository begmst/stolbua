<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PointMaterials */

$this->title = 'Update Point Materials: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Point Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="point-materials-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
