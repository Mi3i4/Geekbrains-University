<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%access}}".
 *
 * @property int $id
 * @property int $note_id
 * @property int $user_id
 *
 */

class Access extends \yii\db\ActiveRecord
{
    public const LEVEL_DENIED = 0;
    public const LEVEL_VIEW = 1;
    public const LEVEL_EDIT = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%access}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['note_id', 'user_id'], 'required'],
            [['note_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'note_id' => 'Note ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return AccessQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AccessQuery(get_called_class());
    }
}
