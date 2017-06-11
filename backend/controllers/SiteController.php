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
                                                        '1111' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Kebijakan Lingkungan', 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'kebijakan-k3' => [
                                                'text' => 'Kebijakan K3',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '1121' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Kebijakan K3', 'type' => 'item'],
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
                                                        '1111' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload IADL', 'type' => 'item'],
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
                                                                    '44211' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Profil Perusahaan', 'type' => 'item'],
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
                                                                    '44221' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Titik Penaatan & Izin', 'type' => 'item'],
                                                                    '44222' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Parameter Pelaporan BM', 'type' => 'item'],
                                                                    '44223' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Debit Air Limbah Harian & Upload PH Harian (upload bulanan)', 'type' => 'item'],
                                                                    '44224' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Ketentuan Teknis', 'type' => 'item'],
                                                                    '44225' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Penurunan Beban Pencemaran', 'type' => 'item'],
                                                                    '44226' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA BM Beban Pencemaran', 'type' => 'item'],
                                                                    '44227' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Beban Pencemaran Aktual', 'type' => 'item'],
                                                                    '44228' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Badan Air Titik Pemantauan', 'type' => 'item'],
                                                                    '44229' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Badan Air Parameter Pelaporan BM', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'pengendalian-pencemaran-udara' => [
                                                            'text' => 'Pengendalian Pencemaran Udara',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '44231' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Inventarisasi Sumber Emisi', 'type' => 'item'],
                                                                    '44232' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Titik Penatan', 'type' => 'item'],
                                                                    '44233' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Ketaatan Parameter Pelaporan BM', 'type' => 'item'],
                                                                    '44234' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Beban Emisi GRK', 'type' => 'item'],
                                                                    '44235' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Ketentuan Teknis', 'type' => 'item'],
                                                                    '44236' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Beban Pencemaran Aktual', 'type' => 'item'],
                                                                    '44237' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA CEMS Inventarisasi Titik Penaatan', 'type' => 'item'],
                                                                    '44238' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Pelaporan & BM CEMS', 'type' => 'item'],
                                                                    '44239' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Pelaporan CEMS Sox', 'type' => 'item'],
                                                                    '442310' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Pelaporan CEMS Partikulat', 'type' => 'item'],
                                                                    '442311' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Pelaporan CEMS Nox', 'type' => 'item'],
                                                                    '442312' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Pelaporan CEMS CS2', 'type' => 'item'],
                                                                    '442313' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Pelaporan CEMS H2S', 'type' => 'item'],
                                                                    '442314' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Pelaporan CEMS Cl2', 'type' => 'item'],
                                                                    '442315' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Pelaporan CEMS TRS', 'type' => 'item'],
                                                                    '442316' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Pelaporan CEMS ClO3', 'type' => 'item'],
                                                                    '442317' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Beban Emisi CEMS', 'type' => 'item'],
                                                                    '442318' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Beban Emisi GRK CEMS', 'type' => 'item'],
                                                                    '442319' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Ketentuan Teknis CEMS', 'type' => 'item'],
                                                                    '442320' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Ambien Titik Pemantauan', 'type' => 'item'],
                                                                    '442321' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Ambien Ketaatan Parameter Pelaporan BM', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'pengelolaan-limbah-b3' => [
                                                            'text' => 'Pengelolaan Limbah B3',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '44241' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Profil Perusahaan', 'type' => 'item'],
                                                                    '44242' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Identifikasi Limbah B3', 'type' => 'item'],
                                                                    '44243' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Pengelolaan LB3', 'type' => 'item'],
                                                                    '44244' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Izin Penyimpanan ', 'type' => 'item'],
                                                                    '44245' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Izin Pemanfaatan', 'type' => 'item'],
                                                                    '44246' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Izin Penimbunan', 'type' => 'item'],
                                                                    '44247' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload PKS Pemanfaat', 'type' => 'item'],
                                                                    '44248' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Izin Pemanfaat', 'type' => 'item'],
                                                                    '44249' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Surat Pernyataan', 'type' => 'item'],
                                                                    '442410' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload PKS Pengangkut', 'type' => 'item'],
                                                                    '442411' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Rekomendasi Pengangkutan', 'type' => 'item'],
                                                                    '442412' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Izin Pengangkutan', 'type' => 'item'],
                                                                    '442413' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Surat Pernyataan ', 'type' => 'item'],
                                                                    '442414' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Checklist TPS', 'type' => 'item'],
                                                                    '442415' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Checklist Sludge Pond', 'type' => 'item'],
                                                                    '442416' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Checklist Pemanfaatan FABA', 'type' => 'item'],
                                                                    '442417' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Checklist Pemanfaatan Minyak-Bahan Bakar', 'type' => 'item'],
                                                                    '442418' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Checklist Landfill', 'type' => 'item'],
                                                                    '442419' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Checklist Pihak Ketiga', 'type' => 'item'],
                                                                    '442420' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Logbook', 'type' => 'item'],
                                                                    '442421' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form SA Neraca Limbah B3', 'type' => 'item'],
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
                                                                    '44342' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Program Penurunan Emisi', ['/beyond-obedience-program', 'bopt' => AppConstants::FORM_TYPE_EE, '_ppId' => $powerPlant->id]), 'type' => 'item'],
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
                                                        '5511' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload dokumen HIRADC', 'type' => 'item'],
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
                                                                    '55222' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload SLO', 'type' => 'item'],
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
                                                                    '55232' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload SLO', 'type' => 'item'],
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
                                                                    '55242' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Sertifikat', 'type' => 'item'],
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
                                                                                '553111' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Izin Kerja', 'type' => 'item'],
                                                                                '553112' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Kontrak Kerja/ Perintah Kerja', 'type' => 'item'],
                                                                                '553113' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Identitas Penanggungjawab', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'job-safety-analysis' => [
                                                                        'text' => 'Job Safety Analysis',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '553121' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload JSA', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'sop-pekerjaan' => [
                                                                        'text' => 'SOP Pekerjaan',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '553131' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload SOP Pekerjaan', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'kompetensi-pekerja' => [
                                                                        'text' => 'Kompetensi Pekerja',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '553141' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Sertifikat Kompetensi', 'type' => 'item'],
                                                                                '553142' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Sertifikat Pengawas', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'apd' => [
                                                                        'text' => 'APD',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '553151' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload APD yang disediakan', 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'lock-out-tag-out' => [
                                                                        'text' => 'Lock Out Tag Out',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '553161' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Aktivtas LOTO', 'type' => 'item'],
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
                                                                    '554111' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring APAR', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'apat' => [
                                                            'text' => 'APAT',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '554121' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload APAT', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'hydrant' => [
                                                            'text' => 'Hydrant',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '554131' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Checklist Hydrant', 'type' => 'item'],
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
                                                                    '554151' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring Detector Alarm', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'tim-tanggap-darurat' => [
                                                            'text' => 'Tim Tanggap Darurat',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '554161' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Tim Tanggap Darurat', 'type' => 'item'],
                                                                    '554162' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Sertifikat Petugas Kebakaran', 'type' => 'item'],
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
                                                                    '554172' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Dokumentasi', 'type' => 'item'],
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
                                                                    '55511' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Kotak P3K', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'fasilitas-kesehatan-kerja' => [
                                                            'text' => 'Fasilitasi Kesehatan Kerja',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55521' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Klinik', 'type' => 'item'],
                                                                    '55522' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Dokter Perusahaan', 'type' => 'item'],
                                                                    '55523' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Ambulance', 'type' => 'item'],
                                                                    '55524' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Sertifikat Petugas P3K', 'type' => 'item'],
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
                                                                    '55532' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Dokumentasi Safety Campaign', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'housekeeping' => [
                                                            'text' => 'Housekeeping/5S',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55541' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian 5S', 'type' => 'item'],
                                                                    '55542' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Penerapan 5S', 'type' => 'item'],
                                                                ]
                                                            ]
                                                        ],
                                                        'visual-management' => [
                                                            'text' => 'Visual Management',
                                                            'type' => 'folder',
                                                            'icon-class' => 'blue',
                                                            'additionalParameters' => [
                                                                'children' => [
                                                                    '55551' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Rambu K3', 'type' => 'item'],
                                                                    '55552' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Papan Informasi', 'type' => 'item'],
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
                                                                    '55621' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Data Lingkungan Kerja', 'type' => 'item'],
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
                                                        '6611' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Monitoring Permasalahan', 'type' => 'item'],
                                                    ]
                                                ]
                                            ],
                                            'rencana-mitigasi' => [
                                                'text' => 'Rencana Mitigasi',
                                                'type' => 'folder',
                                                'icon-class' => 'blue',
                                                'additionalParameters' => [
                                                    'children' => [
                                                        '6621' => ['text' => '<i class="ace-icon fa fa-file-text-o blue"></i> Form Project Tracking', 'type' => 'item'],
                                                        '6622' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Term of Refference /TOR', 'type' => 'item'],
                                                        '6623' => ['text' => '<i class="ace-icon fa fa-upload blue"></i> Upload Rencana Anggaran Biaya/RAB', 'type' => 'item'],
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
                                                                                '3211-1' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Izin & Dokumen Lingkungan', ['/environment-permit', '_ppId' => $powerPlant->id]), 'type' => 'item'],
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
                                                                                '3213-2' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> ' . AppLabels::AIR_POLLUTION_CONTROL ." " . AppLabels::AMBIENT , ['/ppu-ambient', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'pengelolaan-limbah-b3' => [
                                                                        'text' => 'Pengelolaan Limbah B3',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '3214-1' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> ' . AppLabels::SELF_ASSESSMENT, ['/plb3-self-assessment', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                                '3214-2' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> ' . AppLabels::PERCENTAGE . " " . AppLabels::BALANCE_SHEET . " " . AppLabels::WASTE . " " . AppLabels::B3 , ['/plb3-balance-sheet', '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                                '3214-3' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> ' . AppLabels::CHECKLIST . " " . AppLabels::WASTE , ['/plb3-checklist', '_ppId' => $powerPlant->id]), 'type' => 'item'],
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
                                                                                '3221' => ['text' => Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian DRKPL', ['/beyond-obedience', 'bot' => AppConstants::FORM_TYPE_DRKPL, '_ppId' => $powerPlant->id]), 'type' => 'item'],
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    'sml' => [
                                                                        'text' => 'Sistem Manajemen Lingkungan',
                                                                        'type' => 'folder',
                                                                        'icon-class' => 'blue',
                                                                        'additionalParameters' => [
                                                                            'children' => [
                                                                                '3222' => ['text' =>  Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian SML', ['/beyond-obedience', 'bot' => AppConstants::FORM_TYPE_SML, '_ppId' => $powerPlant->id]), 'type' => 'item'],
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
                                                                                '3223-2' => ['text' =>  Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian Efisiensi Energi', ['/beyond-obedience', 'bot' => AppConstants::FORM_TYPE_EE, '_ppId' => $powerPlant->id]), 'type' => 'item'],
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
                                                                                '3224-2' => ['text' =>  Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian PP Limbah B3', ['/beyond-obedience', 'bot' => AppConstants::FORM_TYPE_PPLB3, '_ppId' => $powerPlant->id]), 'type' => 'item'],
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
                                                                                '3225-2' => ['text' =>  Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian 3R Limbah Padat Non B3', ['/beyond-obedience', 'bot' => AppConstants::FORM_TYPE_PPLNB3, '_ppId' => $powerPlant->id]), 'type' => 'item'],
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
                                                                                '3226-2' => ['text' =>  Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian Pengurangan Pencemaran Udara', ['/beyond-obedience', 'bot' => AppConstants::FORM_TYPE_PGPU, '_ppId' => $powerPlant->id]), 'type' => 'item'],
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
                                                                                '3227-2' => ['text' =>  Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian Efisiensi Air & Penurunan Beban Pencemaran', ['/beyond-obedience', 'bot' => AppConstants::FORM_TYPE_KA, '_ppId' => $powerPlant->id]), 'type' => 'item'],
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
                                                                                '3228-2' => ['text' =>  Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian Keanekaragaman Hayati', ['/beyond-obedience', 'bot' => AppConstants::FORM_TYPE_KH, '_ppId' => $powerPlant->id]), 'type' => 'item'],
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
                                                                                '3229-2' => ['text' =>  Html::a('<i class="ace-icon fa fa-file-text-o blue"></i> Form Penilaian COMDEV', ['/beyond-obedience', 'bot' => AppConstants::FORM_TYPE_CD, '_ppId' => $powerPlant->id]), 'type' => 'item'],
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
