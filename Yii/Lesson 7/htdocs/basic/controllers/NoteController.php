<?php

namespace app\controllers;

use app\models\Access;
use app\object\CheckNoteAccess;
use Yii;
use app\models\Note;
use app\models\search\NoteSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NoteController implements the CRUD actions for Note model.
 */
class NoteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['my', 'create', 'update', 'delete', 'shared'],
//                'except' => ['note'],
                'rules' => [
                    [
                        'roles' => ['@'],
                        'allow' => true,
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @return string
     */

    public function actionMy()
    {
        $searchModel = new NoteSearch();

        $dataProvider = $searchModel->getEvent();

//         \Yii::$app->cache->set('key',time());

//        $cache = \Yii::$app->cache;

//        var_dump($cache->get('key'), time()); exit;

//        if($cache->get('time') === false)
//        {
//            $cache->set('time',time(),10);
//        }
//
//        \var_dump($cache->get('time'),time());exit;
//        \var_dump($searchModel->getEvent());exit;

//        $dataProvider = $searchModel->search([
//            'NoteSearch' => [
//                'creator' => \Yii::$app->user->id,
//            ],
//        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionShared()
    {
        $searchModel = new NoteSearch();
        $dataProvider = $searchModel->search(['user_id' => \Yii::$app->user->id]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

//    /**
//     * Lists all Note models.
//     * @return mixed
//     */
//    public function actionIndex()
//    {
//        $searchModel = new NoteSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
//    }

    /**
     * Displays a single Note model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if(!$model)
        {
            throw new ForbiddenHttpException('Заметка не найдена');
        }

        $level = (new CheckNoteAccess)->execute($model);

        if($level === Access::LEVEL_DENIED)
        {
            throw new ForbiddenHttpException('У вас нет прав доступа');
        }

        $viewName = $level === Access::LEVEL_EDIT ? 'view': 'view_guest';

        return $this->render($viewName, [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Note model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Note();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Note model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Note model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Note model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Note the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
//        $key = "note_$id";
//        $cachedModel = \Yii::$app->cache->get("$key");
//        if($cachedModel !== false)
//        {
//            return $cachedModel;
//        }

//                if (($model = Note::find()
//                        ->andWhere(['id' =>$id])
//                        ->cache(30)
//                        ->one()) !== null)
//                {
//                     return $model;
//                }

        if (($model = Note::findOne($id)) !== null) {
//            \Yii::$app->cache->set($key, $model, 30);
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
