<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pagamento".
 *
 * @property int $idpagamento
 * @property string $data
 * @property float $valor
 * @property int $meiopgto
 * @property string|null $titular
 * @property string|null $obs
 *
 * @property Meiopgto $meiopgto0
 * @property Pedidopagamentos $pedidopagamentos
 */
class Pagamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'valor', 'meiopgto'], 'required'],
            [['data'], 'safe'],
            [['valor'], 'number'],
            [['meiopgto'], 'integer'],
            [['titular'], 'string', 'max' => 45],
            [['obs'], 'string', 'max' => 128],
            [['meiopgto'], 'exist', 'skipOnError' => true, 'targetClass' => Meiopgto::className(), 'targetAttribute' => ['meiopgto' => 'idmeiopgto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpagamento' => 'Idpagamento',
            'data' => 'Data',
            'valor' => 'Valor',
            'meiopgto' => 'Meiopgto',
            'titular' => 'Titular',
            'obs' => 'Obs',
        ];
    }

    /**
     * Gets query for [[Meiopgto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeiopgto0()
    {
        return $this->hasOne(Meiopgto::className(), ['idmeiopgto' => 'meiopgto']);
    }

    /**
     * Gets query for [[Pedidopagamentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidopagamentos()
    {
        return $this->hasOne(Pedidopagamentos::className(), ['idpagamento' => 'idpagamento']);
    }
}
