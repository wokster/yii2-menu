<?php

use yii\db\Migration;

class m170509_170302_menu extends Migration
{
    public function safeUp()
    {
        $this->createTable('menu',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string(255)->notNull(),
                'url' => $this->string(255)->notNull()->unique(),
                'sort' => $this->integer(2),
                'parent_id' => $this->integer(),
            ]
        );
    }

    public function safeDown()
    {
        echo "m170509_170302_menu cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170509_170302_menu cannot be reverted.\n";

        return false;
    }
    */
}
