<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "FotoUsuario".
 *
 * @property integer $id_Foto
 * @property integer $id_Usuario
 *
 * @property Usuario $idUsuario
 * @property Foto $idFoto
 */
class FotoUsuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'FotoUsuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_Foto', 'id_Usuario'], 'required'],
            [['id_Foto', 'id_Usuario'], 'integer'],
            [['id_Usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_Usuario' => 'idUsuario']],
            [['id_Foto'], 'exist', 'skipOnError' => true, 'targetClass' => Foto::className(), 'targetAttribute' => ['id_Foto' => 'idFoto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Foto' => Yii::t('app', 'Id  Foto'),
            'id_Usuario' => Yii::t('app', 'Id  Usuario'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'id_Usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFoto()
    {
        return $this->hasOne(Foto::className(), ['idFoto' => 'id_Foto']);
    }
}
