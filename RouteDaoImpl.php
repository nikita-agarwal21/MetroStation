<?php

   require_once 'Route.php';
   require_once 'RouteDao.php';
   require_once 'DatabaseUtilities.php';

   class RouteDaoImpl implements RouteDao
   {
       public function searchSource($src_id)
       {

        $conn=DatabaseUtilities::getConnection('metros');
        $srcs = array();
        $sql = "select * from routes where src_id= '$src_id' ";

        echo $sql;
        $statement = mysqli_query($conn,$sql);

        while ($row = mysqli_fetch_array($statement))
        {

                $src = new Route($row['route_id'],$row['src_id'],$row['dest_id']);
                $srcs[] = $src;
        }

        $statement->close();
        return $srcs;
       }

       public function searchDestination($dest_id)
       {
        $conn=DatabaseUtilities::getConnection('metros');
        $dests = array();
        $sql = "select * from routes where src_id= '$src_id' ";

        echo $sql;
        $statement = mysqli_query($conn,$sql);

        while ($row = mysqli_fetch_array($statement))
        {

                $dest = new Route($row['route_id'],$row['src_id'],$row['dest_id']);
                $dests[] = $dest;
        }

        $statement->close();
        return $dests;
       }

   }
?>
