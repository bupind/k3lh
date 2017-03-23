<?php 
    use common\components\helpers\Converter;
    use common\vendor\AppConstants;
    
    $order = isset($options['order']) && is_array($options['order']) ? $options['order'] : [];
    $extraAttributes = isset($options['extraAttributes']) && is_array($options['extraAttributes']) ? $options['extraAttributes'] : [];
    $labels = isset($options['labels']) && is_array($options['labels']) ? $options['labels'] : [];
    $bottomSpace = isset($options['bottom-space']) ? $options['bottom-space'] : 'space-20';
    
    $attributes = array_merge($model->attributes, $extraAttributes);
    if (!empty($order)) {
        $temp = [];
        foreach ($order as $col) {
            $temp[$col] = $attributes[$col];
        }
        $attributes = $temp;
    }
?>

<div class="profile-user-info profile-user-info-striped">
    <?php foreach ($attributes as $key => $value): ?>    
        
        <?php 
            $excludedCols = ['id', 'created_by', 'created_at', 'updated_by', 'updated_at'];
            $excludedCols = isset($options['excluded']) && is_array($options['excluded']) ? array_merge($excludedCols, $options['excluded']) : $excludedCols; 
            $converter = isset($options['converter']) && is_array($options['converter']) ? $options['converter'] : [];
        ?>
    
        <?php if (!in_array($key, $excludedCols)): ?>
        <div class="profile-info-row">
            <div class="profile-info-name info-large"><?= isset($labels[$key]) ? $labels[$key] : $model->getAttributeLabel($key); ?></div>
            <div class="profile-info-value">
                <?php 
                    if (isset($converter[$key])) {
                        if (is_array($converter[$key])) {                            
                            list($formatType, $formatValue) = explode(AppConstants::DELIMITER, join(AppConstants::DELIMITER , $converter[$key]));
                            switch ($formatType) {
                                case AppConstants::FORMAT_TYPE_VARIABLE:
                                    echo $formatValue;
                                    break;
                            }
                        } else {
                            echo Converter::format($value, $converter[$key]);
                        }
                    } else {
                        echo $value;
                    }                    
                ?>
            </div>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
<div class="<?= $bottomSpace ?>"></div>