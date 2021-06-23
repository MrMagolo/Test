<?php
namespace app\models;

use \yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'clients';
    }
    
    public function rules()
    {
        return [
            [['FirstName'], 'required'],
            [['LastName'], 'required'],
            [['IdNumber'], 'required'],
            [['Email'], 'required'],
            [['PhoneNumber'], 'required'],
            [['PostalAdress'], 'required'],
            [['PostalCode'], 'required'],
            [['City'], 'required'],
            [['Region'], 'required'],
            [['Country'], 'string', 'max' => 255]
        ];
    }
    
    public function getParcel()
    {
        return $this->hasOne(Parcel::className(), ['client_id' => 'id']);
    }
}