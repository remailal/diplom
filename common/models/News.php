<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\models;
use Yii;
/**
 * Description of News
 *
 * @author katay
 */
class News extends \yii\db\ActiveRecord{
    
    public static function tableName()
    {
        return 'news';
    }
     
    public function setImage($file)
   {
       $this->pic = $file;
   }
   
   public function delImage($path)
   {
       //$this->path = $this->pic;
      // $path = '1.jpg';
       if (file_exists(Yii::getAlias('@frontend').'/web/uploads/'.$path))
     unlink(Yii::getAlias('@frontend').'/web/uploads/'.$path);
   }
   
}
