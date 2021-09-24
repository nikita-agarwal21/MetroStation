<?php

  class MetroLine
  {

     private $line_id;
     private $line_name;
     private $city_id;


     public function __construct($line_id,$line_name,$city_id)
     {

     $this->line_id = $line_id;
     $this->line_name=$line_name;
     $this->city_id=$city_id;
     }


     public function getLineId()
     {
        return $this->line_id;
     }
      public function setLineId($line_id)
     {
        $this->line_id= $line_id;
     }

     public function getLineName()
     {
        return $this->line_name;
     }
   public function setLineName($line_name)
     {
        $this->line_name= $line_name;
     }

     public function getCityId()
     {
        return $this->city_id;
     }

     public function setCityId($city_id)
     {
        $this->city_id= $city_id;
     }



  }



?>
