<?php

namespace backend\controllers;

use bank\privat\forms\BankomatForm;
use bank\privat\services\BankomatManageService;
use Yii;
use bank\privat\entities\Bankomat;
use backend\forms\bank\BankomatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class BankomatController extends Controller {

    private $service;

    public function __construct($id, $module, BankomatManageService $service, $config = []) {
        parent::__construct($id, $module, $config);
        $this->service = $service;

        if (Yii::$app->user->can('moder')) {
        } else {
            exit('У вас нет прав пользователя moder!');
        }
    }

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new BankomatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'bankomat' => $this->findModel($id),
        ]);
    }

    /**
     * @return mixed
     */
    public function actionCreate() {
        $form = new BankomatForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {

                /*  echo '<pre>';
                  print_r($form);
                  echo '</pre>'; */
                /*   echo '<pre>';
                  print_r(Yii::$app->request->post());
                  echo '</pre>'; */
                //  exit();

                $bankomat = $this->service->create($form);

                //  exit();
                return $this->redirect(['view', 'id' => $bankomat->id]);
            } catch (\DomainException $e) {
                // Yii::$app->errorHandler->logException($e);
                // Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('create', [
                    'model' => $form,
        ]);
    }

    /**
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $bankomat = $this->findModel($id);

        $form = new BankomatForm($bankomat);
        /* echo '<pre>';
          print_r($bankomat);
          echo '</pre>'; */

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                /*     echo '<pre>';
                  print_r($form);
                  echo '</pre>'; */

                $this->service->edit($bankomat->id, $form);

                return $this->redirect(['view', 'id' => $bankomat->id]);
            } catch (\DomainException $e) {
                //    Yii::$app->errorHandler->logException($e);
                // Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', [
                    'model' => $form,
                    'bankomat' => $bankomat,
        ]);
    }

    /**
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        try {
            $this->service->remove($id);
            Yii::$app->session->setFlash('success', 'Банкомат успешно удален');
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }

    /**
     * @param integer $id
     * @return Bankomat the loaded model
     */
    protected function findModel($id) {
        if (($model = Bankomat::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
