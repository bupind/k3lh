<?php 
use common\components\helpers\Converter;
use common\vendor\AppConstants;
use yii\helpers\Html;

/* @var $navs []*/
?>

<ul class="nav nav-list">
    <?php foreach ($navs as $nav_l_1): ?>
        <?php if (isset($nav_l_1['submenu'])): ?>
            
            <li>
                <?= Html::a(sprintf('<i class="menu-icon fa %s"></i><span class="menu-text"> %s </span><b class="arrow fa fa-angle-down"></b>', $nav_l_1['icon'], $nav_l_1['label']), '#', ['class' => 'dropdown-toggle']); ?>
                <b class="arrow"></b>
                
                <ul class="submenu">
                    <?php foreach ($nav_l_1['submenu'] as $nav_l_2): ?>
                        <?php if (isset($nav_l_2['submenu'])): ?>
        
                            <li>
                                <?= Html::a(sprintf('<i class="menu-icon fa %s"></i><span class="menu-text"> %s </span><b class="arrow fa fa-angle-down"></b>', $nav_l_2['icon'], $nav_l_2['label']), '#', ['class' => 'dropdown-toggle']); ?>
                                <b class="arrow"></b>
            
                                <ul class="submenu">
                                    <?php foreach ($nav_l_2['submenu'] as $nav_l_3): ?>
                                        <?php if ((isset($nav_l_3['rbac']) && $nav_l_3['rbac'] === false) || (!isset($nav_l_3['rbac']) && Yii::$app->user->can(sprintf('%s-index', $nav_l_3['controller'])))): ?>
                                            <li>
                                                <?= Html::a(sprintf('<i class="menu-icon fa %s"></i><span class="menu-text"> %s </span>', $nav_l_3['icon'], $nav_l_3['label']), $nav_l_3['url']); ?>
                                                <b class="arrow"></b>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            
                        <?php else: ?>
                            <?php if ((isset($nav_l_2['rbac']) && $nav_l_2['rbac'] === false) || (!isset($nav_l_2['rbac']) && Yii::$app->user->can(sprintf('%s-index', $nav_l_2['controller'])))): ?>
                                <li>
                                    <?= Html::a(sprintf('<i class="menu-icon fa %s"></i><span class="menu-text"> %s </span>', $nav_l_2['icon'], $nav_l_2['label']), $nav_l_2['url']); ?>
                                    <b class="arrow"></b>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </li>
            
        <?php else: ?>
            <?php if ((isset($nav_l_1['rbac']) && $nav_l_1['rbac'] === false) || (!isset($nav_l_1['rbac']) && Yii::$app->user->can(sprintf('%s-index', $nav_l_1['controller'])))): ?>
                <li>
                    <?= Html::a(sprintf('<i class="menu-icon fa %s"></i><span class="menu-text"> %s </span>', $nav_l_1['icon'], $nav_l_1['label']), $nav_l_1['url']); ?>
                    <b class="arrow"></b>
                </li>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
