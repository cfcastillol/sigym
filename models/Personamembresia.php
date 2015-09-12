<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personamembresia".
 *
 * @property integer $id
 * @property integer $personaid
 * @property integer $membresiaid
 * @property integer $estadoid
 * @property string $fechainicio
 * @property string $fechafin
 * @property string $usuariocrea
 * @property string $fechacrea
 * @property string $usuariomodifica
 * @property string $fechamodifica
 *
 * @property Membresia $membresia
 * @property Persona $persona
 * @property Estado $estado
 */
class Personamembresia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personamembresia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['personaid', 'membresiaid', 'estadoid', 'fechainicio', 'fechafin'], 'required'],
            [['personaid', 'membresiaid', 'estadoid'], 'integer'],
            [['fechainicio', 'fechafin', 'fechacrea', 'fechamodifica'], 'safe'],
            [['usuariocrea', 'usuariomodifica'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'personaid' => 'Persona',
            'membresiaid' => 'Membresia',
            'estadoid' => 'Estado',
            'fechainicio' => 'Fecha de inicio',
            'fechafin' => 'Fecha de fin',
            'usuariocrea' => 'Usuariocrea',
            'fechacrea' => 'Fechacrea',
            'usuariomodifica' => 'Usuariomodifica',
            'fechamodifica' => 'Fechamodifica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembresia()
    {
        return $this->hasOne(Membresia::className(), ['id' => 'membresiaid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Persona::className(), ['id' => 'personaid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estado::className(), ['id' => 'estadoid']);
    }
}
