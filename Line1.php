<?php

  class Line1#purple
  {

     private $station_id;
     private $seq;


     public function __construct($station_id,$seq)
     {

     $this->station_id = $station_id;
     $this->seq=$seq;

     }


     public function getStationId()
     {
        return $this->station_id;
     }
      public function setStationId($station_id)
     {
        $this->station_id= $station_id;
     }

     public function getSeq()
     {
        return $this->seq;
     }
   public function setSeq($seq)
     {
        $this->seq= $seq;
     }



  }



?>
