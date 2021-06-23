<?php
namespace app\models;
use Yii;
use yii\base\Model;
class Bank extends \yii\db\ActiveRecord{
       /**
    * @inheritdoc
    */
   public static function tableName()
   {
       return 'bank';
   }
   /**
    * @inheritdoc
    */
   
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['BankName','BankBranch','AccountName','AccountNumber'], 'required'],
            // email has to be a valid email address
           
        ];
    }
}
