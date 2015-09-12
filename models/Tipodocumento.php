<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipodocumento".
 *
 * @property integer $id
 * @property string $abreviatura
 * @property string $tipodocumento
 * @property string $usuariocrea
 * @property string $fechacrea
 * @property string $usuariomodifica
 * @property string $fechamodifica
 *
 * @property Persona[] $personas
 */
class Tipodocumento extends MyActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipodocumento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['abreviatura', 'tipodocumento'], 'required'],
            [['fechacrea', 'fechamodifica'], 'safe'],
            [['abreviatura'], 'string', 'max' => 4],
            [['tipodocumento'], 'string', 'max' => 80],
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
            'abreviatura' => 'Abreviatura',
            'tipodocumento' => 'Tipodocumento',
            'usuariocrea' => 'Usuariocrea',
            'fechacrea' => 'Fechacrea',
            'usuariomodifica' => 'Usuariomodifica',
            'fechamodifica' => 'Fechamodifica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['tipodocumentoid' => 'id']);
    }
}
