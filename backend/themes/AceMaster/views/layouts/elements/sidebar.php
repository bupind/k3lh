<?php
use common\vendor\AppLabels;
use app\components\Nav;

$navs = [
    ['icon' => 'fa-tachometer', 'label' => AppLabels::DASHBOARD, 'url' => ['/site'], 'rbac' => false],
    [
        'icon' => 'fa-building',
        'label' => AppLabels::COMPANY,
        'submenu' => [
            ['icon' => 'fa-pencil-square-o', 'label' => AppLabels::PROFILE, 'url' => ['/profile'], 'controller' => 'profile'],
        ]
    ],
    [
        'icon' => 'fa-file-text-o',
        'label' => AppLabels::MATURITY_LEVEL,
        'submenu' => [
            ['icon' => 'fa-file-text-o', 'label' => AppLabels::TITLE, 'url' => ['/maturity-level-title'], 'controller' => 'maturity-level-title'],
            ['icon' => 'fa-file-text-o', 'label' => AppLabels::QUESTION, 'url' => ['/maturity-level-question'], 'controller' => 'maturity-level-question'],
        ]
    ],
    [
        'icon' => 'fa-file-text-o',
        'label' => AppLabels::MATURITY_LEVEL_K3L,
        'submenu' => [
            ['icon' => 'fa-file-text-o', 'label' => AppLabels::TITLE, 'url' => ['/maturity-level-k3l-title'], 'controller' => 'maturity-level-k3l-title'],
            ['icon' => 'fa-file-text-o', 'label' => AppLabels::QUESTION, 'url' => ['/maturity-level-k3l-question'], 'controller' => 'maturity-level-k3l-question'],
        ]
    ],
    [
        'icon' => 'fa-file-text-o',
        'label' => AppLabels::SMK3,
        'submenu' => [
            ['icon' => 'fa-file-text-o', 'label' => AppLabels::QUESTION, 'url' => ['/smk3-title'], 'controller' => 'smk3-title'],
        ]
    ],
    [
        'icon' => 'fa-file-text-o',
        'label' => AppLabels::PPA,
        'submenu' => [
            ['icon' => 'fa-file-text-o', 'label' => AppLabels::QUESTION, 'url' => ['/ppa-question'], 'controller' => 'ppa-question'],
        ]
    ],
    [
        'icon' => 'fa-file-text-o',
        'label' => AppLabels::PPU,
        'submenu' => [
            ['icon' => 'fa-file-text-o', 'label' => AppLabels::QUESTION, 'url' => ['/ppu-question'], 'controller' => 'ppu-question'],
        ]
    ],
    [
        'icon' => 'fa-file-text-o',
        'label' => AppLabels::HYDRANT,
        'submenu' => [
            ['icon' => 'fa-file-text-o', 'label' => AppLabels::ITEM, 'url' => ['/hydrant-question'], 'controller' => 'hydrant-question'],
        ]
    ],
    [
        'icon' => 'fa-file-text-o',
        'label' => AppLabels::HOUSEKEEPING,
        'submenu' => [
            ['icon' => 'fa-file-text-o', 'label' => AppLabels::ITEM, 'url' => ['/housekeeping-question'], 'controller' => 'housekeeping-question'],
        ]
    ],
    [
        'icon' => 'fa-file-text-o',
        'label' => AppLabels::BEYOND_OBEDIENCE,
        'submenu' => [
            ['icon' => 'fa-file-text-o', 'label' => AppLabels::QUESTION, 'url' => ['/bo-assessment-aspect'], 'controller' => 'bo-assessment-aspect'],
        ]
    ],
    [
        'icon' => 'fa-file-text-o',
        'label' => AppLabels::PLB3,
        'submenu' => [
            [
                'icon' => 'fa-lock',
                'label' => AppLabels::SELF_ASSESSMENT_SHORT,
                'submenu' => [
                    ['icon' => 'fa-file-text-o', 'label' => AppLabels::QUESTION, 'url' => ['/plb3-sa-question'], 'controller' => 'plb3-sa-question', 'rbac' => false],
                ]
            ],
            [
                'icon' => 'fa-lock',
                'label' => 'Evaluasi',
                'submenu' => [
                    ['icon' => 'fa-file-text-o', 'label' => AppLabels::QUESTION, 'url' => ['/plb3-question'], 'controller' => 'plb3-question'],
                ]
            ]
        ]
    ],
    ['icon' => 'fa-history', 'label' => AppLabels::LOGIN_HISTORY, 'url' => ['/login-history'], 'controller' => 'login-history'],
    [
        'icon' => 'fa-life-ring',
        'label' => AppLabels::MASTER,
        'submenu' => [
            ['icon' => 'fa-building', 'label' => AppLabels::SECTOR, 'url' => ['/sector'], 'controller' => 'sector'],
            ['icon' => 'fa-flash', 'label' => AppLabels::POWER_PLANT, 'url' => ['/power-plant'], 'controller' => 'power-plant'],
            ['icon' => 'fa-list', 'label' => AppLabels::CODESET, 'url' => ['/codeset'], 'controller' => 'codeset'],
        ]
    ],
    [
        'icon' => 'fa-gear',
        'label' => AppLabels::SETTING,
        'submenu' => [
            ['icon' => 'fa-pencil-square-o', 'label' => AppLabels::APPLICATION, 'url' => ['/setting'], 'controller' => 'setting'],
            ['icon' => 'fa-users', 'label' => AppLabels::USER_LOGIN, 'url' => ['/user'], 'controller' => 'user'],
            [
                'icon' => 'fa-lock',
                'label' => AppLabels::AUTH,
                'submenu' => [
                    ['icon' => 'fa-bars', 'label' => AppLabels::ITEM, 'url' => ['/auth-item'], 'controller' => 'user'],
                    ['icon' => 'fa-bars', 'label' => AppLabels::ROLE, 'url' => ['/auth-item-child'], 'controller' => 'user'],
                    ['icon' => 'fa-bars', 'label' => AppLabels::ASSIGNMENT, 'url' => ['/auth-assignment'], 'controller' => 'user'],
                ]
            ]
        ]
    ]
];
?>

<div id="sidebar" class="sidebar responsive">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed')
        } catch (e) {
        }
    </script>

    <?= Nav::widget(['navs' => $navs]); ?>

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        } catch (e) {
        }
    </script>
</div>