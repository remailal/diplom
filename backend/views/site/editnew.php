
     
  
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
        <?= $form->field($new, 'long')->label('Полное описание')->textarea(['rows' => 6, 'value' => str_replace('<br>', "\n", $new->long)])?>
        
          
          <?= $form->field($modelImg, 'image')->fileInput()->label('Фото на главной странице') ?>
        
          
               
<div class="form-group">
                    <?= Html::submitButton('Применить изменения', ['class' => 'btn btn-primary','data' => [
                'method' => 'post',
            ]])?>
                </div>

            <?php ActiveForm::end(); 
            Pjax::end();?>
     
  
     <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
 
    <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label('Остальные фото') ?>
 
     <?= Html::submitButton('Загрузить фотографии', ['class' => 'btn btn-primary','data' => [
                'method' => 'post',
            ]])?>
 
<?php ActiveForm::end() ?>
     
             <!--=================== content body ====================-->
        <div class="col-lg-10 col-md-9 col-12 body_block  align-content-center">
            <!--=================== filter portfolio start====================-->
            <div class="portfolio gutters  img-container">
                <div class="grid-item  branding architecture  col-md-6 col-lg-3">
                    <a href="/frontend/web/uploads/<?=$new->pic?>" style="width: 200px; height: 200px; object-fit: cover;" title="">                        
                        <div class="project_box_one">
                            <img src="/frontend/web/uploads/<?=$new->pic?>" style="width: 200px; height: 200px; object-fit: cover;" alt="" />
                            <div class="product_info">
                                <div class="product_info_text">
                                    <div class="product_info_text_inner">
                                        <h4>Открыть</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php foreach ($photos as $photo): ?>
                 <div class="grid-item  branding architecture  col-md-6 col-lg-3">
                    <a href="/frontend/web/uploads/<?=$photo->pic?>" style="width: 200px; height: 200px; object-fit: cover;" title="">
                        <div class="project_box_one">
                            <img src="/frontend/web/uploads/<?=$photo->pic?>" style="width: 200px; height: 200px; object-fit: cover;" alt="" />
                            <div class="product_info">
                                <div class="product_info_text">
                                    <div class="product_info_text_inner">
                                        <h4>Открыть</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>  
            </div>
            <!--=================== filter portfolio end====================-->
        </div>
     





     




