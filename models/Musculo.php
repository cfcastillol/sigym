<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "musculo".
 *
 * @property integer $id
 * @property string $musculo
 * @property string $usuariocrea
 * @property string $fechacrea
 * @property string $usuariomodifica
 * @property string $fechamodifica
 *
 * @property Ejercicio[] $ejercicios
 */
class Musculo extends MyActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'musculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['musculo'], 'required'],
            [['fechacrea', 'fechamodifica'], 'safe'],
            [['musculo'], 'string', 'max' => 50],
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
            'musculo' => 'Músculo',
            'usuariocrea' => 'Usuariocrea',
            'fechacrea' => 'Fechacrea',
            'usuariomodifica' => 'Usuariomodifica',
            'fechamodifica' => 'Fechamodifica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEjercicios()
    {
        return $this->hasMany(Ejercicio::className(), ['musculoid' => 'id']);
    }
}
