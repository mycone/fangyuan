<?php
/**
 * 系统模块（后台）
 * @author chenhao <dzswchenhao@126.com>
 * @since 1.0
 */

namespace app\modules\system\admin;

use Yii;
use app\core\BaseModule;

class AdminModule extends BaseModule
{
    public $controllerNamespace = 'app\modules\system\admin\controllers';
    
    public function init()
    {
        parent::init();
        if (!isset(Yii::$app->i18n->translations['rbac-admin'])) {
            Yii::$app->i18n->translations['rbac-admin'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath' => '@app/modules/system/admin/messages'
                ];
        }
    }
    
}