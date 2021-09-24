<?php

  class Crossing
  {

     private $cross_id;
     private $line_1;
     private $line_2;


     public function __construct($cross_id,$line_1,$line_2)
     {

     $this->cross_id = $cross_id;
     $this->line_1=$line_1;
     $this->line_2=$line_2;
     }


     public function getCrossId()
     {
        return $this->cross_id;
     }
      public function setCrossId($cross_id)
     {
        $this->cross_id= $cross_id;
     }

     public function getLine1()
     {
        return $this->line_1;
     }
   public function setLine1($line_1)
     {
        $this->line_1= $line_1;
     }

     public function getLine2()
     {
        return $this->line_2;
     }

     public function setLine2($line_2)
     {
        $this->line_2= $line_2;
     }



  }



?>
