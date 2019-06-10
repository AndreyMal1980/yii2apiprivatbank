<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use api\integrations\bank\privat\bankomat\getJSON;
use bank\privat\forms\FilterBankomatForm;
use bank\privat\services\BankomatManageService;
/**
 * PrivateBankomat controller
 */
class PrivatebankomatController extends Controller {


 private $service;

    public function __construct($id, $module, BankomatManageService $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }

    public function actionIndex() {
        $filterBankomatForm = new FilterBankomatForm();
        if ($filterBankomatForm->load(Yii::$app->request->post()) && $filterBankomatForm->validate()) {
            try {
                $city = Yii::$app->request->post()['FilterBankomatForm']['city'];
                $bankomats = $this->service->findBankomatsByCity($city);
                return $this->render('index', ['bankomats' => $bankomats, 'filterBankomatForm' => $filterBankomatForm]);
            } catch (\Exception $e) {
                Yii::$app->errorHandler->logException($e);
                $e->getMessage();
            }
            return $this->refresh();
        }
        try {
              $bankomats = $this->service->findAllBankomats();
            return $this->render('index', ['bankomats' => $bankomats, 'filterBankomatForm' => $filterBankomatForm]);
        } catch (\Exception $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', 'Не удалось получить данные');
        }
    }
}
    