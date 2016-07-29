<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PointMaterials */

$this->title = 'Create Point Materials';
$this->params['breadcrumbs'][] = ['label' => 'Point Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="point-materials-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
