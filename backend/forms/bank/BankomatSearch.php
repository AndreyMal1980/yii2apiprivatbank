<?php

namespace backend\forms\bank;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use bank\privat\entities\Bankomat;

class BankomatSearch extends Model {

    public $id;
    public $type;
    public $cityRU;
    public $cityUA;
    public $cityEN;
    public $fullAddressRu;
    public $fullAddressUa;
    public $fullAddressEn;
    public $placeRu;
    public $placeUa;
    public $latitude;
    public $longitude;

    public function rules(): array {
        return [
           // [['id'], 'integer'],
            [['type','cityRU','cityUA','cityEN','fullAddressRu','fullAddressUa','fullAddressEn','placeRu','placeUa','latitude','longitude'], 'safe'],
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search(array $params): ActiveDataProvider {
        $query = Bankomat::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['cityRU' => SORT_ASC]
            ]
        ]);

        $this->load($params);

      /*  if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }*/

       /* $query->andFilterWhere([
            'id' => $this->id,
        ]);*/

        /*$query
                ->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'slug', $this->slug]);*/

        return $dataProvider;
    }

}
