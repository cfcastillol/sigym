<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $id
 * @property integer $sexoid
 * @property integer $tipodocumentoid
 * @property string $documento
 * @property string $primernombre
 * @property string $segundonombre
 * @property string $primerapellido
 * @property string $segundoapellido
 * @property string $direccion
 * @property string $telefono
 * @property string $email
 * @property double $estatura
 * @property double $peso
 * @property integer $edad
 * @property double $imc
 * @property double $pgc
 * @property string $usuariocrea
 * @property string $fechacrea
 * @property string $usuariomodifica
 * @property string $fechamodifica
 *
 * @property Sexo $sexo
 * @property Tipodocumento $tipodocumento
 * @property Personamembresia[] $personamembresias
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sexoid', 'tipodocumentoid', 'documento', 'primernombre', 'primerapellido', 'email', 'estatura', 'peso', 'edad', 'imc', 'pgc'], 'required'],
            [['sexoid', 'tipodocumentoid', 'edad'], 'integer'],
            [['estatura', 'peso', 'imc', 'pgc'], 'number'],
            [['fechacrea', 'fechamodifica'], 'safe'],
            [['documento'], 'string', 'max' => 16],
            [['primernombre', 'segundonombre', 'primerapellido', 'segundoapellido', 'usuariocrea', 'usuariomodifica'], 'string', 'max' => 45],
            [['direccion', 'email'], 'string', 'max' => 80],
            [['telefono'], 'string', 'max' => 15],
            [['documento'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sexoid' => 'Sexo',
            'tipodocumentoid' => 'Tipo de documento',
            'documento' => 'Documento',
            'primernombre' => 'Primer nombre',
            'segundonombre' => 'Segundo nombre',
            'primerapellido' => 'Primer apellido',
            'segundoapellido' => 'Segundo apellido',
            'nombrecompleto'=>'Nombre completo',
            'direccion' => 'Dirección',
            'telefono' => 'Teléfono',
            'email' => 'Email',
            'estatura' => 'Estatura en Mts',
            'peso' => 'Peso en Kg',
            'edad' => 'Edad',
            'imc' => 'Imc',
            'pgc' => 'Pgc',
            'usuariocrea' => 'Usuariocrea',
            'fechacrea' => 'Fechacrea',
            'usuariomodifica' => 'Usuariomodifica',
            'fechamodifica' => 'Fechamodifica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSexo()
    {
        return $this->hasOne(Sexo::className(), ['id' => 'sexoid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipodocumento()
    {
        return $this->hasOne(Tipodocumento::className(), ['id' => 'tipodocumentoid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonamembresias()
    {
        return $this->hasMany(Personamembresia::className(), ['personaid' => 'id']);
    }
    
    public function getNombrecompleto()
        {
                return $this->primernombre.' '.$this->primerapellido;
        }
        
    public function getNombrecedula()
        {
                return $this->documento.' - '.$this->primernombre.' '.$this->primerapellido;
        }
}
