<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meiopgto".
 *
 * @property int $idmeiopgto
 * @property string $meio
 *
 * @property Pagamento[] $pagamentos
 */
class Meiopgto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meiopgto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meio'], 'required'],
            [['meio'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idmeiopgto' => 'Idmeiopgto',
            'meio' => 'Meio',
        ];
    }

    /**
     * Gets query for [[Pagamentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPagamentos()
    {
        return $this->hasMany(Pagamento::className(), ['meiopgto' => 'idmeiopgto']);
    }
}
