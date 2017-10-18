<?php

namespace app\modules\system\admin;

/**
 * AutocompleteAsset
 *
 * @author ChenHao <dzswchenhao@126.com>
 * @since 1.0
 */
class AutocompleteAsset extends \yii\web\AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@app/modules/system/admin/assets';

    /**
     * @inheritdoc
     */
    public $css = [
        'jquery-ui.css',
    ];

    /**
     * @inheritdoc
     */
    public $js = [
        'jquery-ui.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
