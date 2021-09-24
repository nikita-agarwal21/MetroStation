<?php

   require_once 'MetroLine.php';
   require_once 'MetroLineDao.php';
   require_once 'DatabaseUtilities.php';

   class MetroLineDaoImpl implements MetroLineDao
   {
       public function searchLine($city_id)
       {

          $conn=DatabaseUtilities::getConnection('metros');
        $metrolines = array();
        $sql = "select * from metrolines where city_id = '$city_id' ";


      
        $statement = mysqli_query($conn,$sql);

        while ($row = mysqli_fetch_array($statement))
        {

                $metroline = new MetroLine($row['line_id'],$row['line_name'],$row['city_id']);
                $metrolines[] = $metroline;
        }

        $statement->close();
        return $metolines;
       }
   }
?>
