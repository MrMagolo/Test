<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Bank;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
/*
    <div class="row">
    <span style="float:left; margin-left: 400px; width: 520px;">
    <legend><b> PRODUCT TYPE</b></legend>
    <p><b>Please select your product</b></p>
    <input id="Cr11_0" value="1" type="radio" name="Cr11">
<label for="Cr11_0">Bridge Financing</label> 

<input id="Cr11_1" value="0" checked="checked" type="radio" name="Cr11">

<label for="Cr11_1">Investment Fund Placement</label>
<br><br>
<p> <b> Please share information about the nature of your request</b></p>
<?= Html::textArea('downloadSourceCode',"",['id'=>'downloadSourceCode']); ?>
<br><br>
<p><b>Would you need UM Financing?</b></p>
<input id="Cr11_0" value="1" type="radio" name="Cr11">

<label for="Cr11_0">Yes</label> 

<input id="Cr11_1" value="0" checked="checked" type="radio" name="Cr11">

<label for="Cr11_1">No</label><br><br><br>
*/

    public function actionBank()
    {
        $model = new Bank();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->render('bank', [
                'model' => $model,
            ]);
        } else {
            return $this->render('bank', [
                'model' => $model,
            ]);
        }
        
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
