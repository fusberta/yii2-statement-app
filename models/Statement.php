<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Statement".
 *
 * @property int $statement_id
 * @property int|null $user_id
 * @property string $car_number
 * @property string $violation_description
 * @property string|null $status
 */
class Statement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Statement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['car_number', 'violation_description'], 'required'],
            [['violation_description', 'status'], 'string'],
            [['car_number'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'statement_id' => 'ID заявления',
            'user_id' => 'ID пользователя',
            'car_number' => 'Номер автомобиля',
            'violation_description' => 'Описание нарушения',
            'status' => 'Статус',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
