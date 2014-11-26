<?php

/**
 * Class m141121_195459_create_i18n_tables
 */

class m141121_195459_create_i18n_tables extends \yii\db\Migration{

    /**
     * @return bool|void
     * @throws \yii\base\InvalidConfigException
     */
    public function safeUp(){

        $i18n = Yii::$app->getI18n();

        if (!isset($i18n->sourceMessageTable) || !isset($i18n->messageTable)) {
            throw new \yii\base\InvalidConfigException('You should configure i18n component');
        }

        $sourceMessageTable = $i18n->sourceMessageTable;

        $messageTable = $i18n->messageTable;

        if ($this->db->driverName == 'mysql'){
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        } else {
            $tableOptions = '';
        }

        $this->createTable($sourceMessageTable, [
            'id' => \yii\db\Schema::TYPE_PK,
            'category' => 'varchar(32) null',
            'message' => 'text null'
        ], $tableOptions);

        $this->createTable($messageTable, [
            'id' => \yii\db\Schema::TYPE_INTEGER . ' not null default 0',
            'language' => 'varchar(16) not null default ""',
            'translation' => 'text null'
        ], $tableOptions);

        $this->addPrimaryKey('id', $messageTable, ['id', 'language']);

        $this->addForeignKey('fk_source_message_message',$messageTable, 'id', $sourceMessageTable, 'id', 'cascade');
    }

    public function safeDown(){

        $i18n = Yii::$app->getI18n();

        if (!isset($i18n->sourceMessageTable) || !isset($i18n->messageTable)) {
            throw new \yii\base\InvalidConfigException('You should configure i18n component');
        }

        $this->dropTable($i18n->messageTable);

        $this->dropTable($i18n->sourceMessageTable);

        return true;
    }
}
