<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

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

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionTest()
    {
        $last_report = '2015-12-02 14:18:00';

        $lastReportDate = new \DateTime($last_report);
        $now = new \DateTime();


        $days= 2;
        $initOffsetCommand = '-'.$days.' day';

       //$interval = $end->diff($start);

        // массив соответсвий текущего дня недели и смещения текущей даты назад для определения факта просрочки
        $weekendOffset = [ 1 => 1, 2 => 2, 3 => 0, 4 =>0, 5=>0, 6 =>0, 7=> 0];

        $dayOfWeek = $now->format('w');
        //var_dump($dayOfWeek);


        // смещаем дату назад и получаем контрольную дату, с которой сравнивается last_report
        $controlDate = $now->modify($initOffsetCommand)->modify('-'.$weekendOffset[$dayOfWeek].' day');
       // echo 'now -'.$offset[$dayOfWeek].' day'; echo $controlDate->format('Y-m-d H:i:s');
        echo '<br>last report date:'. $lastReportDate->format('Y-m-d H:i:s');
        echo '<br>control date:'. $controlDate->format('Y-m-d H:i:s');
        $missed = $lastReportDate < $controlDate;
        echo "<br> missed";
        var_dump($missed);

        $date = \DateTime::createFromFormat('Y-m-d H:i:s', '2015-12-01 15:26:53');
        var_dump($date);


    }

    public function actionTestInterval()
    {

        $last_report = '2015-12-02 14:15:00';

        $lastReportDate = new \DateTime($last_report);
        $now = new \DateTime();


        $days= 2;

        //$interval = $end->diff($start);

        // массив соответсвий текущего дня недели и смещения текущей даты назад для определения факта просрочки
        $offset = [ 1 => 3, 2 => 4, 3 => 2, 4 => 2, 5=>2, 6 =>2, 7=> 2];

        $dayOfWeek = $now->format('w');
        //var_dump($dayOfWeek);

        $offeset = $offset[$dayOfWeek];
        // var_dump($offeset);

        // die();
        // разница в датах без учёта вызодных
        /*$days = $interval->days;
        echo 'days:';
        var_dump($days);

        // создаём итеративный период между последним отчётм и "сейчас" с шагом в 1 день
        $period = new \DatePeriod($start, new \DateInterval('P1D'), $end);

        foreach ($period as $dt) {
        //    echo '<br>'.
            // форматирование даты в "day of week"
       echo  $curr = $dt->format('D');
            // если в периоде встречается субота или воскресенье,
            // то уменьшаем число пролпущенных дней (не учитываем)
            if ($curr == 'Sat' || $curr == 'Sun') {
                $days--;
            }
        }*/

        //echo 'total missed: ';
        //echo $days;
        // $n = 3;
        //$end = new \DateTime();
    }

}
