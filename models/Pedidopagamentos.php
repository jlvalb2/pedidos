<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedidopagamentos".
 *
 * @property int $idpedido
 * @property int $idpagamento
 *
 * @property Pagamento $idpagamento0
 * @property Pedido $idpedido0
 */
class Pedidopagamentos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedidopagamentos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idpedido', 'idpagamento'], 'required'],
            [['idpedido', 'idpagamento'], 'integer'],
            [['idpagamento'], 'unique'],
            [['idpagamento'], 'exist', 'skipOnError' => true, 'targetClass' => Pagamento::className(), 'targetAttribute' => ['idpagamento' => 'idpagamento']],
            [['idpedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['idpedido' => 'idpedido']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpedido' => 'Idpedido',
            'idpagamento' => 'Idpagamento',
        ];
    }

    /**
     * Gets query for [[Idpagamento0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdpagamento0()
    {
        return $this->hasOne(Pagamento::className(), ['idpagamento' => 'idpagamento']);
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
}
