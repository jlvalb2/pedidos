<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prato".
 *
 * @property int $idprato
 * @property string $nome
 * @property float $preco
 *
 * @property Pratospedido[] $pratospedidos
 * @property Pedido[] $idpedidos
 */
class Prato extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prato';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'preco'], 'required'],
            [['preco'], 'number'],
            [['nome'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idprato' => 'Idprato',
            'nome' => 'Nome',
            'preco' => 'Preco',
        ];
    }

    /**
     * Gets query for [[Pratospedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPratospedidos()
    {
        return $this->hasMany(Pratospedido::className(), ['idprato' => 'idprato']);
    }

    /**
     * Gets query for [[Idpedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdpedidos()
    {
        return $this->hasMany(Pedido::className(), ['idpedido' => 'idpedido'])->viaTable('pratospedido', ['idprato' => 'idprato']);
    }
}
