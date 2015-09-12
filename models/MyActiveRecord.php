<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyActiveRecord
 *
 * @author blonder413
 */

namespace app\models;
use \yii\db\Expression;
use \yii\behaviors\BlameableBehavior;
use \yii\db\ActiveRecord;

use Yii;

class MyActiveRecord extends \yii\db\ActiveRecord{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'createdAtAttribute' => 'fechacrea',
                'updatedAtAttribute' => 'fechamodifica',
                'value' => new Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'usuariocrea',
                'updatedByAttribute' => 'usuariomodifica',
            ],
        ];
    }
}
