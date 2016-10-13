<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Perfil".
 *
 * @property integer $idPerfil
 * @property string $foto1
 * @property string $tipoFoto
 * @property string $enlace
 * @property string $faceId
 * @property integer $id_Usuario
 *
 * @property Usuario $idUsuario
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Perfil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['foto1', 'tipoFoto', 'id_Usuario'], 'required'],
            [['foto1'], 'string'],
            [['id_Usuario'], 'integer'],
            [['tipoFoto', 'enlace', 'faceId'], 'string', 'max' => 255],
            [['id_Usuario'], 'unique'],
            [['id_Usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_Usuario' => 'idUsuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPerfil' => Yii::t('app', 'Id Perfil'),
            'foto1' => Yii::t('app', 'Foto1'),
            'tipoFoto' => Yii::t('app', 'Tipo Foto'),
            'enlace' => Yii::t('app', 'Enlace'),
            'faceId' => Yii::t('app', 'Face ID'),
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
}
