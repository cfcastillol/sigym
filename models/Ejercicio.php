<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ejercicio".
 *
 * @property integer $id
 * @property integer $musculoid
 * @property string $ejercicio
 * @property string $descripcion
 * @property string $imagen
 * @property string $video
 * @property string $usuariocrea
 * @property string $fechacrea
 * @property string $usuariomodifica
 * @property string $fechamodifica
 *
 * @property Musculo $musculo
 */
class Ejercicio extends MyActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public $archivo;
    
    public static function tableName()
    {
        return 'ejercicio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['musculoid', 'ejercicio', 'descripcion'], 'required'],
            [['musculoid'], 'integer'],
            [['archivo'], 'required', 'on'=>'create'],
            [['archivo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxSize' => 1024*1024],
            [['descripcion'], 'string'],
            [['fechacrea', 'fechamodifica'], 'safe'],
            [['ejercicio'], 'string', 'max' => 80],
            [['imagen', 'video'], 'string', 'max' => 255],
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
            'musculoid' => 'Músculo',
            'ejercicio' => 'Ejercicio',
            'descripcion' => 'Descripción',
            'imagen' => 'Imagen',
            'archivo' => 'Imagen',
            'video' => 'Video',
            'usuariocrea' => 'Usuariocrea',
            'fechacrea' => 'Fechacrea',
            'usuariomodifica' => 'Usuariomodifica',
            'fechamodifica' => 'Fechamodifica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusculo()
    {
        return $this->hasOne(Musculo::className(), ['id' => 'musculoid']);
    }
}
