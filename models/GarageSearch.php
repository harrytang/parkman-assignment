<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2019 Power Kernel
 */

namespace app\models;

use yii\data\ActiveDataProvider;

/**
 * Class GarageSearch
 * @package app\models
 */
class GarageSearch extends Garage
{

    public function rules()
    {
        return [
            [['name', 'country', 'point'], 'safe'],
            [['point'], 'match', 'pattern' => '/^(\-?\d+(\.\d+)?) \s*(\-?\d+(\.\d+)?)$/'],
        ];
    }


    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @return array|ActiveDataProvider
     */
    public function search($params)
    {

        $query = Garage::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params, '') && $this->validate())) {
            return ['garages' => []];
        }

        // search by latitude and longitude
        if (!empty($this->point)) {
            [$latitude, $longitude] = explode(' ', $this->point);
            $query->andFilterWhere(['like', 'point', $latitude]);
            $query->andFilterWhere(['like', 'point', $longitude]);
        }

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'country', $this->country]);
        //->andFilterWhere(['like', 'point', $this->point]);

        return $dataProvider;
    }
}
