
<?php
  class MetroHelper
  {
     private $source;
     private $dest;
     private $city;
     public function __construct()
     {
        if ( isset($_POST['city']))
           $this->city = $_POST['city'];
         if ( isset($_POST['source']))
            $this->source = $_POST['source'];
        if ( isset($_POST['dest']))
            $this->dest = $_POST['dest'];
     }
     public function isCitySelected($par)
     {
         if ( !$this->city )
             return '';
         if ( $this->city == $par )
             return 'Selected';
         else
             return '';
     }
     public function isSrcSelected($par)
     {
         if (!$this->source )
             return '';
         if ( $this->source == $par )
             return 'Selected';
         else
             return '';
     }

     public function isDestSelected($par)
     {
         if (!$this->dest)
             return '';
         if ( $this->dest == $par )
             return 'Selected';
         else
             return '';
     }
  }
?>
