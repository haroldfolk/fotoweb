<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Foto".
 *
 * @property integer $idFoto
 * @property resource $fotoMuestra
 * @property string $tipoFoto
 * @property string $enlace
 * @property integer $id_Evento
 *
 * @property Evento $idEvento
 * @property FotoUsuario[] $fotoUsuarios
 * @property Usuario[] $idUsuarios
 */
class Foto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Foto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fotoMuestra', 'tipoFoto', 'enlace', 'id_Evento'], 'required'],
            [['fotoMuestra'], 'string'],
            [['id_Evento'], 'integer'],
            [['tipoFoto', 'enlace'], 'string', 'max' => 255],
            [['id_Evento'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['id_Evento' => 'idEvento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idFoto' => Yii::t('app', 'Id Foto'),
            'fotoMuestra' => Yii::t('app', 'Foto Muestra'),
            'tipoFoto' => Yii::t('app', 'Tipo Foto'),
            'enlace' => Yii::t('app', 'Enlace'),
            'id_Evento' => Yii::t('app', 'Id  Evento'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEvento()
    {
        return $this->hasOne(Evento::className(), ['idEvento' => 'id_Evento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFotoUsuarios()
    {
        return $this->hasMany(FotoUsuario::className(), ['id_Foto' => 'idFoto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['idUsuario' => 'id_Usuario'])->viaTable('FotoUsuario', ['id_Foto' => 'idFoto']);
    }
}
