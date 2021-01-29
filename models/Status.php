<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property int $idstatus
 * @property string $descricao
 *
 * @property Pedido[] $pedidos
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idstatus', 'descricao'], 'required'],
            [['idstatus'], 'integer'],
            [['descricao'], 'string', 'max' => 128],
            [['idstatus'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idstatus' => 'Idstatus',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['status' => 'idstatus']);
    }
}
