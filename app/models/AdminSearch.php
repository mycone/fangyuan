<?php
/**
 * 管理员列表模型
 * @author chenhao <dzswchenhao@126.com
 * @since 1.0
 */

namespace app\models;

use app\models\Admin;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\base\Event;

class AdminSearch extends Admin
{
    /**
     * 搜索关键字
     * @var String
     */
    public $keywords;
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['keywords','string'],
            [['username','email','keywords'],'safe'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function scenarios() {
        return Model::scenarios();
    }
    
    /**
     * @inheritdoc
     */
    public function search($params) {
        Event::on(Admin::className(), Admin::EVENT_AFTER_FIND, [new Admin(),'eventAfterHandler']);
        $query = Admin::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            //'pagination' => ['pageSize'=>15],
        ]);
        $this->load($params);
        if(!$this->validate()) {
            return $dataProvider;
        }
        //关键字搜索
        if($this->keywords!='' || $this->keywords!==null) {
            $query->andFilterWhere(['like','username',$this->keywords])
                  ->orFilterWhere(['like','email',$this->keywords]);
        }
        //过滤条件
        $query->andFilterWhere(['like','username',$this->username])
              ->andFilterWhere(['like','email',$this->email]);
        
        return $dataProvider;
    }
    
}