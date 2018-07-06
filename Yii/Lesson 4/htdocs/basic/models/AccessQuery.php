<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Access]].
 *
 * @see Access
 */
class AccessQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Access[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Access|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @param Note $note
     * @return self
     */

//    public function forNote(Note $note): self
//    {
//        $this->andWhere(['note_id' => $note->id]);
//
//        return $this;
//    }
//
//    public function forUserId(int $userId): self
//    {
//        $this->andWhere(['user_id' => $userId]);
//
//        return $this;
//    }
}
