<?php
/**
 * @author Alexander Emelyanov
 * @date 28nov2014
 * @place Moscow, Russia
 *
 * @var $this yii\web\View
 * @var $model AlexanderEmelyanov\yii\modules\i18n\models\SourceMessage
 * @var $form yii\widgets\ActiveForm
 */
?>
<div class="source-message-form">
    <?= $form->field($model, 'category')->textInput(['maxlength' => 32]) ?>
    <?= $form->field($model, 'message')->textInput() ?>
</div>