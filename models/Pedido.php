<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property int $idpedido
 * @property string $horaPedido
 * @property string $horaEntrega
 * @property float $valor
 * @property string|null $entregador
 * @property int $status
 * @property string $nomecliente
 * @property string|null $sobrenomecliente
 * @property string|null $CEP
 * @property string $Logradouro
 * @property string|null $numero
 * @property string|null $complemento
 * @property string|null $referencia
 * @property string|null $obs
 *
 * @property Status $status0
 * @property Pedidopagamentos[] $pedidopagamentos
 * @property Pratospedido[] $pratospedidos
 * @property Prato[] $idpratos
 * @property Telefonespedido[] $telefonespedidos
 * @property Telefone[] $idtelefones
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['horaPedido', 'horaEntrega', 'valor', 'nomecliente', 'Logradouro'], 'required'],
            [['horaPedido', 'horaEntrega'], 'safe'],
            [['valor'], 'number'],
            [['status'], 'integer'],
            [['entregador', 'nomecliente', 'sobrenomecliente', 'CEP', 'Logradouro', 'numero', 'complemento'], 'string', 'max' => 45],
            [['referencia', 'obs'], 'string', 'max' => 128],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status' => 'idstatus']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpedido' => 'Idpedido',
            'horaPedido' => 'Hora Pedido',
            'horaEntrega' => 'Hora Entrega',
            'valor' => 'Valor',
            'entregador' => 'Entregador',
            'status' => 'Status',
            'nomecliente' => 'Nomecliente',
            'sobrenomecliente' => 'Sobrenomecliente',
            'CEP' => 'Cep',
            'Logradouro' => 'Logradouro',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
            'referencia' => 'Referencia',
            'obs' => 'Obs',
        ];
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Status::className(), ['idstatus' => 'status']);
    }

    /**
     * Gets query for [[Pedidopagamentos]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getPedidopagamentos()
    {
        return $this->hasMany(Pedidopagamentos::className(), ['idpedido' => 'idpedido']);
    }

    /**
     * Gets query for [[Pratospedidos]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getPratospedidos()
    {
        return $this->hasMany(Pratospedido::className(), ['idpedido' => 'idpedido']);
    }

    /**
     * Gets query for [[Idpratos]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getIdpratos()
    {
        return $this->hasMany(Prato::className(), ['idprato' => 'idprato'])->viaTable('pratospedido', ['idpedido' => 'idpedido']);
    }

    /**
     * Gets query for [[Telefonespedidos]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getTelefonespedidos()
    {
        return $this->hasMany(Telefonespedido::className(), ['idpedido' => 'idpedido']);
    }

    /**
     * Gets query for [[Idtelefones]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getIdtelefones()
    {
        return $this->hasMany(Telefone::className(), ['idtelefone' => 'idtelefone'])->viaTable('telefonespedido', ['idpedido' => 'idpedido']);
    }

    /**
     * {@inheritdoc}
     * @return PedidoAQ the active query used by this AR class.
     */
    public static function find()
    {
        return new PedidoAQ(get_called_class());
    }
}
