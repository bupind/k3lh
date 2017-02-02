<?php
namespace frontend\controllers;

use backend\models\BigMatch;
use backend\models\BigMatchSearch;
use backend\models\Game;
use backend\models\Post;
use backend\models\Ticker;
use backend\models\Togel;
use backend\models\TogelSearch;
use common\vendor\AppConstants;
use Yii;
use yii\base\InvalidParamException;
use yii\data\Pagination;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends AppController {
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction'
            ],
        ];
    }
    
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        $this->layout = 'main';
        
        $firstNewsList = Post::find()
            ->where(['post_type_code' => AppConstants::POST_TYPE_NEWS])
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(2)
            ->all();
    
        $secondNewsList = Post::find()
            ->where(['post_type_code' => AppConstants::POST_TYPE_NEWS])
            ->orderBy(['created_at' => SORT_DESC])
            ->offset(2)
            ->limit(2)
            ->all();
        
        $bigMatch = BigMatch::find()
            ->andFilterWhere(['>=', 'DATE(match_date)', date('Y-m-d')])
            ->orderBy(['match_date' => SORT_ASC])
            ->one();
    
        // news ticker
        $newsTickers = Ticker::findAll(['ticker_status' => AppConstants::STATUS_YES]);
        $this->view->params['newsTickers'] = $newsTickers;
    
        // togel
        $togel = Togel::find()->orderBy(['togel_date' => SORT_DESC, 'id' => SORT_DESC])->one();
        $this->view->params['togel'] = $togel;
                
        return $this->render('index', [
            'newsList' => [
                $firstNewsList, $secondNewsList
            ],
            'bigMatch' => $bigMatch
        ]);
    }
    
    public function actionBonus() {
        $posts = Post::findAll(['post_type_code' => AppConstants::POST_TYPE_BONUS]);
        return $this->render('bonus', [
            'posts' => $posts
        ]);
    }
    
    public function actionProduk() {
        $games = Game::find()->all();
        return $this->render('product', [
            'games' => $games
        ]);
    }
    
    public function actionBerita() {
        $this->view->title = 'Berita';
    
        $query = Post::find()->where(['post_type_code' => AppConstants::POST_TYPE_NEWS]);
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 10
        ]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(['created_at' => SORT_DESC])
            ->all();
        
        return $this->render('post_list_thumb', [
            'posts' => $posts,
            'pages' => $pages
        ]);
    }
    
    public function actionPost($slug) {
        $post = Post::findOne(['slug' => $slug]);
        
        if (!empty($post->post_meta_description)) {
            $this->view->registerMetaTag([
                'name' => 'description',
                'content' => $post->post_meta_description
            ], AppConstants::META_DESCRIPTION);
        }
        
        if (!empty($post->post_meta_keyword)) {
            $this->view->registerMetaTag([
                'name' => 'keyword',
                'content' => $post->post_meta_keyword
            ], AppConstants::META_KEYWORD);
        }
        
        return $this->render('post', [
            'post' => $post
        ]);
    }
    
    public function actionBigMatchSchedule() {
        $searchModel = new BigMatchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
        return $this->render('big_match', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionTogel() {
        $searchModel = new TogelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
        return $this->render('togel', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionPanduan() {
        $this->view->title = 'Panduan';
        $posts = Post::findAll(['post_type_code' => AppConstants::POST_TYPE_GUIDE]);
        return $this->render('post_list', [
            'posts' => $posts
        ]);
    }
}
