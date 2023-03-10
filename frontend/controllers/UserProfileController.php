<?php

namespace frontend\controllers;

use common\models\Banks;
use common\models\BankServices;
use common\models\CarMark;
use common\models\CarModel;
use common\models\CarType;
use common\models\IncomeLevel;
use common\models\MonthlyIncomePerMember;
use common\models\Operators;
use common\models\Provider;
use common\models\Purchases;
use common\models\User;
use common\models\UserProfile;
use common\models\UserSearch;
use common\models\WhatDidYouDo;
use common\models\WhatSmoking;
use common\models\WhichOfTheFollowingDoYouHave;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserProfileController implements the CRUD actions for UserProfile model.
 */
class UserProfileController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'actions' => ['create', 'update', 'delete', 'index', 'base-index', 'additional-update'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['get'],
                    ],
                ],
            ]
        );
    }

    public function beforeAction($action)
    {

        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    /**
     * Updates an existing UserProfile model.
     * If update is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionIndex()
    {
        $user_id = \Yii::$app->user->id;
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams, $user_id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionBaseIndex()
    {
        $user_id = \Yii::$app->user->id;
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams, $user_id);

        return $this->render('base-index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdate()
    {
        $this->layout = 'user_profile';

        $id = \Yii::$app->request->get('id', '');
        $user_id = \Yii::$app->request->get('user_id', '');

        if($user_id) {
            $model = UserProfile::find()->where(['user_id' => $user_id])->one();
        } else {
            $model = $this->findModel($id);
        }

        if (!$model || $model->user_id != \Yii::$app->user->getId()) {
            throw new NotFoundHttpException('Page not found');
        }


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionAdditionalUpdate()
    {
        $this->layout = 'user_profile';

        $id = \Yii::$app->request->get('id', '');
        $user_id = \Yii::$app->request->get('user_id', '');

        if($user_id) {
            $model = UserProfile::find()->where(['user_id' => $user_id])->one();
        } else {
            $model = UserProfile::find()->where(['user_id' => $id])->one();
        }

        if (!$model || $model->user_id != \Yii::$app->user->getId()) {
            throw new NotFoundHttpException('Page not found');
        }

        $carMark = CarMark::find()->all();
        $carMarkArray = [];
        array_map(function ($carMark) use (&$carMarkArray) {
            $carMarkArray["$carMark->id_car_mark"] = $carMark->name;
        }, $carMark);

        $carModel = CarModel::find()->all();
        $carModelArray = [];
        array_map(function ($carModel) use (&$carModelArray) {
            $carModelArray["$carModel->id_car_model"] = $carModel->name;
        }, $carModel);

        $carType = CarType::find()->all();
        $carTypeArray = [];
        array_map(function ($carType) use (&$carTypeArray) {
            $carTypeArray["$carType->id_car_type"] = $carType->name;
        }, $carType);

        $incomeLevel = IncomeLevel::find()->all();
        $incomeLevelArray = [];
        array_map(function ($incomeLevel) use (&$incomeLevelArray) {
            $incomeLevelArray["$incomeLevel->id"] = $incomeLevel->name;
        }, $incomeLevel);

        $monthlyIncomePerMember = MonthlyIncomePerMember::find()->all();
        $monthlyIncomePerMemberArray = [];
        array_map(function ($monthlyIncomePerMember) use (&$monthlyIncomePerMemberArray) {
            $monthlyIncomePerMemberArray["$monthlyIncomePerMember->id"] = $monthlyIncomePerMember->alias;
        }, $monthlyIncomePerMember);

        $personalIncomeLevel = MonthlyIncomePerMember::find()->all();
        $personalIncomeLevelArray = [];
        array_map(function ($personalIncomeLevel) use (&$personalIncomeLevelArray) {
            $personalIncomeLevelArray["$personalIncomeLevel->id"] = $personalIncomeLevel->alias;
        }, $personalIncomeLevel);

        $banksList = Banks::find()->all();
        $banksArray = [];
        array_map(function ($banksList) use (&$banksArray) {
            $banksArray["$banksList->id"] = $banksList->name;
        }, $banksList);

        $bankServices = BankServices::find()->all();
        $bankServicesArray = [];
        array_map(function ($bankServices) use (&$bankServicesArray) {
            $bankServicesArray["$bankServices->id"] = $bankServices->name;
        }, $bankServices);

        $purchases = Purchases::find()->all();
        $purchasesArray = [];
        array_map(function ($purchases) use (&$purchasesArray) {
            $purchasesArray["$purchases->id"] = $purchases->name;
        }, $purchases);

        $WhichOfTheFollowingDoYouHave = WhichOfTheFollowingDoYouHave::find()->all();
        $WhichOfTheFollowingDoYouHaveArray = [];
        array_map(function ($WhichOfTheFollowingDoYouHave) use (&$WhichOfTheFollowingDoYouHaveArray) {
            $WhichOfTheFollowingDoYouHaveArray["$WhichOfTheFollowingDoYouHave->id"] = $WhichOfTheFollowingDoYouHave->name;
        }, $WhichOfTheFollowingDoYouHave);

        $operators = Operators::find()->all();
        $operatorsArray = [];
        array_map(function ($operators) use (&$operatorsArray) {
            $operatorsArray["$operators->id"] = $operators->name;
        }, $operators);

        $whatDidYouDo = WhatDidYouDo::find()->all();
        $whatDidYouDoArray = [];
        array_map(function ($whatDidYouDo) use (&$whatDidYouDoArray) {
            $whatDidYouDoArray["$whatDidYouDo->id"] = $whatDidYouDo->name;
        }, $whatDidYouDo);

        $provider = Provider::find()->all();
        $providerArray = [];
        array_map(function ($provider) use (&$providerArray) {
            $providerArray["$provider->id"] = $provider->name;
        }, $provider);

        $whatSmoking = WhatSmoking::find()->all();
        $whatSmokingArray = [];
        array_map(function ($whatSmoking) use (&$whatSmokingArray) {
            $whatSmokingArray["$whatSmoking->id"] = $whatSmoking->name;
        }, $whatSmoking);


        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['/site/index']);
        }

        return $this->render('update', [
            'model' => $model,
            'carMarkArray' => $carMarkArray,
            'carModelArray' => $carModelArray,
            'carTypeArray' => $carTypeArray,
            'incomeLevelArray' => $incomeLevelArray,
            'monthlyIncomePerMemberArray' => $monthlyIncomePerMemberArray,
            'personalIncomeLevelArray' => $personalIncomeLevelArray,
            'banksArray' => $banksArray,
            'bankServicesArray' => $bankServicesArray,
            'purchasesArray' => $purchasesArray,
            'WhichOfTheFollowingDoYouHaveArray' => $WhichOfTheFollowingDoYouHaveArray,
            'operatorsArray' => $operatorsArray,
            'whatDidYouDoArray' => $whatDidYouDoArray,
            'providerArray' => $providerArray,
            'whatSmokingArray' => $whatSmokingArray,
        ]);
    }

    /**
     * Deletes an existing UserProfile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        // ?????????????????? ???????????????? !!!
        throw new NotFoundHttpException('Page not found');

        $model = $this->findModel($id);

        if (!$model || $model->user_id != \Yii::$app->user->getId()) {
            throw new NotFoundHttpException('Page not found');
        }

        $model->user->delete();
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserProfile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return UserProfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserProfile::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
