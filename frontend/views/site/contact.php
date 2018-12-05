<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Заявка';
?>
<div class="site-contact">
    
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Если у вас имеется какая-либо ценность, которую вы хотите пожертвовать музею, заполните данную заявку. Сотрудники музея с вами свяжутся.
    </p>


    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Имя') ?>
            <?= $form->field($model, 'phone')->label('Номер телефона') ?>
                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6])->label('Описание ценности') ?>
            
             
 
<?= $form->field($modelImg, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label('Прикрепите фото') ?>


                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
