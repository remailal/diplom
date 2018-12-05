<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends \yii\db\ActiveRecord
{
   


    public static function tableName()
    {
        return 'tasks';
    }
    
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'phone', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            [['body'], 'filter', 'filter' => function ($value) {
            
		    $value = str_replace('<', '', $value);
      $value = str_replace('>', '', $value);
      $value = str_replace('/', '', $value); 
       return $value;
		}
                
                ],
             [['name'], 'filter', 'filter' => function ($value) {
            
		    $value = str_replace('<', '', $value);
      $value = str_replace('>', '', $value);
      $value = str_replace('/', '', $value); 
       return $value;
		}
                
                ],
                        
                [['phone'], 'filter', 'filter' => function ($value) {
            
		    $value = str_replace('<', '', $value);
      $value = str_replace('>', '', $value);
      $value = str_replace('/', '', $value); 
       return $value;
		}
                
                ],
                [['email'], 'filter', 'filter' => function ($value) {
            
		    $value = str_replace('<', '', $value);
      $value = str_replace('>', '', $value);
      $value = str_replace('/', '', $value); 
       return $value;
		}
                
                ],
        ];
    }
    
     public function fillPoles($post)
     {
         $this->id_user = Yii::$app->user->identity->id;
         $this->name = $post['ContactForm']['name'];
            $this->phone = $post['ContactForm']['phone'];
            $this->email = $post['ContactForm']['email'];
            $this->body = $post['ContactForm']['body'];
     }

    
}
