<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Authors;


$authors = Authors::find()->all();
//var_dump($authors); die();
$authorsItems = ArrayHelper::map($authors,'id','firstname');
//var_dump($authorsItems); die();
/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form yii\widgets\ActiveForm */
use yii\jui\DatePicker;
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= $form->field($model, 'name')->textInput(); ?>
        <?= Html::activeLabel($model, 'date_publish') ?>
        <?= DatePicker::widget([
            'model' => $model,
            'attribute' => 'date_publish',
            'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd',
        ]);

        ?>

        <?= $form->field($model,'author_id')->dropDownList($authorsItems) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
