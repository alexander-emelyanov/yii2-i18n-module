<?php
/* @var $this yii\web\View */
/* @var $model AlexanderEmelyanov\yii\modules\i18n\models\Message */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-form">
    <?= $form->field($model, 'translation')->textarea(['rows' => 6]) ?>
</div>
