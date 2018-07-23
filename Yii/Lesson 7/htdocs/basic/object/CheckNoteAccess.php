<?php

namespace app\object;

use app\models\Access;
use app\models\Note;

class CheckNoteAccess
{

    /**
     * Уровень доступа к заметке
     * @param Note $model
     * @return int
     */

    public function execute (Note $model): int
    {
        $authorID = (int)$model->creator;
        $userId = (int)\Yii::$app->user->id;

        if($authorID === $userId)
        {
            return Access::LEVEL_EDIT;
        }

        $accessNote = Access::find()
            ->forNote($model)
            ->forUserId($userId)
            ->one();

        if($accessNote)
        {
            return Access::LEVEL_VIEW;
        }

        return Access::LEVEL_DENIED;

    }

}