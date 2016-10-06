<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Usuario".
 *
 * @property integer $idUsuario
 * @property string $nombre
 * @property string $username
 * @property string $passwd
 * @property string $email
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'username', 'passwd', 'email'], 'required'],
            [['nombre'], 'string', 'max' => 50],
            [['username'], 'string', 'max' => 20],
            [['passwd'], 'string', 'max' => 8],
            [['email'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => Yii::t('app', 'Id Usuario'),
            'nombre' => Yii::t('app', 'Nombre'),
            'username' => Yii::t('app', 'Username'),
            'passwd' => Yii::t('app', 'Passwd'),
            'email' => Yii::t('app', 'Email'),
        ];
    }
}
