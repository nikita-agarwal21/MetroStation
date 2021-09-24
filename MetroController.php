<?php
   require_once 'StationDaoImpl.php';
   require_once 'Line2DaoImpl.php';
   require_once 'Line1DaoImpl.php';
   require_once 'CrossingDaoImpl.php';

   $result = false;

if(isset($_POST['city']))
{
   $city = $_POST['city'];
}

echo var_dump($city);



   if(isset($_POST['source']))
   {
      $source = $_POST['source'];
   }

   $stationsDao = new StationDaoImpl();
   $s = $stationsDao->getStationIds($source);
   foreach($s as $station){
      $_POST['source_id'] = $station->getStationId();
      echo var_dump('src id='.$_POST['source_id']);
      $srcLineId = $station->getLineId();
      echo var_dump('src line='.$srcLineId);
   }

   if(isset($_POST['dest']))
   {
      $dest = $_POST['dest'];
   }

   $stationsDao = new StationDaoImpl();
   $d = $stationsDao->getStationIds($dest);
   foreach($d as $stationId){
      $_POST['dest_id'] = $stationId->getStationId();
      echo var_dump('dest id'.$_POST['dest_id']);

      $destLineId = $stationId->getLineId();
          echo var_dump('dest line='.$destLineId);
   }


   $amtDao = new Line1DaoImpl();
   $amt = $amtDao->calAmt($srcLineId,$destLineId);

   include 'MetroMVC.php';
?>
