<?php

namespace backend\controllers;

use backend\models\Profile;
use common\vendor\AppLabels;
use Yii;
use yii\web\Controller;
use common\vendor\AppConstants;
use yii\web\ForbiddenHttpException;
use mPDF;

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
        
        // GET WEB PROFILE SETTINGS, SAVE TO SESSION
        $webProfile = Yii::$app->session->get(AppConstants::SES_WEB_PROFILE);    
        if (empty($webProfile)) {
            $webProfile = Profile::findOne(['active_status' => AppConstants::STATUS_YES]);
            Yii::$app->session->set(AppConstants::SES_WEB_PROFILE, $webProfile);
        }
        
        Yii::$app->params['web_profile'] = $webProfile;
        
        /*
         * d($this->action->id); // action name. eg: index, create, etc
         * d($this->id); // controller name. eg: city, supplier, etc
         */
        
        return true;
        
    }
    
    public function rbac() {
        $authName = sprintf('%s-%s', $this->id, $this->action->id);
        
        if (Yii::$app->user->can($authName)) {
            return true;
        } else {
            throw new ForbiddenHttpException;
        }
    }
    
    public function printing($model, $title, $view = 'printing') {
        $stylesheet = file_get_contents(Yii::getAlias(AppConstants::THEME_PRINT_CSS));
        $content = $this->renderPartial($view, [
            'model' => $model,
        ]);
        $filename = strtolower(str_replace(' ', '_', $title)) . '_' . date('dmYHis') . '.pdf';
        
        $pdf = new mPDF('utf-8', [216, 140], 12, 'Tahoma', 5, 7, 5, 5);
        
        $pdf->SetTitle(sprintf('%s %s', strtoupper(AppLabels::BTN_PRINT), $title));
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($content, 2);
        $pdf->Output($filename, 'I');
        
        exit;
    }
    
    public function printingGridView($params, $title, $view = 'printing') {
        $stylesheet = file_get_contents(Yii::getAlias(AppConstants::THEME_PRINT_CSS));
        $content = $this->renderPartial($view, $params);
        $filename = strtolower(str_replace(' ', '_', $title)) . '_' . date('dmYHis') . '.pdf';
    
        $pdf = new mPDF('utf-8', [216, 140], 12, 'Tahoma', 5, 7, 5, 5);
    
        $pdf->SetTitle(sprintf('%s %s', strtoupper(AppLabels::BTN_PRINT), $title));
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($content, 2);
        $pdf->Output($filename, 'I');
    
        exit;
    }
    
}
