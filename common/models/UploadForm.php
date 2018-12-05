<?php

namespace common\models;
 
use yii\base\Model;
use yii\web\UploadedFile;
use Yii;
use common\models\Photos;
use common\models\TasksPhotos;
 
class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
 
    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 10,'checkExtensionByMimeType'=>false],
        ];
    }
     
    public function upload($id)
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $file->name = Yii::$app->user->identity->username.rand().'_'.date('Y-m-d H-i-s').'.'.$file->extension;
           //var_dump($file->name);die;
       $file->saveAs(Yii::getAlias('@frontend/web/').'uploads/'.$file->name);
       $model = new Photos;
       $model->id_new = $id;
       $model->pic = $file->name;
       $model->save();
            }
            return true;
        } else {
            return false;
        }
    }
    
     public function uploadT($id)
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $file->name = Yii::$app->user->identity->username.rand().'_'.date('Y-m-d H-i-s').'.'.$file->extension;
           //var_dump($file->name);die;
       $file->saveAs(Yii::getAlias('@frontend/web/').'uploads/'.$file->name);
       $model = new TasksPhotos();
       $model->id_task = $id;
       $model->pic = $file->name;
       $model->save();
            }
            return true;
        } else {
            return false;
        }
    }
}