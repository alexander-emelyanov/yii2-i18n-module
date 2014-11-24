<?php

use yii\helpers\Html;

/**
 * @author Alexander Emelyanov
 * @date 23nov2014
 * @place Moscow, Russia
 *
 * @var $this yii\web\View
 */

    $this->title = Yii::t('app', 'I18n Management Studio');

?>
<div class="i18n-default-index">
        <h1><?php echo Html::encode($this->title) ?></h1>
        <p>
            <?php echo Html::a(Yii::t('app', 'Messages'), ['messages/'], ['class' => 'btn btn-success']) ?>
            <?php echo Html::a(Yii::t('app', 'Source messages'), ['source-messages/'], ['class' => 'btn btn-success']) ?>
        </p>
</div>
