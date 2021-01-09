<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Events */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Create Event</div>
            <div class="panel-body">
            <div class="events-form">
                <?php $form = ActiveForm::begin(["id" => "create_update_event_form"]); ?>

                <?= $form->field($model, 'title')->textInput(['placeholder' => 'Enter title','maxlength' => true]) ?>

                <?php
                if(!empty($model->start_date))
                {
                    $model->start_date = date('d-m-Y',strtotime(str_replace("-","/",$model->start_date)));
                }
                ?>

                <?php
                echo $form->field($model, 'start_date')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Enter start date'],
                    'pluginOptions' => [
                        'autoclose'=>true
                    ]
                ]);
                ?>

                <?php
                if(!empty($model->end_date))
                {
                    $model->end_date = date('d-m-Y',strtotime(str_replace("-","/",$model->end_date)));
                }
                ?>

                <?php
                echo $form->field($model, 'end_date')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Enter end date'],
                    'pluginOptions' => [
                        'autoclose'=>true
                    ]
                ]);
                ?>

                <?php
                echo $form->field($model, 'is_custom_repeat')->radioList([0=>'Repeat', 1 => 'Repeat on the'],
                [
                    'item' => function($index, $label, $name, $checked, $value) use ($model) {
        
                        $return = '<label>';
                        $checked = "";
                        if($model->is_custom_repeat == $value)
                        {
                            $checked = "checked";
                        }
                        $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" class="recurring_type" '.$checked.'>';
                        $return .= '<span>' . ucwords($label) . '</span>';
                        $return .= '</label>';
        
                        return $return;
                    }
                        ]);
                ?>

                <input type="hidden" name="selected_recurring_type" id="selected_recurring_type">

                <div class="repeat <?=($model->is_custom_repeat == 0) ? "" : "d-none"?>">
                    <?php
                    echo $form->field($model, 'repeat_type')->widget(Select2::classname(), [
                        'data' => $model->repeat_type_dropdown,
                        'options' => ['placeholder' => 'Select repeat type'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                    <?php
                    echo $form->field($model, 'every')->widget(Select2::classname(), [
                        'data' => $model->every_dropdown,
                        'options' => ['placeholder' => 'Select every'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="repeat_on <?=($model->is_custom_repeat == 1) ? "" : "d-none"?>">
                    <?php
                    echo $form->field($model, 'repeat_on')->widget(Select2::classname(), [
                        'data' => $model->repeat_on_dropdown,
                        'options' => ['placeholder' => 'Select repeat on'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                    <?php
                    echo $form->field($model, 'repeat_week')->widget(Select2::classname(), [
                        'data' => $model->repeat_week_dropdown,
                        'options' => ['placeholder' => 'Select repeat week'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                    <?php
                    echo $form->field($model, 'repeat_month')->widget(Select2::classname(), [
                        'data' => $model->repeat_month_dropdown,
                        'options' => ['placeholder' => 'Select repeat month'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Cancle',['event/index'], ['class' => 'btn btn-default']) ?>
                </div>

                <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    // Radio button change event
    $(document).on('change',"input[type='radio']",function(){
        if($(this).val() == 0)
        {
            $("#selected_recurring_type").val($(this).val());
                $('.repeat').removeClass('d-none');
                $('.repeat_on').addClass('d-none');
        } else {
            $("#selected_recurring_type").val($(this).val());
            $('.repeat').addClass('d-none');
                $('.repeat_on').removeClass('d-none');
        }
    });
});
</script>
