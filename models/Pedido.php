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
 * @property int|null $formapgto
 * @property string $CEP
 * @property string|null $numero
 * @property string|null $complemento
 * @property string|null $referencia
 * @property string|null $obs
 *
 * @property Logradouro $cEP
 * @property Meiopgto $formapgto0
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
            [['horaPedido', 'horaEntrega', 'valor', 'nomecliente', 'CEP'], 'required'],
            [['horaPedido', 'horaEntrega'], 'safe'],
            [['valor'], 'number'],
            [['status', 'formapgto'], 'integer'],
            [['entregador', 'nomecliente', 'sobrenomecliente', 'numero', 'complemento'], 'string', 'max' => 45],
            [['CEP'], 'string', 'max' => 8],
            [['referencia', 'obs'], 'string', 'max' => 128],
            [['CEP'], 'exist', 'skipOnError' => true, 'targetClass' => Logradouro::className(), 'targetAttribute' => ['CEP' => 'cep']],
            [['formapgto'], 'exist', 'skipOnError' => true, 'targetClass' => Meiopgto::className(), 'targetAttribute' => ['formapgto' => 'idmeiopgto']],
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
            'formapgto' => 'Formapgto',
            'CEP' => 'Cep',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
            'referencia' => 'Referencia',
            'obs' => 'Obs',
        ];
    }

    /**
     * Gets query for [[CEP]].
     *
     * @return \yii\db\ActiveQuery|LogradouroQuery
     */
    public function getCEP()
    {
        return $this->hasOne(Logradouro::className(), ['cep' => 'CEP']);
    }

    /**
     * Gets query for [[Formapgto0]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getFormapgto0()
    {
        return $this->hasOne(Meiopgto::className(), ['idmeiopgto' => 'formapgto']);
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
     * @return LogradouroQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LogradouroQuery(get_called_class());
    }
}
