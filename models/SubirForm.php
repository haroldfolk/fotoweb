<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SubirForm extends \yii\db\ActiveRecord
{
    public $idEvento;



    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['idEvento'], 'required'],
            [['idEvento'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['idEvento' => 'idEvento']],

        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'idEvento' => 'CODIGO del EVENTO',
        ];
    }


    public function getIdEvento()
    {
        return $this->hasOne(Evento::className(), ['idEvento' => 'idEvento']);
    }
}
