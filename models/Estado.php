<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado".
 *
 * @property integer $id
 * @property string $estado
 * @property string $usuariocrea
 * @property string $fechacrea
 * @property string $usuariomodifica
 * @property string $fechamodifica
 *
 * @property Membresia[] $membresias
 * @property Personamembresia[] $personamembresias
 */
class Estado extends MyActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado'], 'required'],
            [['fechacrea', 'fechamodifica'], 'safe'],
            [['estado', 'usuariocrea', 'usuariomodifica'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'estado' => 'Estado',
            'usuariocrea' => 'Usuariocrea',
            'fechacrea' => 'Fechacrea',
            'usuariomodifica' => 'Usuariomodifica',
            'fechamodifica' => 'Fechamodifica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembresias()
    {
        return $this->hasMany(Membresia::className(), ['estadoid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonamembresias()
    {
        return $this->hasMany(Personamembresia::className(), ['estado_id' => 'id']);
    }
}
