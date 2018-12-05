<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\helpers\ArrayHelper;
use common\models\ImageUpload;
use common\models\UploadForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
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
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'editnew', 'tasks', 'addnew'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
       $query = \common\models\News::find();


        $news = $query->all();
        
        ArrayHelper::multisort($news, 'id', SORT_DESC);

       
        return $this->render('index', [
            'news' => $news
        ]);
    }
    
    public function actionEditnew($id)
    {
        $modelImg = new ImageUpload();
        //$new = \common\models\News::find()->where(['id' => $id])->one();
        $new = \common\models\News::findOne($id);
        $photos = \common\models\Photos::find()->where(['id_new' => $id])->all();
        
        $model = new UploadForm();
 
        if (Yii::$app->request->isPost) {
            $model->imageFiles = \yii\web\UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload($id)) {
                Yii::$app->session->setFlash('success', 'Фотографии успешно загружены');
                return $this->refresh();
            }
        }
        
         if ($new->load(Yii::$app->request->post())) {
             $path = $new->pic;
            $file = \yii\web\UploadedFile::getInstance($modelImg, 'image');
            if ($file != null) {
            $img = $modelImg->uploadFile($file);
            $new->setImage($img);
            }
            //
            $post = Yii::$app->request->post();
            $new->title = $post['News']['title'];
            $new->short = $post['News']['short'];
            $new->long = $post['News']['long'];
            $new->long = $post['News']['long'];
            $new->long = str_replace("\n", '<br>', $new->long);
            if ($new->save()) {
                if ($file != null) {
                $new->delImage($path);
                }
                Yii::$app->session->setFlash('success', 'Данные изменены');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Произошла ошибка');
            }

            
        } else {
        return $this->render('editnew', [
            'new' => $new,
            'modelImg' => $modelImg,
            'model' => $model,
            'photos' => $photos
        ]);
        }
    }
    
     public function actionAddnew()
    {
        $modelImg = new ImageUpload();
        $new = new \common\models\News();    
        
         if ($new->load(Yii::$app->request->post())) {
             
            $file = \yii\web\UploadedFile::getInstance($modelImg, 'image');
            
            $img = $modelImg->uploadFile($file);
            $new->setImage($img);
            
            
            $post = Yii::$app->request->post();
            $new->title = $post['News']['title'];
            $new->short = $post['News']['short'];
            $new->long = $post['News']['long'];
            $new->long = str_replace("\n", '<br>', $new->long);
            if ($new->save()) {
                Yii::$app->session->setFlash('success', 'Данные изменены');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Произошла ошибка');
            }

            
        } else {
        return $this->render('addnew', [
            'new' => $new,
            'modelImg' => $modelImg,
        ]);
        }
    }
    
    public function actionTasks()
    {
        
        $tasks = ContactForm::find()->all();
        $photos = \common\models\TasksPhotos::find()->all();
        
 
        return $this->render('tasks', [
            'tasks' => $tasks,
            'photos' => $photos
        ]);
        
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
