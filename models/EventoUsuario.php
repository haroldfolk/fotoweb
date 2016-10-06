<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EventoUsuario".
 *
 * @property integer $id_Evento
 * @property integer $id_Usuario
 *
 * @property Evento $idEvento
 * @property Usuario $idUsuario
 */
class EventoUsuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EventoUsuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_Evento', 'id_Usuario'], 'required'],
            [['id_Evento', 'id_Usuario'], 'integer'],
            [['id_Evento'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['id_Evento' => 'idEvento']],
            [['id_Usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_Usuario' => 'idUsuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Evento' => Yii::t('app', 'Id  Evento'),
            'id_Usuario' => Yii::t('app', 'Id  Usuario'),
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
    public function getIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'id_Usuario']);
    }
}
