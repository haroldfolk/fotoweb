<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personalizacion".
 *
 * @property integer $idPersonalizacion
 * @property string $Color
 * @property string $tamaño
 * @property string $Fuente
 * @property integer $id_Usuario
 * @property integer $id_Empresa
 *
 * @property Empresa $empresa
 * @property Empresa $empresa0
 */
class Personalizacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personalizacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'id_Usuario'], 'required'],
            [['id_Usuario'], 'integer'],
            [['color', 'tamano', 'fuente'], 'string', 'max' => 20],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPersonalizacion' => Yii::t('app', 'Id Personalizacion'),
            'Color' => Yii::t('app', 'Color'),
            'tamano' => Yii::t('app', 'Tama�o'),
            'Fuente' => Yii::t('app', 'Fuente'),
            'id_Usuario' => Yii::t('app', 'Id  Usuario'),

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */


    /**
     * @return \yii\db\ActiveQuery
     */

}
