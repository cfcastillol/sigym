<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estado;

/**
 * EstadoSearch represents the model behind the search form about `app\models\Estado`.
 */
class EstadoSearch extends Estado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['estado', 'usuariocrea', 'fechacrea', 'usuariomodifica', 'fechamodifica'], 'safe'],
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
        $query = Estado::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'fechacrea' => $this->fechacrea,
            'fechamodifica' => $this->fechamodifica,
        ]);

        $query->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'usuariocrea', $this->usuariocrea])
            ->andFilterWhere(['like', 'usuariomodifica', $this->usuariomodifica]);

        return $dataProvider;
    }
}
