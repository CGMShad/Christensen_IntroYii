<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persons".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $age
 * @property int|null $fk_office
 *
 * @property Offices $fkOffice
 */
class Persons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'persons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'age', 'fk_office'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['id'], 'unique'],
            [['fk_office'], 'exist', 'skipOnError' => true, 'targetClass' => Offices::className(), 'targetAttribute' => ['fk_office' => 'id']],
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
            'age' => 'Age',
            'fk_office' => 'Fk Office',
        ];
    }

    /**
     * Gets query for [[FkOffice]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkOffice()
    {
        return $this->hasOne(Offices::className(), ['id' => 'fk_office']);
    }
}
