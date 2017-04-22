<?php

namespace frontend\models;

use frontend\classes\Profile;
use yii\base\Model;

class ProfileModel extends Model
{

//    public function setCountry($userId, $countryId)
//    {
//        if (!$this->validate()) {
//            return false;
//        }
//        $profile = new Profile();
//        $profile->user_id = $userId;
//        $profile->country_id = $countryId;
//        return $profile->save();
//    }
//
//    public function setLastname($userId, $lastName)
//    {
//        if (!$this->validate()) {
//            return false;
//        }
//        $profile = new Profile();
//        $profile->user_id = $userId;
//        $profile->last_name = $lastName;
//        return $profile->save();
//    }
//
//    public function setFirstname($userId, $firstName)
//    {
//        if (!$this->validate()) {
//            return false;
//        }
//        $profile = new Profile();
//        $profile->user_id = $userId;
//        $profile->last_name = $firstName;
//        return $profile->save();
//    }

    public function setProfileField($fieldName, $fieldValue, $userId)
    {
        if (!$this->validate()) {
            return false;
        }
        $profile = new Profile();
        $profile->user_id = $userId;
        $profile->$fieldName = $fieldValue;
        return $profile->save();
    }
}