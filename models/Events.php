<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string $is_custom_repeat 0 => Repeat , 1 => Repeat on the
 * @property string|null $repeat_type 1 => Every, 2 => Every Other, 3 => Every Third, 4 => Every Fourth
 * @property string|null $every 1 => Day, 2 => Week, 3 => Month, 4 => Year
 * @property string|null $repeat_on
 * @property string|null $repeat_week 1 => Sun, 2 => Mon, 3 => Tue, 4 => Wed, 5 => Thu, 6 => Fri, 7 => Sat
 * @property string|null $repeat_month 1 => Month, 2 => 3 Month, 3 => 4 Month, 4 => 6 Month, 5 => Year
 * @property string $created_at
 * @property string $updated_at
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * Identify recurrence type
     */
    const RECURRENCE_TYPE_REPEAT = "0";
    const RECURRENCE_TYPE_REPEAT_ON = "1";

    /**
     * Identify repeat type
     */
    public $repeat_type_dropdown = [
        1 => 'Every',
        2 => 'Every Other',
        3 => 'Every Third',
        4 => 'Every Fourth', 
    ];

    /**
     * Identify every
     */
    public $every_dropdown = [
        1 => 'Day',
        2 => 'Week',
        3 => 'Month',
        4 => 'Year', 
    ];

    /**
     * Identify repeat on
     */
    public $repeat_on_dropdown = [
        1 => 'First',   
        2 => 'Secound',
        3 => 'Third',
        4 => 'Fourth', 
    ];

    /**
     * Identify repeat week
     */
    public $repeat_week_dropdown = [
        1 => 'Sun',   
        2 => 'Mon',
        3 => 'Tue',
        4 => 'Wed', 
        5 => 'Thu', 
        6 => 'Fri', 
        7 => 'Sat', 
    ];

    /**
     * Identify repeat month
     */
    public $repeat_month_dropdown = [
        1 => 'Month',   
        2 => '3 Month',
        3 => '4 Month',
        4 => '6 Month', 
        5 => 'Year',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'start_date', 'end_date'], 'required'],
            [['is_custom_repeat'], 'required','message' => "Please select at least one option"],
            [
                'repeat_type',  'required', 
                'when' => function ($model) { 
                    return $model->is_custom_repeat == 0; 
                }, 
                'whenClient' => "function (attribute, value) { 
                    return $('#selected_recurring_type').val() == '0'; 
                }"
            ],
            [
                'every',  'required', 
                'when' => function ($model) { 
                    return $model->is_custom_repeat == 0; 
                }, 
                'whenClient' => "function (attribute, value) { 
                    return $('#selected_recurring_type').val() == '0'; 
                }"
            ],
            [
                'repeat_on',  'required', 
                'when' => function ($model) { 
                    return $model->is_custom_repeat == 1; 
                }, 
                'whenClient' => "function (attribute, value) { 
                    return $('#selected_recurring_type').val() == '1'; 
                }"
            ],
            [
                'repeat_week',  'required', 
                'when' => function ($model) { 
                    return $model->is_custom_repeat == 1; 
                }, 
                'whenClient' => "function (attribute, value) { 
                    return $('#selected_recurring_type').val() == '1'; 
                }"
            ],
            [
                'repeat_month',  'required', 
                'when' => function ($model) { 
                    return $model->is_custom_repeat == 1; 
                }, 
                'whenClient' => "function (attribute, value) { 
                    return $('#selected_recurring_type').val() == '1'; 
                }"
            ],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['is_custom_repeat', 'repeat_type', 'every', 'repeat_on', 'repeat_week', 'repeat_month'], 'string'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'is_custom_repeat' => 'Recurrence',
            'repeat_type' => 'Repeat Type',
            'every' => 'Every',
            'repeat_on' => 'Repeat On',
            'repeat_week' => 'Repeat Week',
            'repeat_month' => 'Repeat Month',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
