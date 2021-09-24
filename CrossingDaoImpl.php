<?php

   require_once 'Crossing.php';
   require_once 'CrossingDao.php';
   require_once 'DatabaseUtilities.php';

   class CrossingDaoImpl implements CrossingDao
   {
       public function searchCross()
       {

          $conn=DatabaseUtilities::getConnection();
        $crossing= false;
        $sql = "select * from crossings  ";

        $statement = mysqli_query($conn,$sql);

        while ($row = mysqli_fetch_array($statement))
        {

                $crossing = new Crossing($row['cross_id'],$row['line_1'],$row['line_2']);

        }
echo var_dump($crossing);
        $statement->close();
        $conn->close();
        return $crossing;
       }
   }
?>
