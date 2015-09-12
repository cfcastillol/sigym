<?php

namespace app\controllers;

use Yii;
use app\models\Personamembresia;
use app\models\Membresia;
use app\models\Persona;
use app\models\PersonamembresiaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PersonamembresiaController implements the CRUD actions for Personamembresia model.
 */
class PersonamembresiaController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Personamembresia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonamembresiaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Personamembresia model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionConsulta()
    {
        
        $model = new Persona();
        
        if ($model->load(Yii::$app->request->post())) {
            
            $model = Persona::find()
                              ->where('documento = :documento',[':documento'=>$model->documento])
                              ->one();
            
            if(sizeof($model)== 0){
                Yii::$app->session->setFlash('error', 'Persona no encontrada');
                return $this->redirect(['consulta']);
            }
            
            $membresia = Personamembresia::find()
                            ->where('personaid = :id',[':id' => $model->id])
                            ->andWhere('estadoid = :estado',[':estado'=>1])
                            ->orderBy('id desc')
                            ->one();
            
            return $this->render('consulta',[
                'model' => $model,
                'membresia'=>$membresia,
            ]);            
        }else{
        
        return $this->render('consulta', [
                'model' => $model,
            ]);
        }
    }
    
    

    /**
     * Creates a new Personamembresia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Personamembresia();

        if ($model->load(Yii::$app->request->post())) {
            
            $membresia = Membresia::findOne($model->membresiaid);
            $fechafin = strtotime('+'.$membresia->cantidaddias.' day',strtotime ( $model->fechainicio ));
            $model->fechafin = date('Y-m-d',$fechafin);
            $model->estadoid = 1;
            
           if($model->save()){
               Yii::$app->session->setFlash('success', 'Membresía asociada exitosamente');
            }else{
               Yii::$app->session->setFlash('Danger', 'No se pudo asociar la membresía'); 
            }
            
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Personamembresia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            $membresia = Membresia::findOne($model->membresiaid);
            $fechafin = strtotime('+'.$membresia->cantidaddias.' day',strtotime ( $model->fechainicio ));
            $model->fechafin = date('Y-m-d',$fechafin);
            
            if($model->save()){
               Yii::$app->session->setFlash('success', 'Membresía asociada exitosamente');
            }else{
               Yii::$app->session->setFlash('Danger', 'No se pudo asociar la membresía'); 
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Personamembresia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Personamembresia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Personamembresia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Personamembresia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
