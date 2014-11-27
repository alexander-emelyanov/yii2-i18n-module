<?php

namespace AlexanderEmelyanov\yii\modules\i18n\models;

use Yii;
use yii\base\ErrorException;

/**
 * This is the model class for table "source_message".
 *
 * @property integer $id
 * @property string $category
 * @property string $message
 *
 * @property Message[] $messages
 */
class SourceMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'source_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['category'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category' => Yii::t('app', 'Category'),
            'message' => Yii::t('app', 'Message'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['id' => 'id']);
    }

    /**
     * @param $newInsteadMissing bool
     * @return \AlexanderEmelyanov\yii\modules\i18n\models\Message[]
     * ex.: ['en-US' => AlexanderEmelyanov\yii\modules\i18n\models\Message,
     *       'ru-RU' => AlexanderEmelyanov\yii\modules\i18n\models\Message,
     *       'en-GB' => null, // It mean that this SourceMessage haven't translation for en-Gb language
     *       ...
     * ]
     * @throws \yii\base\ErrorException
     */
    public function getMessagesMap($newInsteadMissing = false){

        /** @var \AlexanderEmelyanov\yii\modules\i18n\models\Message[] $messages */
        $messages = $this->getMessages()->all();

        $messageMap = [];
        foreach($messages as $message){
            $relatedModelsKey = $message->language;
            $messageMap[$relatedModelsKey] = $message;
        }

        /** @var array $relatedModelsKeys */
        $languages = Message::getSupportedLanguages();

        foreach($languages as $language){
            if (!isset($messageMap[$language])){
                if ($newInsteadMissing){
                    $message = new Message();
                    $message->language = $language;
                    $message->link('id0', $this);
                    $messageMap[$language] = $message;
                } else {
                    $messageMap[$language] = null;
                }
            }
        }

        return $messageMap;
    }
}
