<?php

  class Station
  {

     private $station_id;
     private $station_name;
     private $line_id;


     public function __construct($station_id,$station_name,$line_id)
     {

     $this->station_id = $station_id;
     $this->station_name=$station_name;
     $this->line_id=$line_id;
     }


     public function getStationId()
     {
        return $this->station_id;
     }
      public function setStationId($station_id)
     {
        $this->station_id= $station_id;
     }

     public function getStationName()
     {
        return $this->station_name;
     }
   public function setStationName($station_name)
     {
        $this->station_name= $station_name;
     }

     public function getLineId()
     {
        return $this->line_id;
     }

     public function setLineId($line_id)
     {
        $this->line_id= $line_id;
     }



  }



?>
