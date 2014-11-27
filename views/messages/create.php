<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model AlexanderEmelyanov\yii\modules\i18n\models\Message */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Message',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
