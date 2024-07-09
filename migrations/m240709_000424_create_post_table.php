<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m240709_000424_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
{
    $this->createTable('{{%post}}', [
        'id' => $this->primaryKey(),
        'title' => $this->string()->notNull(),
        'content' => $this->text()->notNull(),
        'user_id' => $this->integer()->notNull(),
        'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
    ]);

    // Adicionando chave estrangeira
    $this->addForeignKey(
        'fk-post-user_id',
        '{{%post}}',
        'user_id',
        '{{%user}}',
        'id',
        'CASCADE'
    );
}

public function down()
{
    $this->dropForeignKey('fk-post-user_id', '{{%post}}');
    $this->dropTable('{{%post}}');
}


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-post-user_id', '{{%post}}');
        $this->dropTable('{{%post}}');
    }
}
