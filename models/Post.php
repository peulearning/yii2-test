<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Class Post
 * @package app\models
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class Post extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post'; // Nome da tabela no banco de dados
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['title', 'content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }
}
