<?php

namespace AlexanderEmelyanov\yii\modules\i18n\controllers;

use Yii;
use AlexanderEmelyanov\yii\modules\i18n\models\SourceMessage;
use AlexanderEmelyanov\yii\modules\i18n\models\Message;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Class TranslationsController
 * @package AlexanderEmelyanov\yii\modules\i18n\controllers
 * @author Alexander Emelyanov
 * @date 26nov2014
 * @place Moscow, Russia
 */

class TranslationsController extends DefaultController{

    public function behaviors(){
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Translation models.
     * @return mixed
     */
    public function actionIndex(){

        $dataProvider = new ActiveDataProvider([
            'query' => SourceMessage::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Translation model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id){

        $model = $this->findModel($id);

        /** @var \AlexanderEmelyanov\yii\modules\i18n\models\Message[] $messages */
        $messages = $model->getMessages()->all();

        $relatedModels = [];
        foreach($messages as $message){
            $relatedModelsKey = $message->language;
            $relatedModels[$relatedModelsKey] = $message;
        }

        /** @var array $relatedModelsKeys */
        $relatedModelsKeys = Message::getSupportedLanguages();

        foreach($relatedModelsKeys as $relatedModelsKey){
            if (!isset($relatedModels[$relatedModelsKey])){
                $relatedModels[$relatedModelsKey] = null;
            }
        }

        return $this->render('view', [
            'model' => $model,
            'relatedModels' => $relatedModels,
        ]);
    }

    /**
     * Creates a new Translation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Translation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SourceMessage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SourceMessage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SourceMessage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SourceMessage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SourceMessage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
