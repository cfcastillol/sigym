<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Personamembresia;

/**
 * PersonamembresiaSearch represents the model behind the search form about `app\models\Personamembresia`.
 */
class PersonamembresiaSearch extends Personamembresia
{
    /**
     * @inheritdoc
     */
    public $documento;
    public function rules()
    {
        return [
            [['id','personaid','membresiaid', 'estadoid'], 'integer'],
            [['documento','fechainicio', 'fechafin', 'usuariocrea', 'fechacrea', 'usuariomodifica', 'fechamodifica'], 'safe'],
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
        $query = Personamembresia::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $query->joinWith('persona');

        $query->andFilterWhere([
            'id' => $this->id,
            'membresiaid' => $this->membresiaid,
            'personaid' => $this->personaid,
            'estadoid' => $this->estadoid,
            'fechainicio' => $this->fechainicio,
            'fechafin' => $this->fechafin,
            'fechacrea' => $this->fechacrea,
            'fechamodifica' => $this->fechamodifica,
        ]);

        $query->andFilterWhere(['like', 'usuariocrea', $this->usuariocrea])
            ->andFilterWhere(['like', 'usuariomodifica', $this->usuariomodifica])
            ->andFilterWhere(['like', 'persona.documento', $this->documento]);

        return $dataProvider;
    }
}
