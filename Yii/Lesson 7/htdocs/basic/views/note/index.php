<?php

use app\models\Access;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Note;
use app\object\CheckNoteAccess;
use yii\helpers\StringHelper;


/* @var $this yii\web\View */
/* @var $searchModel app\models\NoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="note-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Note', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'text',
                'format' => 'raw',
                'value' => function($model)
                {
                    $text = StringHelper::truncateWords($model->text, 2,'...', true);
                    return Html::a($text, ['note/view', 'id'=> $model->id]);
                }

            ],
            'author.name',
            'event_date',

            ['class' => 'yii\grid\ActionColumn',
                'visibleButtons' =>
                    [
                        'update' => function ($model)
                        {
                            return (new CheckNoteAccess)->execute($model) === Access::LEVEL_EDIT;
                        }
                    ],
            ],
        ],
    ]); ?>
</div>
