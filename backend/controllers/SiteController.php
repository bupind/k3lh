<?php

namespace backend\controllers;

use backend\models\LoginHistory;
use backend\models\Sector;
use backend\models\User;
use common\models\LoginForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\helpers\Json;

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
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'report', 'backup-db', 'tree-main-office', 'tree-sector'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }
    
    public function actionError() {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            
            if (\Yii::$app->user->isGuest) {
                $this->layout = 'error-guest';
            }
            
            return $this->render('error', ['exception' => $exception]);
        }
        
        return true;
    }

    public function actionIndex() {
        $user = User::findOne(['id' => Yii::$app->user->id]);
        return $this->render('index', [
            'user' => $user
        ]);
    }
    
    public function actionTreeMainOffice() {
        $sector = Sector::findOne(['sector_code' => AppConstants::SECTOR_CONSTANT_PARENT_OFFICE]);
        $dataMainOffice = [
            'road-map' => [
                'text' => 'Road Map K3L KITSBS',
                'type' => 'folder',
                'icon-class' => 'blue',
                'additionalParameters' => [
                    'children' => [
                        'k3' => [
                            'text' => 'K3',
                            'type' => 'folder',
                            'icon-class' => 'blue',
                            'additionalParameters' => [
                                'children' => [
                                    'form-k3' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Road Map K3', ['/roadmap-k3l', 'rmt' => AppConstants::FORM_TYPE_K3]), 'type' => 'item'],
                                ]
                            ]
                        ],
                        'lingkungan-hidup' => [
                            'text' => 'Lingkungan Hidup',
                            'type' => 'folder',
                            'icon-class' => 'blue',
                            'additionalParameters' => [
                                'children' => [
                                    'form-lh' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Road Map LH', ['/roadmap-k3l', 'rmt' => AppConstants::FORM_TYPE_LH]), 'type' => 'item'],
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'rkap-k3l' => [
                'text' => 'RKAP K3L',
                'type' => 'folder',
                'icon-class' => 'blue',
                'additionalParameters' => [
                    'children' => [
                        'k3' => [
                            'text' => 'K3',
                            'type' => 'folder',
                            'icon-class' => 'blue',
                            'additionalParameters' => [
                                'children' => [
                                    's211' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Workplan K3', ['/working-plan', 'wpt' => AppConstants::FORM_TYPE_K3]), 'type' => 'item'],
                                    's212' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring Anggaran K3', ['/budget-monitoring', 'bmt' => AppConstants::FORM_TYPE_K3]), 'type' => 'item'],
                                ]
                            ]
                        ],
                        'lingkungan-hidup' => [
                            'text' => 'Lingkungan Hidup',
                            'type' => 'folder',
                            'icon-class' => 'blue',
                            'additionalParameters' => [
                                'children' => [
                                    's221' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Workplan LH', ['/working-plan', 'wpt' => AppConstants::FORM_TYPE_LH]), 'type' => 'item'],
                                    's222' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring Anggaran LH', ['/budget-monitoring', 'bmt' => AppConstants::FORM_TYPE_LH]), 'type' => 'item'],
                                ]
                            ]
                        ],
                        'persetujuan-anggaran' => [
                            'text' => 'Persetujuan Anggaran',
                            'type' => 'folder',
                            'icon-class' => 'blue',
                            'additionalParameters' => [
                                'children' => [
                                    'skko' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Dokumen SKKO / SKI', ['/skko', '_sId' => $sector->id]), 'type' => 'item'],
                                ]
                            ]
                        ],
                    ]
                ]
            ],
            'peraturan-lh' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Daftar Peraturan & Standar LH', 'type' => 'item'],
            'peraturan-k3' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Daftar Peraturan & Standar K3', 'type' => 'item'],
            'training-k3l' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Training K3L', 'type' => 'item'],
            'stakeholder' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Daftar Stakeholder', 'type' => 'item'],
            'data-sektor' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Monitoring Data Sektor', 'type' => 'item'],
            'create-form-smk3' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> SMK3', ['/smk3']), 'type' => 'item'],
            'maturity-level' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> ' . AppLabels::MATURITY_LEVEL, ['/maturity-level']), 'type' => 'item'],
        ];
    
        $json = Json::encode($dataMainOffice);
        return $json;
    }
    
    public function actionTreeSector() {
        $user = User::findOne(['id' => Yii::$app->user->id]);
        $sectors = [];
        
        if ($user->isAdmin()) {
            $sectors = Sector::find()->orderBy(['sector_order' => SORT_ASC])->all();
        } else {
            foreach ($user->userSectors as $userSector) {
                $sectors[] = $userSector->sector;
            }
        }
        
        $dataSector = [];
        
        foreach ($sectors as $sector) {
            $items = [
                'text' => $sector->sector_name,
                'icon-class' => 'green'
            ];
            
            if (!empty($sector->powerPlants)) {
                $items['type'] = 'folder';
                $children = [];
                foreach ($sector->powerPlants as $powerPlant) {
                    $children[$powerPlant->id] = [
                        'text' => $powerPlant->pp_name,
                        'type' => 'folder',
                        'icon-class' => 'orange',
                        'additionalParameters' => [
                            'children' => [
                                'kebijakan-k3l' => [
                                    'text' => 'Kebijakan K3L',
                                    'type' => 'folder',
                                    'icon-class' => 'blue',
                                    'additionalParameters' => [
                                        'children' => [
                                            'kebijakan-lingkungan' => [
                                                'text' => 'Kebijakan Lingkungan',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '1111' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_ENVIROMENTAL_POLICY, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_ENVIRONMENT_POLICY, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'kebijakan-k3' => [
                                                'text' => 'Kebijakan K3',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '1121' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_K3_POLICY, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_K3_POLICY, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ]
                                ],
                                'roadmap-k3l' => [
                                    'text' => 'RoadMAP K3L',
                                    'type' => 'folder',
                                    'icon-class' => 'blue',
                                    'additionalParameters' => [
                                        'children' => [
                                            'roadmap-lingkungan' => [
                                                'text' => 'Roadmap Lingkungan',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '2211' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Roadmap Lingkungan', ['/roadmap-k3l', 'rmt' => AppConstants::FORM_TYPE_LH]), 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'roadmap-k3' => [
                                                'text' => 'Roadmap K3',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '2221' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Roadmap K3', ['/roadmap-k3l', 'rmt' => AppConstants::FORM_TYPE_K3]), 'type' => 'item'],
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ]
                                ],
                                'rkap' => [
                                    'text' => 'RKAP',
                                    'type' => 'folder',
                                    'icon-class' => 'blue',
                                    'additionalParameters' => [
                                        'children' => [
                                            'rencana-kerja-lingkungan' => [
                                                'text' => 'Rencana Kerja Lingkungan',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '3311' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Workplan Lingkungan', ['/working-plan', 'wpt' => AppConstants::FORM_TYPE_LH]), 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'rencana-kerja-k3' => [
                                                'text' => 'Rencana Kerja K3',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '3321' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Workplan K3', ['/working-plan', 'wpt' => AppConstants::FORM_TYPE_K3]), 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'anggaran-lingkungan' => [
                                                'text' => 'Anggaran Lingkungan',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '3331' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring Anggaran Lingkungan', ['/budget-monitoring', 'bmt' => AppConstants::FORM_TYPE_LH]), 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'anggaran-k3' => [
                                                'text' => 'Anggaran K3',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '3341' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring Anggaran K3', ['/budget-monitoring', 'bmt' => AppConstants::FORM_TYPE_K3]), 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'persetujuan-anggaran' => [
                                                'text' => 'Persetujuan Anggaran',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '3351' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload PAO/SKKO', 'type' => 'item'],
                                                        '3352' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Dokumen SKKO / SKI', ['/skko', '_sId' => $sector->id]), 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'monitoring-proses-kontrak' => [
                                                'text' => 'Monitoring Proses Kontrak',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '3361' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring Proses Kontrak', ['/contract-monitoring', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ]
                                ],
                                'data-lingkungan-pembangkit' => [
                                    'text' => 'Data Lingkungan Pembangkit',
                                    'type' => 'folder',
                                    'icon-class' => 'blue',
                                    'additionalParameters' => [
                                        'children' => [
                                            'identifikasi-aspek-dampak-lingkungan' => [
                                                'text' => 'Identifikasi Aspek Dampak Lingkungan',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '1111' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_IADL, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_IADL, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'proper-memenuhi-ketaatan' => [
                                                'text' => 'Proper Memenuhi Ketaatan',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'izin-lingkungan-dan-dokumen-lingkungan' => [
                                                            'text' => 'Izin Lingkungan dan Dokumen Lingkungan',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '0' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Izin & Dokumen Lingkungan', ['/environment-permit', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44211' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Profile Perusahaan', ['/environment-permit-company-profile', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44212' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Pengesahan Dokumen', 'type' => 'item'],
                                                                    '44213' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Izin Lingkungan', 'type' => 'item'],
                                                                    '44214' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload SKKLH/Rekomendasi UKL UPL', 'type' => 'item'],
                                                                    '44215' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Cover Dokumen Lingkungan', 'type' => 'item'],
                                                                    '44216' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Pelaporan', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'pengendalian-pencemaran-air' => [
                                                            'text' => 'Pengendalian Pencemaran Air',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '44221' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> ' . AppLabels::WATER_POLLUTION_CONTROL , ['/ppa', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44222' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> ' . AppLabels::PPA_BA , ['/ppa-ba', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    ]
                                                            ]
                                                        ],
                                                        'pengendalian-pencemaran-udara' => [
                                                            'text' => 'Pengendalian Pencemaran Udara',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '44231' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> ' . AppLabels::AIR_POLLUTION_CONTROL , ['/ppu', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44232' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> ' . AppLabels::AIR_POLLUTION_CONTROL ." " . AppLabels::AMBIENT , ['/ppu-ambient', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    ]
                                                            ]
                                                        ],
                                                        'pengelolaan-limbah-b3' => [
                                                            'text' => 'Pengelolaan Limbah B3',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '44241' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Self Assessment', ['/plb3-self-assessment', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44242' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Neraca', ['/plb3-balance-sheet', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44243' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Checklist', ['/plb3-checklist', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                    ]
                                                ]
                                            ],
                                            'proper-melebihi-ketaatan' => [
                                                'text' => 'Proper Melebihi Ketaatan',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'drkpl' => [
                                                            'text' => 'DRKPL',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '44311' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian DRKPL (Lamp V, Permen LH 03/2014)', ['/beyond-obedience', 'bot' => AppConstants::FORM_TYPE_DRKPL, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44312' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload DRKPL', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'sistem-manajemen-lingkungan' => [
                                                            'text' => 'Sistem Manajemen Lingkungan',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '44321' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian SML (Lamp V, Permen LH 03/2014)', ['/beyond-obedience', 'bot' => AppConstants::FORM_TYPE_SML, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44322' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Sertifikat SML', 'type' => 'item'],
                                                                    '44323' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Laporan Audit Internal', 'type' => 'item'],
                                                                    '44324' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Laporan Audit Eksternal', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'efisiensi-energi' => [
                                                            'text' => 'Efisiensi Energi',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '44331' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian Efisiensi Energi (Lamp V, Permen LH 03/2014)', ['/beyond-obedience', 'bot' => AppConstants::FORM_TYPE_EE, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44332' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Program Efisiensi Energi', ['/beyond-obedience-program', 'bopt' => AppConstants::FORM_TYPE_EE, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44333' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Renstra', 'type' => 'item'],
                                                                    '44334' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Audit Energy', 'type' => 'item'],
                                                                    '44335' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Verifikasi Data', 'type' => 'item'],
                                                                    '44336' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Data Benchmarking', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'penurunan-emisi' => [
                                                            'text' => 'Penurunan Emisi',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '44341' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian Penurunan Emisi (Lamp V, Permen LH 03/2014)', ['/beyond-obedience', 'bot' => AppConstants::FORM_TYPE_PGPU, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44342' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Program Penurunan Emisi', ['/beyond-obedience-program', 'bopt' => AppConstants::FORM_TYPE_PGPU, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44343' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Renstra', 'type' => 'item'],
                                                                    '44344' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Audit Energy', 'type' => 'item'],
                                                                    '44345' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Verifikasi Data', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'program-konservasi-air' => [
                                                            'text' => 'Program Konservasi Air',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '44351' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian Konservasi Air (Lamp V, Permen LH 03/2014)', ['/beyond-obedience', 'bot' => AppConstants::FORM_TYPE_KA, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44352' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Program Konservasi Air', ['/beyond-obedience-program', 'bopt' => AppConstants::FORM_TYPE_KA, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44353' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Program Penurunan Beban Pencemaran', ['/beyond-obedience-program', 'bopt' => AppConstants::FORM_TYPE_PBP, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44354' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Renstra', 'type' => 'item'],
                                                                    '44355' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Audit Energy', 'type' => 'item'],
                                                                    '44356' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Verifikasi Data', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'keanekaragaman-hayati' => [
                                                            'text' => 'Keanegaragaman Hayati',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '44361' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian Keanekaragaman Hayati (Lamp V, Permen LH 03/2014)', ['/beyond-obedience', 'bot' => AppConstants::FORM_TYPE_KH, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44362' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Program Keanekaragaman Hayati', ['/beyond-obedience-program', 'bopt' => AppConstants::FORM_TYPE_KH, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44363' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Renstra', 'type' => 'item'],
                                                                    '44364' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Audit Energy', 'type' => 'item'],
                                                                    '44365' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Verifikasi Data', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'pengurangan-dan-pemanfaatan-limbah-b3' => [
                                                            'text' => 'Pengurangan dan Pemanfaatan Limbah B3',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '44371' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian Peng & Peman LB3 (Lamp V, Permen LH 03/2014)', ['/beyond-obedience', 'bot' => AppConstants::FORM_TYPE_PPLB3, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44372' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Program Peng & Peman LB3', ['/beyond-obedience-program', 'bopt' => AppConstants::FORM_TYPE_PPLB3, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44373' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Renstra', 'type' => 'item'],
                                                                    '44374' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Audit Energy', 'type' => 'item'],
                                                                    '44375' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Verifikasi Data', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        '3r-limbah-padat-non-b3' => [
                                                            'text' => '3R Limbah Padat Non B3',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '44381' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian 3R (Lamp V, Permen LH 03/2014)', ['/beyond-obedience', 'bot' => AppConstants::FORM_TYPE_PPLNB3, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44382' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Program 3R', ['/beyond-obedience-program', 'bopt' => AppConstants::FORM_TYPE_PPLNB3, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44383' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Renstra', 'type' => 'item'],
                                                                    '44384' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Audit Energy', 'type' => 'item'],
                                                                    '44385' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Verifikasi Data', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'community-development' => [
                                                            'text' => 'Community Development',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '44391' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian Comdev (Lamp V, Permen LH 03/2014)', ['/beyond-obedience', 'bot' => AppConstants::FORM_TYPE_CD, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44392' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Program Comdev', ['/beyond-obedience-comdev', 'boct' => AppConstants::FORM_TYPE_CD, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '44393' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Dokumen Social Mapping', 'type' => 'item'],
                                                                    '44394' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Laporan Comdev', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                    ]
                                                ]
                                            ],
                                        ]
                                    ]

                                ],
                                'data-k3-pembangkit' => [
                                    'text' => 'Data K3 Pembangkit',
                                    'type' => 'folder',
                                    'icon-class' => 'blue',
                                    'additionalParameters' => [
                                        'children' => [
                                            'hiradc' => [
                                                'text' => 'HIRADC',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '5511' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_HIRADC, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_HIRADC, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'sertifikasi-wajib' => [
                                                'text' => 'Sertifikasi Wajib',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'smk3' => [
                                                            'text' => 'SMK3',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55211' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SMK3', 'type' => 'item'],
                                                                    '55212' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Sertifikat SMK3', 'type' => 'item'],
                                                                    '55213' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload eviden SMK3 per kategori', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'slo-pembangkit' => [
                                                            'text' => 'SLO Pembangkit',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55221' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring SLO Pembangkit', ['/slo-generator', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'slo-peralatan' => [
                                                            'text' => 'SLO Peralatan',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55231' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring SLO Peralatan', ['/slo-tools', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'sertifikasi-k3-personil' => [
                                                            'text' => 'Sertifikasi K3 Personil',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55241' => ['text' =>  Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring Sertifikasi Personil', ['/competency-certification', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                    ]
                                                ]
                                            ],
                                            'pelaksanaan-pekerjaan' => [
                                                'text' => 'Pelaksanaan Pekerjaan',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'sebelum-pekerjaan' => [
                                                            'text' => 'Sebelum Pekerjaan',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    'izin-kerja' => [
                                                                        'text' => 'Izin Kerja',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '553111' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> ' . AppLabels::FORM_WORKING_PERMIT, ['/working-permit', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'job-safety-analysis' => [
                                                                        'text' => 'Job Safety Analysis',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '553121' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_JSA, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_JSA, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'sop-pekerjaan' => [
                                                                        'text' => 'SOP Pekerjaan',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '553131' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_WORK_SOP, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_WORK_SOP, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'kompetensi-pekerja' => [
                                                                        'text' => 'Kompetensi Pekerja',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '553141' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_COMPETENCY_CERTIFICATE, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_COMPETENCY_CERTIFICATE, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                                '553142' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_COMPETENCY_SUPERVISOR, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_COMPETENCY_SUPERVISOR, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'apd' => [
                                                                        'text' => 'APD',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '553151' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_APD, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_APD, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'lock-out-tag-out' => [
                                                                        'text' => 'Lock Out Tag Out',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '553161' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_LOTO_ACTIVITY, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_LOTO, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'safety-briefing' => [
                                                                        'text' => 'Safety Briefing',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                'pengawasan-k3' => [
                                                                                    'text' => 'Pengawasan K3',
                                                                                    'type' => 'folder',
                                                                                    'icon-class' => 'blue',
                                                                                    'additionalParameters' => [
                                                                                        'children' => [
                                                                                            '5531711' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Laporan Pengawasan K3', 'type' => 'item'],
                                                                                            '5531712' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Penunjukan Pengawas', 'type' => 'item'],
                                                                                            '5531713' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Sertifikat Pengawas', 'type' => 'item'],
                                                                                        ]
                                                                                    ]
                                                                                ],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                ]
                                                            ]
                                                        ],
                                                    ]
                                                ]
                                            ],
                                            'pengendalian-kebakaran' => [
                                                'text' => 'Pengendalian Kebakaran',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'apar' => [
                                                            'text' => 'APAR',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '554111' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring APAR', ['/monitoring-apar', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'apat' => [
                                                            'text' => 'APAT',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '554121' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_APAT, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_APAT, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'hydrant' => [
                                                            'text' => 'Hydrant',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '554131' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Checklist Hydrant', ['/hydrant-checklist', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '554132' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Pengujian Hydrant', 'type' => 'item'],
                                                                    '554133' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Hydrant', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'sprinkle' => [
                                                            'text' => 'Sprinkle',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '554141' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring Sprinkle', 'type' => 'item'],
                                                                    '554142' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Sprinkle', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'detector-alarm' => [
                                                            'text' => 'Detector-Alarm',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '554151' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring Detector Alarm', ['/fire-detector', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'tim-tanggap-darurat' => [
                                                            'text' => 'Tim Tanggap Darurat',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '554161' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_EMERGENCY_TEAM, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_EMERGENCY_TEAM, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '554162' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_FIRE_OFFICER_CERTIFICATE, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_FIRE_OFFICER_CERTIFICATE, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'simulasi-tanggap-darurat' => [
                                                            'text' => 'Simulasi Tanggap Darurat',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '554171' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Evaluasi Tanggap Darurat', ['/emergency-response', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                    ]
                                                ]
                                            ],
                                            'pengendalian-k3' => [
                                                'text' => 'Pengendalian K3',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'p3k' => [
                                                            'text' => 'P3K',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55511' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_P3K, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_P3K, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'fasilitas-kesehatan-kerja' => [
                                                            'text' => 'Fasilitasi Kesehatan Kerja',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55521' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_CLINIC, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_CLINIC, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '55522' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_COMPANY_DOCTOR, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_COMPANY_DOCTOR, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '55523' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_AMBULANCE, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_AMBULANCE, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '55524' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_P3K_OFFICER_CERTIFICATE, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_P3K_OFFICER_CERTIFICATE, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'safety-campaign' => [
                                                            'text' => 'Safety Campaign (ex. Sosialisasi)',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55531' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring Safety Campaign', ['/safety-campaign', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'housekeeping' => [
                                                            'text' => 'Housekeeping/5S',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55541' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian 5S', ['/housekeeping-implementation', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'visual-management' => [
                                                            'text' => 'Visual Management',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55551' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_K3_SIGN, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_K3_SIGN, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                    '55552' => ['text' => Html::a('<i class="ace-icon fa fa-upload blue"></i> ' . AppLabels::UPLOAD_INFORMATION_BOARD, ['/common-upload', 'utc' => AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE_INFORMATION_BOARD, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'insepeksi-observasi' => [
                                                            'text' => 'Inspeksi & Observasi K3',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55561' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Inspeksi', 'type' => 'item'],
                                                                    '55562' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Temuan Inspeksi', 'type' => 'item'],
                                                                    '55563' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Kartu Observasi Perilaku', 'type' => 'item'],
                                                                    '55564' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Temuan Inspeksi', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                    ]
                                                ]
                                            ],
                                            'monitoring-k3' => [
                                                'text' => 'Monitoring K3',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'monitoring-apd' => [
                                                            'text' => 'Monitoring APD',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55611' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring APD', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'monitoring-lingkungan-kerja' => [
                                                            'text' => 'Monitoring Lingkungan Kerja',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55621' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Data Lingkungan Kerja', ['/working-env-data', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'monitoring-pemeriksaan-kesehatan' => [
                                                            'text' => 'Monitoring Pemeriksaan Kesehatan',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55631' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring P3K', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'monitoring-rapat-p2k3' => [
                                                            'text' => 'Monitoring Rapat P2K3',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55641' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Rapat P2K3', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'monitoring-nomor-telpon-penting' => [
                                                            'text' => 'Monitoring Nomor Telepon Penting',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55651' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Nomor Telepon Penting', ['/important-phone-number', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'data-nearmiss' => [
                                                            'text' => 'Data Nearmiss',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55661' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Data Nearmiss', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'data-kecelakaan-kerja' => [
                                                            'text' => 'Data Kecelakaan Kerja',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55671' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Kecelakaan Kerja', 'type' => 'item'],
                                                                    '55672' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Kecelakaan Kerja', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'data-kecelakaan-instalasi' => [
                                                            'text' => 'Data Kecelakaan Instalasi',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55681' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Kecelakaan Instalasi', 'type' => 'item'],
                                                                    '55682' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Kecelakaan Instalasi', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'data-kecelakaan-umum' => [
                                                            'text' => 'Data Kecelakaan Umum',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55691' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Kecelakaan Umum', 'type' => 'item'],
                                                                    '55692' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Kecelakaan Umum', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'data-jam-kerja' => [
                                                            'text' => 'Data Jam Kerja',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '556101' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Jam Kerja', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                    ]
                                                ]
                                            ],
                                            'risk-rating-pembangkit' => [
                                                'text' => 'Risk Rating Pembangkit',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '5571' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian Risk Rating', 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                        ]
                                    ]
                                ],
                                'permasalahan-k3' => [
                                    'text' => 'Permasalahan K3',
                                    'type' => 'folder',
                                    'icon-class' => 'blue',
                                    'additionalParameters' => [
                                        'children' => [
                                            'monitoring-permasalahan' => [
                                                'text' => 'Monitoring Permasalahan',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '6611' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring Permasalahan', ['/k3l-problem', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'rencana-mitigasi' => [
                                                'text' => 'Rencana Mitigasi',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '6621' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> ' . AppLabels::FORM_PROJECT_TRACKING, ['/project-tracking', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                        ]
                                    ]
                                ],
                                'laporan-k3l' => [
                                    'text' => 'Laporan K3L',
                                    'type' => 'folder',
                                    'icon-class' => 'blue',
                                    'additionalParameters' => [
                                        'children' => [
                                            'maturity-level-k3l' => [
                                                'text' => 'Maturity Level K3L',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '7711' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form ML K3L', 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'laporan-p2k3-disnaker' => [
                                                'text' => 'Laporan P2K3 Disnaker',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '7721' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Laporan P2K3', 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'laporan-kecelakaan-instalasi' => [
                                                'text' => 'Laporan Kecelakaan Instalasi',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [

                                                    ]
                                                ]
                                            ],
                                            'laporan-investigasi' => [
                                                'text' => 'Laporan Investigasi',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [

                                                    ]
                                                ]
                                            ],
                                        ]
                                    ]
                                ],
                                'dokumentasi-kegiatan-k3l' => [
                                    'text' => 'Dokumentasi Kegiatan K3L',
                                    'type' => 'folder',
                                    'icon-class' => 'blue',
                                    'additionalParameters' => [
                                        'children' => [
                                            'data' => [
                                                'text' => 'Data',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '8811' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Data', 'type' => 'item'],
                                                        '8812' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Dokumen/Foto', 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                        ]
                                    ]
                                ],
                            ]
                        ]
                    ];
                }
                $items['additionalParameters']['children'] = $children;
            } else {
                $items['type'] = 'item';
            }
    
            $dataSector[$sector->sector_order] = $items;
        }
    
        $json = Json::encode($dataSector);
        return $json;
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $this->layout = 'login';
            return $this->render('login', ['model' => $model]);
        }
    }

    public function actionLogout() {
        $loginHistoryMdl = new LoginHistory();
        $loginHistoryMdl->logout();
        
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionReport() {
        return $this->render('report');
    }

    public function actionBackupDb() {
        ## GET DB
        $setting = Yii::$app->session->get('setting');
        //$database = Yii::$app->getDb();
        $database = 'bengkel';
        $appName = strtolower(str_replace(' ', '', $setting->app_name));
        
        ## create directory for storing the file
        $backup_dir = "D:/backup_db/" . $appName;
        if (!is_dir($backup_dir)) {
            mkdir($backup_dir, true);
        }

        # create files levels by year, month, date.
        $year = date('Y');
        if (!is_dir("$backup_dir/$year")) {
            mkdir("$backup_dir/$year");
        }
        $month = date('m');
        if (!is_dir("$backup_dir/$year/$month")) {
            mkdir("$backup_dir/$year/$month");
        }

        $dir = "$backup_dir/$year/$month";
        # run mysqldump
        //$today = date('H-i');
        $today = date('Y-m-d');
        exec("mysqldump -u root $database > $dir/{$appName}_$today.sql");

        Yii::$app->session->setFlash('success', 'Data berhasil di-backup.');
        return $this->goHome();
    }

}
