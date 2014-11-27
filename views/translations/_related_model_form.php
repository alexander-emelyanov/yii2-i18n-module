<?php
/**
 * @author Alexander Emelyanov
 * @date 28nov2014
 * @place Moscow, Russia
 *
 * @var $this yii\web\View
 * @var $model AlexanderEmelyanov\yii\modules\i18n\models\Message
 * @var $form yii\widgets\ActiveForm
 * @var $fieldNamePrefix string
 */
?>

<div class="message-form">
    <?= $form->field($model, 'translation')->textarea(['rows' => 6, 'name' => $fieldNamePrefix . '[translation]']) ?>
</div>
