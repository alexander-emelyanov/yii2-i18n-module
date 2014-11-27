<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @author Alexander Emelyanov
 * @date 27nov2014
 * @place Moscow, Russia
 * @var $this yii\web\View
 * @var $model AlexanderEmelyanov\yii\modules\i18n\models\SourceMessage
 * @var $relatedModels AlexanderEmelyanov\yii\modules\i18n\models\Message[]
 *      ex.: ['en-US' => AlexanderEmelyanov\yii\modules\i18n\models\Message,
 *            'ru-RU' => AlexanderEmelyanov\yii\modules\i18n\models\Message,
 *            'en-GB' => null, // It mean, that this SourceMessage haven't translation for en-Gb language
 *            ...
 *           ]
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="translation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => array_merge([
            'id',
            'category',
            'message:text',
        ]),
    ]) ?>

    <?php foreach($relatedModels as $language => $relatedModel): ?>
        <h2><?= $language ?></h2>
        <?php if ($relatedModel === null): ?>
            null // link to update action
        <?php else: ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <?= $relatedModel->translation ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

</div>
