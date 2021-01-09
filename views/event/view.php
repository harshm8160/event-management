<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Events */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">View Event</div>
            <div class="panel-body">
                <div class="events-view">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'title',
                        'start_date',
                        'end_date',
                        'is_custom_repeat',
                        'repeat_type',
                        'every',
                        'repeat_on',
                        'repeat_week',
                        'repeat_month',
                        'created_at',
                        'updated_at',
                    ],
                ]) ?>
                </div>
            </div>
        </div>
        <div class="form-group">
                    <?= Html::a('Cancle',['event/index'], ['class' => 'btn btn-default']) ?>
                </div>
    </div>
</div>