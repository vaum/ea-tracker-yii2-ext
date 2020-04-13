<?php
/**
 * Created by PhpStorm.
 * User: confirmation_bias_17
 * Date: 2020-04-13
 * Time: 21:20
 */

namespace vaum\Migrations;

use yii\db\Migration;

class init_migration extends Migration
{
    private function tableName()
    {
        return '{{%tracker}}';
    }

    public function safeUp()
    {
        $this->createTable(self::tableName(), [
            'id' => $this->primaryKey(),
            'event' => $this->string(),
            'model_id' => $this->integer()->notNull(),
            'model_type' => $this->string(),
            'new_attributes' => $this->string(),
            'old_attributes' => $this->string(),
            'user_id' => $this->integer()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable(self::tableName());
    }

}
