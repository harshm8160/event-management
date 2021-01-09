<?php

use yii\helpers\Html;
use app\models\Events;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Events', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            'id',
            'title',
            [
                'format' => 'raw',
                'label' => 'Dates',
                'value' => function ($model) {
                    $dates = '';
                    if($model instanceof Events)
                    {
                        $dates = $model->start_date ." to ". $model->end_date;
                    }
                    return $dates;
                }
            ],
            [
                'format' => 'raw',
                'label' => 'Occurrence',
                'value' => function ($model) {
                    $occurrence = '';
                    if($model instanceof Events)
                    {
                        if($model->is_custom_repeat == Events::RECURRENCE_TYPE_REPEAT)
                        {
                            $occurrence = $model->repeat_type_dropdown[$model->repeat_type] ." ".$model->every_dropdown[$model->every];
                        } else {
                            $occurrence = "Every ".$model->repeat_on_dropdown[$model->repeat_on] ." ".$model->repeat_week_dropdown[$model->repeat_week]." of the ".$model->repeat_month_dropdown[$model->repeat_month];
                        }
                    }
                    return $occurrence;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
