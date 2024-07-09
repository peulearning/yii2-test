<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Class Comment
 * @package app\models
 *
 * @property int $id
 * @property int $post_id
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class Comment extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment'; // Nome da tabela no banco de dados
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_id', 'content'], 'required'],
            [['post_id'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * Define o relacionamento com o modelo Post.
     * Cada comentário pertence a um post.
     */
    public function getPost()
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }
}
