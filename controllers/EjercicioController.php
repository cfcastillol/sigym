<?php

namespace app\controllers;

use Yii;
use app\models\Ejercicio;
use app\models\EjercicioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * EjercicioController implements the CRUD actions for Ejercicio model.
 */
class EjercicioController extends Controller {

    public function behaviors() {
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
     * Lists all Ejercicio models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new EjercicioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionConsulta() {

        $model = new Ejercicio();

        if ($model->load(Yii::$app->request->post())) {

            $ejercicios = Ejercicio::find()
                    ->where('musculoid = :musculo', [':musculo' => $model->musculoid])
                    ->all();

            if (sizeof($ejercicios) == 0) {
                Yii::$app->session->setFlash('error', 'No existen ejercicios para el músculo seleccionado');
                return $this->redirect(['consulta']);
            } else {
                return $this->render('consulta', [
                            'model' => $model,
                            'ejercicios' => $ejercicios,
                ]);
            }
        } else {

            return $this->render('consulta', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Displays a single Ejercicio model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Ejercicio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Ejercicio(['scenario' => 'create']);
        $transaccion = Yii::$app->db->beginTransaction();

        if ($model->load(Yii::$app->request->post())) {
            try {
                $model->archivo = UploadedFile::getInstance($model, 'archivo');
                $ruta = 'uploads/' . str_replace(' ', '', $model->ejercicio) . "." . $model->archivo->extension;
                if ($model->validate()) {
                    $model->imagen = $ruta;
                    if ($model->save()) {
                        $model->archivo->saveAs($ruta);
                        Yii::$app->session->setFlash("success", "Ejercicio creado exitosamente.");
                        $transaccion->commit();
                    } else {
                        print_r($model->getErrors());
                        exit;
                    }
                } else {
                    print_r($model->getErrors());
                    exit;
                }
            } catch (Exception $e) {
                $transaccion->rollback();
                Yii::$app()->session->setFlash('danger', $e->getMessage());
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ejercicio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Ejercicio actualizado con exito');
            } else {
                Yii::$app->session->setFlash('danger', 'No se pudo actualizar el ejercicio');
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ejercicio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ejercicio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ejercicio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Ejercicio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
