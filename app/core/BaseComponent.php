<?php
namespace app\core;

use yii\base\Component;
use app\core\CommonTrait;

/**
 *
 * @property \app\modules\modularity\ModularityService $modularityService 
 * @property \app\modules\rbac\RbacService $rbacService 
 * @property \app\modules\taxonomy\TaxonomyService $taxonomyService
 * @property \app\modules\menu\MenuService $menuService 
 *
 */
class BaseComponent extends Component
{
    use CommonTrait;
    
    public function init()
    {
        parent::init();
    }
}
