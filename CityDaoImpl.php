<?php

   require_once 'City.php';
   require_once 'CityDao.php';
   require_once 'DatabaseUtilities.php';

   class CityDaoImpl implements CityDao
   {
       public function searchCity($name)
       {

          $conn=DatabaseUtilities::getConnection();
        $city= false;
        $sql = "select * from cities where city_name= '$name'";
        echo $sql;
        $statement = mysqli_query($conn,$sql);

        while ($row = mysqli_fetch_array($statement))
        {

                $city = new City($row['city_id'],$row['city_name']);

        }

        $statement->close();
        $conn->close();
        return $city;
       }
   }
?>
