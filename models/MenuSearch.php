<?php

namespace wokster\menu\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use wokster\menu\models\Menu;

/**
 * MenuSearch represents the model behind the search form about `wokster\menu\models\Menu`.
 */
class MenuSearch extends Menu
{
    public $visibility;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sort', 'parent_id', 'visibility'], 'integer'],
            [['title', 'url'], 'safe'],
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
        $query = Menu::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder'=>['sort'=>SORT_DESC],
            ],
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'id', 'sort', 'parent_id', 'title', 'url',
                'visibility' => [
                    'asc' =>    [ 'order' => SORT_ASC ],
                    'desc' =>   [ 'order' => SORT_DESC ],
                    'label' => 'visibility'
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        if($this->visibility == 1){
            $query->andFilterWhere(['>=','sort',0]);
        }elseif($this->visibility == 3){
            $query->andFilterWhere(['<','sort',0]);
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'sort' => $this->sort,
            'parent_id' => $this->parent_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
