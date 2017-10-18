<?php

namespace app\modules\system\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id Menu id(autoincrement)
 * @property string $name Menu name
 * @property integer $parent Menu parent
 * @property string $route Route for this menu
 * @property integer $order Menu order
 * @property string $data Extra information for this menu
 *
 * @property Menu $menuParent Menu parent
 * @property Menu[] $menus Menu children
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class Menu extends \yii\db\ActiveRecord
{
    public $parent_name;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_name'], 'filterParent'],
            [['parent_name'], 'in',
                'range' => static::find()->select(['name'])->column(),
                'message' => 'Menu "{value}" not found.'],
            [['parent', 'route', 'data', 'order'], 'default'],
            [['order'], 'integer'],
            [['route'], 'in',
                'range' => static::getSavedRoutes(),
                'message' => 'Route "{value}" not found.']
        ];
    }

    /**
     * Use to loop detected.
     */
    public function filterParent()
    {
        $value = $this->parent_name;
        $parent = self::findOne(['name' => $value]);
        if ($parent) {
            $id = $this->id;
            $parent_id = $parent->id;
            while ($parent) {
                if ($parent->id == $id) {
                    $this->addError('parent_name', 'Loop detected.');

                    return;
                }
                $parent = $parent->menuParent;
            }
            $this->parent = $parent_id;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('rbac-admin', 'ID'),
            'name' => Yii::t('rbac-admin', 'Name'),
            'parent' => Yii::t('rbac-admin', 'Parent'),
            'parent_name' => Yii::t('rbac-admin', 'Parent Name'),
            'route' => Yii::t('rbac-admin', 'Route'),
            'order' => Yii::t('rbac-admin', 'Order'),
            'data' => Yii::t('rbac-admin', 'Data'),
        ];
    }

    /**
     * Get menu parent
     * @return \yii\db\ActiveQuery
     */
    public function getMenuParent()
    {
        return $this->hasOne(Menu::className(), ['id' => 'parent']);
    }

    /**
     * Get menu children
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['parent' => 'id']);
    }

    private static $_routes;

    /**
     * Get saved routes.
     * @return array
     */
    public static function getSavedRoutes()
    {
        if (self::$_routes === null) {
            self::$_routes = [];
            /*foreach (Yii::$app->getAuthManager()->getPermissions() as $name => $value) {
                if ($name[0] === '/' && substr($name, -1) != '*') {
                    self::$_routes[] = $name;
                }
            }*/
            foreach ((new Route)->getAppRoutes() as $name => $value) {
                if ($name[0] === '/' && substr($name, -1) != '*') {
                    self::$_routes[] = $name;
                }
            }
        }
        return self::$_routes;
    }
    
    public static function getMenuSource()
    {
        $tableName = static::tableName();
        return (new \yii\db\Query())
        ->select(['m.id', 'm.name', 'm.route', 'parent_name' => 'p.name'])
        ->from(['m' => $tableName])
        ->leftJoin(['p' => $tableName], '[[m.parent]]=[[p.id]]')
        ->all(static::getDb());
    }
}
