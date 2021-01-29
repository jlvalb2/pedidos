<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "telefone".
 *
 * @property int $idtelefone
 * @property string $prefixo
 * @property string $numero
 * @property string|null $titular
 * @property int|null $zap
 * @property string|null $obs
 *
 * @property Telefonespedido[] $telefonespedidos
 * @property Pedido[] $idpedidos
 */
class Telefone extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telefone';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numero'], 'required'],
            [['zap'], 'integer'],
            [['prefixo'], 'string', 'max' => 8],
            [['numero'], 'string', 'max' => 12],
            [['titular', 'obs'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtelefone' => 'Idtelefone',
            'prefixo' => 'Prefixo',
            'numero' => 'Numero',
            'titular' => 'Titular',
            'zap' => 'Zap',
            'obs' => 'Obs',
        ];
    }

    /**
     * Gets query for [[Telefonespedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTelefonespedidos()
    {
        return $this->hasMany(Telefonespedido::className(), ['idtelefone' => 'idtelefone']);
    }

    /**
     * Gets query for [[Idpedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdpedidos()
    {
        return $this->hasMany(Pedido::className(), ['idpedido' => 'idpedido'])->viaTable('telefonespedido', ['idtelefone' => 'idtelefone']);
    }
}
