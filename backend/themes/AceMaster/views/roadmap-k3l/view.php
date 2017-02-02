<?php

use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RoadmapK3l */

$this->title = sprintf('%s %s %s', AppLabels::BTN_VIEW, AppLabels::ROADMAP_PROGRAM, $model->form_type_code_desc);
$this->params['subtitle'] = sprintf('%s - %s', $model->sector->sector_name, $model->powerPlant->pp_name);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::ROADMAP_PROGRAM, $model->form_type_code_desc), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="roadmap-k3l-view">

    <div class="page-header">
        <h1>
            <?= Html::encode($this->title) ?>
            <?php if (isset($this->params['subtitle'])): ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <?= $this->params['subtitle']; ?>
                </small>
            <?php endif; ?>
        </h1>
    </div>
    
    <?= DetailView::widget([
        'model' => $model,
        'options' => [
            'excluded' => ['form_type_code'],
            'converter' => [
                'sector_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sector->sector_name],
                'power_plant_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->powerPlant->pp_name],
            ]
        ]
    ]); ?>

    <hr/>

    <div class="row">
        <div class="col-xs-12">
            <div class="tabbable">
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active">
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::TARGET, '#target', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::PROGRAM, '#program', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="target" class="tab-pane fade active in">
                        <table id="table-target" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                            <thead>
                            <tr>
                                <th width="70%"><?= AppLabels::TARGET; ?></th>
                                <th><?= AppLabels::VALUE; ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($model->roadmapK3lTargets as $target): ?>
                                <tr>
                                    <td><?= $target->roadmapK3lAttribute->attr_text; ?></td>
                                    <td><?= $target->target_value; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="program" class="tab-pane fade">
                        <table id="table-program" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                            <thead>
                            <tr>
                                <th><?= AppLabels::PROGRAM; ?></th>
                                <th><?= AppLabels::WHEN; ?></th>
                                <th><?= AppLabels::WHERE; ?></th>
                                <th><?= AppLabels::WHO; ?></th>
                                <th><?= AppLabels::HOW_MANY; ?></th>
                                <th class="text-right"><?= AppLabels::HOW_MUCH; ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($model->roadmapK3lItems as $item): ?>
                                <?php if ($item->roadmapK3lAttribute->attr_type_code == AppConstants::ATTRIBUTE_TYPE_PROGRAM_ITEM): ?>
                                    <tr>
                                        <td><?= $item->roadmapK3lAttribute->attr_text; ?></td>
                                        <td><?= $item->item_value_when; ?></td>
                                        <td><?= $item->item_value_where; ?></td>
                                        <td><?= $item->item_value_who; ?></td>
                                        <td><?= $item->item_value_how_many; ?></td>
                                        <td class="text-right"><?= Yii::$app->formatter->asCurrency($item->item_value_how_much); ?></td>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6"><strong><?= $item->roadmapK3lAttribute->attr_text; ?></strong></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= ViewButton::widget(['model' => $model]); ?>

</div>