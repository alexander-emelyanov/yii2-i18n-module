<?php

namespace AlexanderEmelyanov\yii\modules\i18n\controllers;

use yii\web\Controller;

/**
 * Class DefaultController
 * @package AlexanderEmelyanov\yii\modules\i18n\controllers
 * @author Alexander Emelyanov
 * @date 24nov2014
 * @place Moscow, Russia
 */

class DefaultController extends Controller{

    public function actionIndex()
    {
        return $this->render('index');
    }
}
