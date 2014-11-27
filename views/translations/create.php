<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model AlexanderEmelyanov\yii\modules\i18n\models\SourceMessage */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Source Message',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Source Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-message-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
