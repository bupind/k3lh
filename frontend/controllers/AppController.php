<?php

namespace frontend\controllers;

use backend\models\Bank;
use backend\models\Popup;
use backend\models\Support;
use Yii;
use yii\web\Controller;
use frontend\models\Member;
use backend\models\Profile;
use common\vendor\AppConstants;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppController
 *
 * @author Joko Hermanto
 */
class AppController extends Controller {
        
    public function beforeAction($action) {
        parent::beforeAction($action);
    
        $this->layout = 'detail';
    
//        // GET WEB PROFILE SETTINGS, SAVE TO SESSION
//        $webProfile = Yii::$app->session->get(AppConstants::SES_WEB_PROFILE);
//        if (empty($webProfile)) {
            $webProfile = Profile::findOne(['active_status' => AppConstants::STATUS_YES]);
//            Yii::$app->session->set(AppConstants::SES_WEB_PROFILE, $webProfile);
//        }
    
        Yii::$app->params['web_profile'] = $webProfile;
        
        // set default meta tags
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => $webProfile->meta_description
        ], AppConstants::META_DESCRIPTION);
        $this->view->registerMetaTag([
            'name' => 'keyword',
            'content' => $webProfile->meta_keyword
        ], AppConstants::META_KEYWORD);
        $this->view->registerMetaTag([
            'name' => 'language',
            'content' => 'indonesia'
        ]);
        
        // support
        $supports = Support::findAll(['supp_status' => AppConstants::STATUS_YES]);
        $this->view->params['supports'] = $supports;
        
        // bank schedules
        $banks = Bank::find()->all();
        $this->view->params['banks'] = $banks;
    
        // popup
        $today = date('Y-m-d');
        $popup = Popup::find()
            ->where(['popup_status' => AppConstants::STATUS_YES])
            ->andWhere('(popup_start_date is null OR popup_start_date <= :today)', [':today' => $today])
            ->andWhere('(popup_end_date is null OR popup_end_date >= :today)', [':today' => $today])
            ->one();
        
        if (!empty($popup) && ($popup->popup_homepage_only == AppConstants::STATUS_NO || ($popup->popup_homepage_only == AppConstants::STATUS_YES && $this->action->id == 'index'))) {
            $this->view->params['popup'] = $popup;
        }
        
        $model = new Member(['scenario' => Member::SCENARIO_REGISTER]);
        $this->view->params['memberMdl'] = $model;
                
        return true;
    }
    
}
