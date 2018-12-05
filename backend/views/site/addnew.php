<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
$this->title = 'My Yii Application';

Pjax::begin([
    // Опции Pjax
]);?>
     

<?php $form = ActiveForm::begin(['id' => 'news', 'options' => ['data' => ['pjax' => true]]]) ?>

 
            <h2 class="featurette-heading"><?= $form->field($new, 'title')->textInput()->label('Заголовок')?></h2>
          
              <?= $form->field($new, 'short')->label('Краткое описание')->textarea(['rows' => 4])?>
        <?= $form->field($new, 'long')->label('Полное описание')->textarea(['rows' => 6])?>
        
          
          <?= $form->field($modelImg, 'image')->fileInput()->label('Фото на главной странице') ?>
                  
               
<div class="form-group">
                    <?= Html::submitButton('Добавить новость', ['class' => 'btn btn-primary','data' => [
                'method' => 'post',
            ]])?>
                </div>

            <?php ActiveForm::end(); 
            Pjax::end();?>
     
  
     
      




