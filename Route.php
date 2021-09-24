<?php

  class Route
  {

     private $route_id;
     private $source_id;
     private $dest_id;


     public function __construct($route_id,$source_id,$dest_id)
     {

     $this->route_id = $route_id;
     $this->source_id=$source_id;
     $this->dest_id=$dest_id;
     }


     public function getRouteId()
     {
        return $this->route_id;
     }
      public function setRouteId($route_id)
     {
        $this->route_id= $route_id;
     }

     public function getSourceId()
     {
        return $this->source_id;
     }
   public function setSourceId($source_id)
     {
        $this->source_id= $source_id;
     }

     public function getDestId()
     {
        return $this->dest_id;
     }

     public function setDestId($dest_id)
     {
        $this->dest_id= $dest_id;
     }



  }



?>
