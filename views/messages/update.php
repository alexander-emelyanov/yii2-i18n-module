<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model AlexanderEmelyanov\yii\modules\i18n\models\Message */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Message',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'language' => $model->language]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="message-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
