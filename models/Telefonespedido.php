<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "telefonespedido".
 *
 * @property int $idtelefone
 * @property int $idpedido
 *
 * @property Pedido $idpedido0
 * @property Telefone $idtelefone0
 */
class Telefonespedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telefonespedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idtelefone', 'idpedido'], 'required'],
            [['idtelefone', 'idpedido'], 'integer'],
            [['idtelefone', 'idpedido'], 'unique', 'targetAttribute' => ['idtelefone', 'idpedido']],
            [['idpedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['idpedido' => 'idpedido']],
            [['idtelefone'], 'exist', 'skipOnError' => true, 'targetClass' => Telefone::className(), 'targetAttribute' => ['idtelefone' => 'idtelefone']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtelefone' => 'Idtelefone',
            'idpedido' => 'Idpedido',
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
     * Gets query for [[Idtelefone0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdtelefone0()
    {
        return $this->hasOne(Telefone::className(), ['idtelefone' => 'idtelefone']);
    }
}
