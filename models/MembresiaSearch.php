<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Membresia;

/**
 * MembresiaSearch represents the model behind the search form about `app\models\Membresia`.
 */
class MembresiaSearch extends Membresia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'estadoid', 'cantidadmeses', 'cantidaddias'], 'integer'],
            [['valor'], 'number'],
            [['valor','membresia', 'descripcion', 'usuariocrea', 'fechacrea', 'usuariomodifica', 'fechamodifica'], 'safe'],
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
        $query = Membresia::find();

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
            'estadoid' => $this->estadoid,
            'valor' => $this->valor,
            'cantidadmeses' => $this->cantidadmeses,
            'cantidaddias' => $this->cantidaddias,
            'fechacrea' => $this->fechacrea,
            'fechamodifica' => $this->fechamodifica,
        ]);

        $query->andFilterWhere(['like', 'membresia', $this->membresia])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'usuariocrea', $this->usuariocrea])
            ->andFilterWhere(['like', 'usuariomodifica', $this->usuariomodifica]);

        return $dataProvider;
    }
}
