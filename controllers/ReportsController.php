<?php

namespace app\controllers;

use app\models\Bill;
use yii\web\Controller;

class ReportsController extends Controller
{
    public function actionIndex()
    {
        $allBills = Bill::find()->orderBy('created_at ASC')->all();

        $result = [];

        foreach ($allBills as $bill) {
            $result[$bill->date][] = $bill;
        }
        return $this->render('index', [
            'data' => $result
        ]);
    }
}
