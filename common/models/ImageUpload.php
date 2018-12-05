<?php


namespace common\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model{
   public $image;
   
   public function rules(){
        return[
            [['image'], 'file', 'extensions' => 'png, jpg'],
            ['image', 'image', 'minWidth' => 250, 'maxWidth' => 3000,'minHeight' => 250, 'maxHeight' => 3000],
        ];
    }
    
   public function uploadFile(UploadedFile $file)
   {
       if($this->validate()){
           $file->name = Yii::$app->user->identity->username.'_'.date('Y-m-d H-i-s').'.'.$file->extension;
           //var_dump($file->name);die;
       $file->saveAs(Yii::getAlias('@frontend/web/').'uploads/'.$file->name);
       return $file->name;
       }else{
        return false;
    }
   }
   
   
}
