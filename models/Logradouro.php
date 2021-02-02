<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logradouro".
 *
 * @property string $cep
 * @property string|null $nome
 * @property string|null $bairro
 *
 * @property Pedido[] $pedidos
 */
class Logradouro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logradouro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cep'], 'required'],
            [['cep'], 'string', 'max' => 8],
            [['nome', 'bairro'], 'string', 'max' => 80],
            [['cep'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cep' => 'Cep',
            'nome' => 'Nome',
            'bairro' => 'Bairro',
        ];
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery|PedidoQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['CEP' => 'cep']);
    }

    /**
     * {@inheritdoc}
     * @return LogradouroQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LogradouroQuery(get_called_class());
    }
}
