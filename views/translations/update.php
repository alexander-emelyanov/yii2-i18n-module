<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @author Alexander Emelyanov
 * @date 27nov2014
 * @place Moscow, Russia
 * @var $this yii\web\View
 * @var $model AlexanderEmelyanov\yii\modules\i18n\models\SourceMessage
 * @var $relatedModels AlexanderEmelyanov\yii\modules\i18n\models\Message[]
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Source Message',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Source Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="translation-update">
    <?php $form = ActiveForm::begin(); ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'form' => $form,
        'model' => $model,
    ]) ?>
    <?php foreach($relatedModels as $relatedModelKey =>  $relatedModel): ?>
        <h3><?= $relatedModel->language ?></h3>
        <?= $this->render('_related_model_form', [
            'form' => $form,
            'model' => $relatedModel,
            'fieldNamePrefix' => 'Message[' . $relatedModelKey . ']'
        ]) ?>
    <?php endforeach; ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
