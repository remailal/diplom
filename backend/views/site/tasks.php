<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
$this->title = 'My Yii Application';

?>
  
     <?php foreach ($tasks as $task): ?>
             <!--=================== content body ====================-->
        <div class="col-lg-10 col-md-9 col-12 body_block  align-content-center">
            <!--=================== filter portfolio start====================-->
               
            <p class="lead">Информация об авторе:<br>
         <?= $task->name?> <br>
                    Email: <?= $task->email?><br>
                    Телефон: <?= $task->phone?><br>
                        Описание: <?= $task->body?><br>
                                        </p>
            <?php foreach ($photos as $photo): ?>
            <?php if ($photo->id_task == $task->id) {?>
            
                <div class="portfolio gutters img-container">
                
                 <div class="grid-item  branding architecture  col-md-6 col-lg-4">
                    <a href="/frontend/web/uploads/<?=$photo->pic?>" style="width: 300px; height: 300px; object-fit: cover;" title="">
                        <div class="project_box_one">
                            <img src="/frontend/web/uploads/<?=$photo->pic?>" style="width: 300px; height: 300px; object-fit: cover;" alt="" />
                            <div class="product_info">
                                <div class="product_info_text">
                                    <div class="product_info_text_inner">
                                        <h4>Открыть
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>    
            <?php }?><?php endforeach; ?>  
                
            <!--=================== filter portfolio end====================-->
        </div><?php endforeach; ?> 
     




