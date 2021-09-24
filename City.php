<?php

  class City
  {

     private $city_id;
     private $city_name;


     public function __construct($city_id,$city_name)
     {

     $this->city_id = $city_id;
     $this->city_name=$city_name;

     }


     public function getCityId()
     {
        return $this->city_id;
     }
      public function setCityId($city_id)
     {
        $this->city_id= $city_id;
     }

     public function getCityName()
     {
        return $this->city_name;
     }
   public function setCityName($city_name)
     {
        $this->city_name= $city_name;
     }



  }



?>
