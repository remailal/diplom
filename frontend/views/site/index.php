<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active blogimgcarousel">
          <img src="https://pp.userapi.com/c639324/v639324830/2f8de/jBc2ML98Q_I.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
                <p><h3>Храним прошлое, изучаем настоящее, создаём для будущего</h3></p>
            </div>
          </div>
        </div>
        <div class="item blogimgcarousel">
          <img src="https://pp.userapi.com/c831309/v831309596/cae90/f_lbyCpBinE.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              
            </div>
          </div>
        </div>
        <div class="item blogimgcarousel">
          <img src="https://pp.userapi.com/c824410/v824410160/461b0/6C_ARHhdfjE.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing" style="margin-top: 3%;">

      <!-- Three columns of text below the carousel -->
     
        <div class="col-lg-12" style="margin-bottom: 12%">
            <h2><p class="lead" style="font-size: 30px">О нас</p></h2>
          
              <h4><p class="lead">Волжский историко-краеведческий музей был открыт 4 апреля 1970 года в качестве филиала Волгоградского областного краеведческого музея.
                  Первой заведующей музея была К. В. Митерева. Ко дню открытия музей обладал внушительной коллекцией предметов более 4000 
                  единиц хранения. Большинство из них - это документы и предметы, связанные с историей строительства Волжской ГЭС, предприятий
                  промышленности, культурной и социальной жизни волжан. Сотрудники музея занимаются изучением Заволжья. <br>

 </p>
              </h4>
             
        
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

     <?php /*foreach ($news as $new): */ for ($i = 0; $i < count($news); $i++) {?>
     
      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading"><?=Html::a($news[$i]->title, ['newdetail','id'=>$news[$i]->id]);?></h2>
          <p class="lead">
        <?= $news[$i]->short?>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive blogimgbottom" src="uploads/<?= $news[$i]->pic?>" alt="">
        </div>
      </div>
      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5">
          <img class="featurette-image img-responsive blogimgbottom" src="uploads/<?= $news[$i+1]->pic?>" alt="">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading"><?=Html::a($news[$i+1]->title, ['newdetail','id'=>$news[$i+1]->id]);?></h2>
          <p class="lead"><?= $news[$i+1]->short?></div>
      </div>

     <?php $i++;} /*endforeach;*/ ?> 
      <!-- /END THE FEATURETTES -->


</div>
