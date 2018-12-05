<?php

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>

     

      <div class="row featurette">
        <div class="col-md-12">
            <h2 class="featurette-heading"><?=$new->title?></h2>
          <p class="lead">
           <?= $new->long?>
        </div>
          
      </div>
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
        </div>
     