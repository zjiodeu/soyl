<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SkypeConsult;
use app\models\Krouching;
use app\models\Partners;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
	public $layuot = "";

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
		$articles = \app\models\Articles::find()->limit(6)->all();
		
		/*$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "webartua_soyl";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$a = mysqli_set_charset($conn, "utf8");
		$sql = "SELECT * FROM wacms_reviews";
		$query = mysqli_query($conn, $sql);
		
		while($r = mysqli_fetch_assoc($query)){
			
            $reviews = new Reviews();
			
			$reviews->isactive = $r["isactive"];

			$reviews->dt = $r["dt"];
			$reviews->subject = $r["subj"];
			$reviews->name = $r["nm"];
			$reviews->photo_path = $r["photo_code"];
			$reviews->video = $r["video"];
			$reviews->text = $r["tx"];
			
			$reviews->save();
        }*/
		
        return $this->render('index', ['articles' => $articles]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
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
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
	
	public function actionAboutcompany()
    {
        return $this->render('aboutcompany');
    }
	
	public function actionAboutavtor()
    {
		$this->layout = "aboutavtor";
	
        return $this->render('aboutavtor');
    }	
	
	public function actionPartners()
    {
		$this->layout = "aboutavtor";
		
		$model = new Partners();
		
		if ($model->load(Yii::$app->request->post())){
			$model->save();
		}
		
		return $this->render('partners', ['model' => new Partners()]);
    }
	
	public function actionTeach()
    {
		$this->layout = "aboutavtor";
	
        return $this->render('teach');
    }
	
	public function actionKrouching()
    {
        if(isset($_POST['fio'])){
			$krouch = new Krouching();
			
			$krouch->fio = $_POST['fio'];
			$krouch->email = $_POST['email'];
			$krouch->tel = $_POST['number'];
			$krouch->goal = $_POST['goal'];
			
			$krouch->save();
			
			echo 'Done';
		}
    }
}
