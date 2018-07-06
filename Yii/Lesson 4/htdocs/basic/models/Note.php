<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%note}}".
 *
 * @property int $id
 * @property string $text
 * @property int $creator
 * @property int $create_date
 * @property int $event_date
 * @property User $author
 * @property Access[] $accesses
 */
class Note extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%note}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'event_date'], 'required'],
            [['text'], 'string'],
            [['creator'], 'integer'],
            [['create-date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'creator' => 'Creator',
            'create_date' => 'Create Date',
            'event_date' => 'Event Date',
        ];
    }

    /**
     * {@inheritdoc}
     * @return NoteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NoteQuery(get_called_class());
    }

    /**
     * @return ActiveQuery
     */
    public function getAuthor (): ActiveQuery
    {
        return $this->hasOne(User:: class, ['id' => 'creator']);
    }

    /**
     * @return ActiveQuery
     */

    public function getEvent(): ActiveQuery
    {
        $date = \date('Y-m-d H:i:s');

        if($this->event_date >= $date)
        {
            return $this->hasMany(User::class, ['id' => 'event_date']);
        }
    }

    /**
     * @return ActiveQuery
     */
    public function getAccess(): ActiveQuery
    {
        return $this->hasMany(Access:: class, ['note_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        $result = parent::beforeSave($insert);

        if(!$this->creator)
        {
            $this->creator = \Yii::$app->user->id;
        }

        if(!$this->create_date)
        {
            $this ->create_date = \date('Y-m-d H:i:s');
        }

        return $result;
    }
}
