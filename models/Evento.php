<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Evento".
 *
 * @property integer $idEvento
 * @property string $Nombre
 * @property string $Fecha
 * @property string $Ubicacion
 */
class Evento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Evento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Fecha', 'Ubicacion'], 'required'],
            [['Fecha'], 'safe'],
            [['Nombre'], 'string', 'max' => 50],
            [['Ubicacion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEvento' => Yii::t('app', 'Id Evento'),
            'Nombre' => Yii::t('app', 'Nombre'),
            'Fecha' => Yii::t('app', 'Fecha'),
            'Ubicacion' => Yii::t('app', 'Ubicacion'),
        ];
    }
}
