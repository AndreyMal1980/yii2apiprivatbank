<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use \bank\privat\services\BankomatManageService;
use \api\integrations\bank\privat\bankomat\getArray;

class BankomatapiController extends Controller {

    private $service;

    public function __construct($id, $module, BankomatManageService $service, $config = []) {
        parent::__construct($id, $module, $config);
        $this->service = $service;
        
           if (Yii::$app->user->can('admin')) {
        } else {
            exit('У вас нет прав пользователя admin!');
        }
    }

    public function behaviors(): array {
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

        if (\Yii::$app->request->post()) {

            if (!$dataAPI = (new getArray())->get()) {
                throw new \yii\web\NotFoundHttpException('Ошибка получения данных с сервера.Возможно отсутствует интернет');
            }


            try {
                $this->saveBankomats($dataAPI);
                Yii::$app->session->setFlash('success', 'Данные успешно сохранены');
                return $this->redirect(['/bankomat/index']);
            } catch (\yii\web\NotFoundHttpException $e) {
                $e->getMessage();
                Yii::$app->session->setFlash('error', 'Ошибка сохранения');
            }
        }
        return $this->render('index');
    }

    private function saveBankomats($dataAPI) {
        $this->service->truncateAll();
        foreach ($dataAPI['devices'] as $key => $device) {
            try {
                $this->service->saveIsArray($device);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('success', 'Ошибка сохранения');
            }
        }
    }

}
