<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Pedido]].
 *
 * @see Pedido
 */
class LogradouroQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Pedido[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Pedido|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
