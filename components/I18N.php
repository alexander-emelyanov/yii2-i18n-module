<?php

namespace AlexanderEmelyanov\yii\modules\i18n\components;

/**
 * Class I18N
 * @package AlexanderEmelyanov\yii\modules\i18n\components
 * @author Alexander Emelyanov
 * @date 26nov2014
 * @place Moscow, Russia
 */

class I18N extends \yii\i18n\I18N {

    /**
     * @var string
     */
    public $sourceMessageTable = '{{%source_message}}';

    /**
     * @var string
     */
    public $messageTable = '{{%message}}';

    /**
     * @var array (ex.: ['en-US', 'ru-RU', 'en', ...])
     */
    public $languages = null;

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function init(){

        if (!is_array($this->languages) || empty($this->languages)) {
            throw new \yii\base\InvalidConfigException('You should configure i18n component [language]');
        }

        parent::init();
    }
} 