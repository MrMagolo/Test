<?php
namespace app\models;
use Yii;
use yii\base\Model;
class Contact extends \yii\db\ActiveRecord{
       /**
    * @inheritdoc
    */
   public static function tableName()
   {
       return 'contact';
   }
   /**
    * @inheritdoc
    */
   
   public function rules()
   {
       return [
           [['Email','FirstName','LastName','Country',
             'PhoneNumber','IdNumber','PostalAdress','PostalCode','City','Region','Country',
        ], 'required'],
        [['PhoneNumber'],'string', 'max' => 10],
           
       ];
   }
}