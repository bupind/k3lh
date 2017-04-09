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
                                    'skko' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Dokument SKKO / SKI', 'type' => 'item'],
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
            $sectors = Sector::find()->all();
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
                                'road_map_program' => [
                                    'text' => 'Road Map Program',
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
                                                        's111' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Road Map K3', 'type' => 'item']
                                                    ]
                                                ]
                                            ],
                                            'lingkungan-hidup' => [
                                                'text' => 'Lingkungan Hidup',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        's121' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Road Map LH', 'type' => 'item']
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ]
                                ],
                                'rencana_kerja_anggaran' => [
                                    'text' => 'Rencana Kerja & Anggaran',
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
                                                        's211' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Workplan', 'type' => 'item'],
                                                        's212' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring RKAP K3', 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'lingkungan-hidup' => [
                                                'text' => 'Lingkungan Hidup',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        's221' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Workplan', 'type' => 'item'],
                                                        's222' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring RKAP LH', 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'persetujuan-anggaran' => [
                                                'text' => 'Persetujuan Anggaran',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '1' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload PDF Persetujuan Anggaran Operasi', 'type' => 'item'],
                                                        '2' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload PDF Persetujuan Anggaran Investasi', 'type' => 'item'],
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ]
                                ],
                                'data-lingkungan-hidup' => [
                                    'text' => 'Data Lingkungan Hidup',
                                    'type' => 'folder',
                                    'icon-class' => 'blue',
                                    'additionalParameters' => [
                                        'children' => [
                                            'dampak-lingkungan' => [
                                                'text' => 'Identifikasi Aspek Dampak Lingkungan',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '1' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload PDF Identifikasi Aspek Dampak Lingkungan', 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'proper' => [
                                                'text' => 'PROPER',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'pemenuhan-ketaatan' => [
                                                            'text' => 'Pemenuhan Ketaatan',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    'izin-dokumen-lingkungan' => [
                                                                        'text' => 'Izin Lingkungan & Dokumen Lingkungan',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '3211-1' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Izin & Dokumen Lingkungan', ['/environment-permit']), 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'pengendalian-pencemaran-air' => [
                                                                        'text' => 'Pengendalian Pencemaran Air',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '3212-1' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> ' . AppLabels::WATER_POLLUTION_CONTROL, ['/ppa', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                                '3212-2' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> ' . AppLabels::WATER_POLLUTION_CONTROL_BA, ['/ppa-ba', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'pengendalian-pencemaran-udara' => [
                                                                        'text' => 'Pengendalian Pencemaran Udara',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '3213-1' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> ' . AppLabels::AIR_POLLUTION_CONTROL , ['/ppu', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                                '3213-2' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> ' . AppLabels::AIR_POLLUTION_CONTROL . AppLabels::AMBIENT , ['/ppu-ambient', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'pengelolaan-limbah-b3' => [
                                                                        'text' => 'Pengelolaan Limbah B3',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '3214' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Pengelolaan Limbah B3', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ]
                                                                ]
                                                            ]
                                                        ],
                                                        'melebihi-ketaatan' => [
                                                            'text' => 'Melebihi Ketaatan',
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
                                                                                '3221' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian DRKPL', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'sml' => [
                                                                        'text' => 'Sistem Manajemen Lingkungan',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '3222' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian SML', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'efisiensi-energi' => [
                                                                        'text' => 'Efisiensi Energi',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '3223-1' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Program Efisiensi Energi', 'type' => 'item'],
                                                                                '3223-2' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian Efisiensi Energi', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'ppl-b3' => [
                                                                        'text' => 'Pengurangan & Pemanfaatan Limbah B3',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '3224-1' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Program PP Limbah B3', 'type' => 'item'],
                                                                                '3224-2' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian PP Limbah B3', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    '3r-non-b3' => [
                                                                        'text' => '3R Limbah Padat Non B3',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '3225-1' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Program 3R Limbah Padat Non B3', 'type' => 'item'],
                                                                                '3225-2' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian 3R Limbah Padat Non B3', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'pengurangan-pencemaran-udara' => [
                                                                        'text' => 'Pengurangan Pencemaran Udara',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '3226-1' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Program Pengurangan Pencemaran Udara', 'type' => 'item'],
                                                                                '3226-2' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian Pengurangan Pencemaran Udara', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'efisiensi-air' => [
                                                                        'text' => 'Efisiensi Air',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '3227-1' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Program Efisiensi Air & Penurunan Beban Pencemaran', 'type' => 'item'],
                                                                                '3227-2' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian Efisiensi Air & Penurunan Beban Pencemaran', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'keanekaragaman-hayati' => [
                                                                        'text' => 'Perlindungan Keanekaragaman Hayati',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '3228-1' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Program Keanekaragaman Hayati', 'type' => 'item'],
                                                                                '3228-2' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian Keanekaragaman Hayati', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'comdev' => [
                                                                        'text' => 'Community Development',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '3229-1' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Program COMDEV', 'type' => 'item'],
                                                                                '3229-2' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian COMDEV', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ]
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ],
                                            'monitoring-dokumen-perizinan-lingkungan' => [
                                                'text' => 'Monitoring Dokumen Lingkungan & Perizinan Lingkunan',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'monitoring-dokumen-lingkungan' => [
                                                            'text' => 'Monitoring Dokumen Lingkungan',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '32-1' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring Dokumen Lingkungan', 'type' => 'item']
                                                                ]
                                                            ]
                                                        ],
                                                        'monitoring-perizinan-lingkungan' => [
                                                            'text' => 'Monitoring Perizinan Lingkungan',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '32-2' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring Perizinan Lingkungan', 'type' => 'item']
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ],
                                            'monitoring-kewajiban-dokumen' => [
                                                'text' => 'Monitoring Kewajiban Dokumen Lingkungan & Perizinan',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '34' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring Kewajiban Lingkungan', 'type' => 'item']
                                                    ]
                                                ]
                                            ],
                                            'monitoring-permasalahan-lingkungan' => [
                                                'text' => 'Monitoring Permasalahan Lingkungan',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '35' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring Permasalahan Lingkungan', 'type' => 'item']
                                                    ]
                                                ]
                                            ],
                                            'data-lingkungan-hidup' => [
                                                'text' => 'Data Lingkungan Hidup',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'kajian-lingkungan' => [
                                                            'text' => 'Kajian Lingkungan',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '36-1' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Dokumen Kajian Lingkungan', 'type' => 'item']
                                                                ]
                                                            ]
                                                        ],
                                                        'pemantauan-lingkungan' => [
                                                            'text' => 'Pemantauan Lingkungan',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '36-2' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Hasil Pemantauan Lingkungan', 'type' => 'item']
                                                                ]
                                                            ]
                                                        ],
                                                        'pengelolaan-lingkungan' => [
                                                            'text' => 'Pengelolaan Lingkungan',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '36-3' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Laporan Program Pengelolaan Lingkungan', 'type' => 'item']
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ]
                                ],
                                'k2-k3' => [
                                    'text' => 'Data K2 / K3',
                                    'type' => 'folder',
                                    'icon-class' => 'blue',
                                    'additionalParameters' => [
                                        'children' => [
                                            'sertifikasi-laik-operasi' => [
                                                'text' => 'Monitoring Sertifikasi Laik Operasi Pembangkit',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'slo' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring SLO Pembangkit', 'type' => 'item']
                                                    ]
                                                ]
                                            ],
                                            'sertifikasi-peralatan' => [
                                                'text' => 'Monitoring Sertifikasi Peralatan',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'peralatan' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring Peralatan', 'type' => 'item']
                                                    ]
                                                ]
                                            ],
                                            'sertifikasi-kompetensi' => [
                                                'text' => 'Monitoring Sertifikasi Kompetensi Personil',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'kompetensi' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring Kompetensi Personil', 'type' => 'item']
                                                    ]
                                                ]
                                            ],
                                            'rapat-p2k3' => [
                                                'text' => 'Monitoring Rapat P2K3',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'notulen' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Notulen Rapat P2K3', 'type' => 'item']
                                                    ]
                                                ]
                                            ],
                                            'sr-fr' => [
                                                'text' => 'Severity Rate (SR) & Frequency Rate (FR)',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'sr' => [
                                                            'text' => 'Severity Rate (Tingkat Keparahan)',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    'sr-bulanan' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Nilai SR Bulanan', 'type' => 'item'],
                                                                    'sr-tahunan' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Nilai SR Tahunan', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'fr' => [
                                                            'text' => 'Frequency Rate (Tingkat Kekerapan)',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    'fr-bulanan' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Nilai FR Bulanan', 'type' => 'item'],
                                                                    'fr-tahunan' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Nilai FR Tahunan', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'jam-kerja' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Jam Kerja Unit Pembangkit', 'type' => 'item'],
                                                        'jumlah-karyawan' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Jumlah Karyawan Unit Pembangkit', 'type' => 'item'],
                                                        'kecelakaan-kerja' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Jumlah Kecelakaan Kerja', 'type' => 'item'],
                                                        'nearmiss' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Jumlah Nearmiss', 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'pemeriksaan-berkala' => [
                                                'text' => 'Pemeriksaan Kesehatan Berkala',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'form-pemeriksaan' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Pemeriksaan Kesehatan Berkala', 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'pembangkit' => [
                                                'text' => 'Pembangkit????',
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
                                                                    'form-hiradc' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form HIRADC', 'type' => 'item'],
                                                                    'form-k3' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Program Manajemen K3', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'proteksi-kebakaran' => [
                                                            'text' => 'Sistem Proteksi Kebaran',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    'inventarisasi' => [
                                                                        'text' => 'Inventarisasi Sistem Proteksi Kebakaran',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                'spk' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Inventarisasi SPK', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'pengecekan' => [
                                                                        'text' => 'Pengecekan Sistem Proteksi Kebakaran',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                'spk' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Pengecekan SPK', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'pengujian' => [
                                                                        'text' => 'Pengujian Sistem Proteksi Kebakaran',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                'spk' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Pengujian SPK', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ]
                                                                ]
                                                            ]
                                                        ],
                                                        'kesiapan-k3' => [
                                                            'text' => 'Kesiapan K3 Pada Pekerjaan',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    'safety-permit' => [
                                                                        'text' => 'Safety Permit',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                'sp' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Safety Permit', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'jsa' => [
                                                                        'text' => 'Job Safety Analysis',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                'jsa' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form JSA', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'safety-briefing' => [
                                                                        'text' => 'Safety Briefing',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                'jsa' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Absensi & Foto Safety Briefing', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'sop' => [
                                                                        'text' => 'Standard Operating Procedure & Instruksi Kerja',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                'sop-kerja' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload SOP / Instruksi Kerja', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'loto' => [
                                                                        'text' => 'LOTO',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                'form-loto' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form LOTO', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'pelindung-perlengkapan' => [
                                                                        'text' => 'Alat Pelindung Diri & Perlengkapan Keselamatan',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                'inventaris' => [
                                                                                    'text' => 'Inventaris APD',
                                                                                    'type' => 'folder',
                                                                                    'icon-class' => 'blue',
                                                                                    'additionalParameters' => [
                                                                                        'children' => [
                                                                                            'form-inventaris' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Inventaris APD', 'type' => 'item'],
                                                                                        ]
                                                                                    ]
                                                                                ],
                                                                                'pengecekan' => [
                                                                                    'text' => 'Pengecekan APD',
                                                                                    'type' => 'folder',
                                                                                    'icon-class' => 'blue',
                                                                                    'additionalParameters' => [
                                                                                        'children' => [
                                                                                            'form-pengecekan' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Pengecekan APD', 'type' => 'item'],
                                                                                        ]
                                                                                    ]
                                                                                ],
                                                                                'kesiapan' => [
                                                                                    'text' => 'Kesiapan APD',
                                                                                    'type' => 'folder',
                                                                                    'icon-class' => 'blue',
                                                                                    'additionalParameters' => [
                                                                                        'children' => [
                                                                                            'form-kesiapan' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Kesiapan APD', 'type' => 'item'],
                                                                                        ]
                                                                                    ]
                                                                                ]
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'pengawasan-k3' => [
                                                                        'text' => 'Pengawasan K3',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                'penunjukan' => [
                                                                                    'text' => 'Penunjukan Pengawas Pekerjaan & Pengawas K3',
                                                                                    'type' => 'folder',
                                                                                    'icon-class' => 'blue',
                                                                                    'additionalParameters' => [
                                                                                        'children' => [
                                                                                            '??' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Inventaris APD ????', 'type' => 'item'],
                                                                                        ]
                                                                                    ]
                                                                                ],
                                                                                'laporan' => [
                                                                                    'text' => 'Laporan Pengawasan K3',
                                                                                    'type' => 'folder',
                                                                                    'icon-class' => 'blue',
                                                                                    'additionalParameters' => [
                                                                                        'children' => [
                                                                                            '??' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Inventaris APD ????', 'type' => 'item'],
                                                                                        ]
                                                                                    ]
                                                                                ]
                                                                            ]
                                                                        ]
                                                                    ]
                                                                ]
                                                            ]
                                                        ],
                                                        'pengukuran-lingkungan-kerja' => [
                                                            'text' => 'Pengukuran Lingkungan Kerja',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    'form-pengukuran' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Pengukuran Lingkungan Kerja', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'inspeksi-observasi' => [
                                                            'text' => 'Inspeksi & Observasi K3',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    'inspeksi' => [
                                                                        'text' => 'Inspeksi K3',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                'form-inspeksi' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Inspeksi K3', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'observasi' => [
                                                                        'text' => 'Observasi K3',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                'form-observasi' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Observasi K3', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ]
                                                                ]
                                                            ]
                                                        ],
                                                        'visual-rambu' => [
                                                            'text' => 'Visual Manajemen & Rambu K3',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    'dokumen' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Dokumen VM & Rambu K3', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ]
                                ],
                                'laporan-k3l' => [
                                    'text' => 'Laporan K3L',
                                    'type' => 'folder',
                                    'icon-class' => 'blue',
                                    'additionalParameters' => [
                                        'children' => [
                                            'keselamatan-ketenagalistrikan' => [
                                                'text' => 'Laporan Kinerja Keselamatan Ketenagalistrikan',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'form-k2' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Kinerja K2', 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'lingkungan-hidup' => [
                                                'text' => 'Laporan Kinerja Lingkungan Hidup',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'form-tabulasi' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Tabulasi Pekerjaan LH', 'type' => 'item'],
                                                        'form-lh1' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form LH-01', 'type' => 'item'],
                                                        'form-lh2' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form LH-02', 'type' => 'item'],
                                                        'form-penilaian' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian Kinerja LH', 'type' => 'item'],
                                                        'form-ringkasan' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Ringkasan Pemantauan LH', 'type' => 'item'],
                                                        'form-neraca' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Neraca Limbah B3', 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'p2k3' => [
                                                'text' => 'Laporan P2K3',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        'form-p2k3' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Laporan P2K3', 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'rkl-rpl' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Laporan RKL RPL', 'type' => 'item'],
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ];
                }
                $items['additionalParameters']['children'] = $children;
            } else {
                $items['type'] = 'item';
            }
    
            $dataSector[$sector->id] = $items;
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
