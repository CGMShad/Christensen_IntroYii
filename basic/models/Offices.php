<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "offices".
 *
 * @property int $id
 * @property string|null $label
 *
 * @property Persons[] $persons
 */
class Offices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['label'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
        ];
    }

    /**
     * Gets query for [[Persons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersons()
    {
        return $this->hasMany(Persons::className(), ['fk_office' => 'id']);
    }
}
