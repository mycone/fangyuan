<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Region;

/**
 * RegionSearch represents the model behind the search form about `common\models\Region`.
 */
class RegionSearch extends Region
{
    public $keywords;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'class'], 'integer'],
            [['name', 'code', 'parent_code', 'initial', 'pinying', 'is_open','keywords'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Region::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        /*$query->andFilterWhere([
            'id' => $this->id,
            'class' => $this->class,
        ]);*/
        
        //关键字搜索
        if($this->keywords!='' || $this->keywords!==null) {
            $query->andFilterWhere(['like','name',$this->keywords])
                  ->orFilterWhere(['like','code',$this->keywords]);
        }
        
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'parent_code', $this->parent_code])
            ->andFilterWhere(['like', 'initial', $this->initial])
            ->andFilterWhere(['like', 'pinying', $this->pinying])
            ->andFilterWhere(['like', 'is_open', $this->is_open]);

        return $dataProvider;
    }
}
