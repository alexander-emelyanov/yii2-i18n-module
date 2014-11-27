<?php

namespace AlexanderEmelyanov\yii\modules\i18n;

use \Yii;

/**
 * Class Module
 * @package AlexanderEmelyanov\yii\modules\i18n
 * @author Alexander Emelyanov
 * @date 23nov2014
 * @place Moscow, Russia
 */

class Module extends \yii\base\Module{

    public $controllerNamespace = 'AlexanderEmelyanov\yii\modules\i18n\controllers';

    public function init(){
        parent::init();
        Yii::$app->setHomeUrl('/' . $this->getUniqueId());
    }
}
