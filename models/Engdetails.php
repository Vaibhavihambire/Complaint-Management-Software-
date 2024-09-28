<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "engdetails".
 *
 * @property int $id
 * @property string $name
 * @property string $work
 * @property int $phoneNo
 */
class Engdetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'engdetails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'work', 'phoneNo'], 'required'],
            [['phoneNo'], 'integer'],
            [['name', 'work'], 'string', 'max' => 50],
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
            'work' => 'Work',
            'phoneNo' => 'Phone No',
        ];
    }
}
