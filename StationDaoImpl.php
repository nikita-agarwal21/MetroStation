<?php

   require_once 'Station.php';
   require_once 'StationDao.php';
   require_once 'DatabaseUtilities.php';

   class StationDaoImpl implements StationDao
   {
       public function getStationIds($station_name)
       {
        $conn = DatabaseUtilities::getConnection();
        $stationIds = array();
        $sql = "select * from stations where station_name = '$station_name' ";
        $statement = mysqli_query($conn,$sql);

        while ($row = mysqli_fetch_array($statement))
        {

                $station_id = new Station($row['station_id'],$row['station_name'],$row['line_id']);
                $stationIds[] = $station_id;
        }

        $statement->close();
        return $stationIds;
       }
   }
?>
