<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "membresia".
 *
 * @property integer $id
 * @property integer $estadoid
 * @property string $membresia
 * @property string $descripcion
 * @property integer $cantidadmeses
 * @property integer $cantidaddias
 * @property string $usuariocrea
 * @property string $fechacrea
 * @property string $usuariomodifica
 * @property string $fechamodifica
 *
 * @property Estado $estado
 * @property Personamembresia[] $personamembresias
 */
class Membresia extends MyActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'membresia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['valor','estadoid', 'membresia', 'descripcion', 'cantidadmeses', 'cantidaddias'], 'required'],
            [['estadoid', 'cantidadmeses', 'cantidaddias'], 'integer'],
            [['valor'], 'number'],
            [['descripcion'], 'string'],
            [['fechacrea', 'fechamodifica'], 'safe'],
            [['membresia'], 'string', 'max' => 80],
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
            'estadoid' => 'Estado',
            'membresia' => 'Membresía',
            'descripcion' => 'Descripción',
            'valor' => 'Valor',
            'cantidadmeses' => 'Cantidad de meses',
            'cantidaddias' => 'Cantidad de días',
            'usuariocrea' => 'Usuariocrea',
            'fechacrea' => 'Fechacrea',
            'usuariomodifica' => 'Usuariomodifica',
            'fechamodifica' => 'Fechamodifica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estado::className(), ['id' => 'estadoid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonamembresias()
    {
        return $this->hasMany(Personamembresia::className(), ['membresiaid' => 'id']);
    }
}
