<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Persona;

/**
 * PersonaSearch represents the model behind the search form about `app\models\Persona`.
 */
class PersonaSearch extends Persona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tipodocumentoid','sexoid', 'edad'], 'integer'],
            [['documento', 'primernombre', 'segundonombre', 'primerapellido', 'segundoapellido', 'direccion', 'telefono', 'email', 'usuariocrea', 'fechacrea', 'usuariomodifica', 'fechamodifica'], 'safe'],
            [['estatura', 'peso', 'imc', 'pgc'], 'number'],
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
        $query = Persona::find();

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
            'tipodocumentoid' => $this->tipodocumentoid,
            'sexoid' => $this->sexoid,
            'estatura' => $this->estatura,
            'peso' => $this->peso,
            'edad' => $this->edad,
            'imc' => $this->imc,
            'pgc' => $this->pgc,
            'fechacrea' => $this->fechacrea,
            'fechamodifica' => $this->fechamodifica,
        ]);

        $query->andFilterWhere(['like', 'documento', $this->documento])
            ->andFilterWhere(['like', 'primernombre', $this->primernombre])
            ->andFilterWhere(['like', 'segundonombre', $this->segundonombre])
            ->andFilterWhere(['like', 'primerapellido', $this->primerapellido])
            ->andFilterWhere(['like', 'segundoapellido', $this->segundoapellido])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'usuariocrea', $this->usuariocrea])
            ->andFilterWhere(['like', 'usuariomodifica', $this->usuariomodifica]);

        return $dataProvider;
    }
}
