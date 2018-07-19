<?php

use app\models\Access;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Note;
use app\object\CheckNoteAccess;


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

    <?=date('Y-m-d H:i:s')?>
    <?php if ($this->beginCache('cuurent_time_on_notes', [
            'duration' =>30,
    ])):?>

    <?=date('Y-m-d H:i:s')?>
    <?=$this->endCache();?>
    
    <?php endif;?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'text:ntext',
            'author.name',
            'create_date',
            'event_date',

            ['class' => 'yii\grid\ActionColumn',
                'buttons'=> [
                        'update' => function($url, Note $model)
                        {
                            return (new CheckNoteAccess)->execute($model) === Access::LEVEL_EDIT ? Html::a('update', $url) : '';
                        }
                ]
            ],
        ],
    ]); ?>
</div>
