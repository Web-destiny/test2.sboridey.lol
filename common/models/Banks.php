<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "banks".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $extra1
 */
class Banks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'extra1'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'extra1' => 'Extra1',
        ];
    }
}
