<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m240709_000956_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
{
    $this->createTable('{{%comment}}', [
        'id' => $this->primaryKey(),
        'content' => $this->text()->notNull(),
        'post_id' => $this->integer()->notNull(),
        'user_id' => $this->integer()->notNull(),
        'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
    ]);

    // Adicionando chaves estrangeiras
    $this->addForeignKey(
        'fk-comment-post_id',
        '{{%comment}}',
        'post_id',
        '{{%post}}',
        'id',
        'CASCADE'
    );

    $this->addForeignKey(
        'fk-comment-user_id',
        '{{%comment}}',
        'user_id',
        '{{%user}}',
        'id',
        'CASCADE'
    );
}

    public function down()
{
    $this->dropForeignKey('fk-comment-post_id', '{{%comment}}');
    $this->dropForeignKey('fk-comment-user_id', '{{%comment}}');
    $this->dropTable('{{%comment}}');
}

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
    }
}
