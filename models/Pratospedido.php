<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pratospedido".
 *
 * @property int $idprato
 * @property int $idpedido
 * @property int $quantidade
 *
 * @property Pedido $idpedido0
 * @property Prato $idprato0
 */
class Pratospedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pratospedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idprato', 'idpedido'], 'required'],
            [['idprato', 'idpedido', 'quantidade'], 'integer'],
            [['idprato', 'idpedido'], 'unique', 'targetAttribute' => ['idprato', 'idpedido']],
            [['idpedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['idpedido' => 'idpedido']],
            [['idprato'], 'exist', 'skipOnError' => true, 'targetClass' => Prato::className(), 'targetAttribute' => ['idprato' => 'idprato']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idprato' => 'Idprato',
            'idpedido' => 'Idpedido',
            'quantidade' => 'Quantidade',
        ];
    }

    /**
     * Gets query for [[Idpedido0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdpedido0()
    {
        return $this->hasOne(Pedido::className(), ['idpedido' => 'idpedido']);
    }

    /**
     * Gets query for [[Idprato0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdprato0()
    {
        return $this->hasOne(Prato::className(), ['idprato' => 'idprato']);
    }
}
