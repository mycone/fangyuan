<?php
/**
 * 系统设置
 * @author chenhao <dzswchenhao@126.com>
 * @since 1.0
 */

namespace app\modules\system\admin\controllers;

use app\core\BackendController;
use app\modules\system\models\config;

class SettingController extends BackendController
{
    /**
     * 站点信息
     */
    public function actionSite() {
        $model = new config\BasicConfig();
        return $this->doConfig($model);
    }
    /**
     * 模板配置
     */
    public function actionTheme()
    {
        $model = new config\ThemeConfig();
        return $this->doConfig($model);
    }
    /**
     * 邮箱配置
     */
    public function actionEmail()
    {
        $model = new config\EmailConfig();
        return $this->doConfig($model);
    }
    /**
     * 日期与时间配置
     */
    public function actionDatetime()
    {
        $model = new config\DatetimeConfig();
        return $this->doConfig($model);
    }
    /**
     * 注册与访问控制
     */
    public function actionAccess()
    {
        $model = new config\AccessConfig();
        return $this->doConfig($model);
    }
    /**
     * SEO配置
     */
    public function actionSeo()
    {
        $model = new config\SeoConfig();
        return $this->doConfig($model);
    }
}