<?php

use yii\db\Migration;

/**
 * Class m200408_030222_contact
 */
class m200408_030222_contact extends Migration
{
    public function up()
{
    $tableOptions = null;
    if ($this->db->driverName === 'mysql') {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
    }

    $this->createTable('{{%contact}}', [
        'id' => $this->primaryKey(),
        'name' => $this->string()->notNull(),
        'email' => $this->string(100)->notNull(),
        'subject' => $this->string()->notNull(),
        'body' => $this->text()->notNull(),
        'created_at' => $this->integer()->notNull(),
        'updated_at' => $this->integer()->notNull(),
    ], $tableOptions);
}

    public function down()
    {
        $this->dropTable('{{%contact}}');
    }
}
