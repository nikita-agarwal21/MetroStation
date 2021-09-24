<?php
/*
require_once 'DatabaseUtilities.php';
require_once 'Line1Dao.php';
require_once 'Line1.php';

class Line1DaoImpl implements Line1Dao{

    public function getAmount($src_id,$dest_id){

        $amount = "";
        $conn = DatabaseUtilities::getConnection();

        if($src_id<$dest_id)
        {
            $sql = "select count(station_id) from line1 where station_id > ".$src_id." and station_id<=".$dest_id;
            $statement = mysqli_query($conn,$sql);

            while ($row = mysqli_fetch_array($statement))
            {
                $count = $row['count(station_id)'];
            }
        }
        else{
            $sql = "select count(station_id) from line1 where station_id > (select seq from line2 where station_id= $src_id) and station_id<=(select seq from line2 where station_id=$dest_id)";
        //  $sql = "select count(station_id) from line1 where station_id < (select seq from line2 where station_id= $src_id) and station_id>=(select seq from line2 where station_id=$dest_id)";

            $statement = mysqli_query($conn,$sql);

            while ($row = mysqli_fetch_array($statement))
            {
                    $count = $row['count(station_id)'];
            }

        }

        $statement->close();
        $conn->close();
echo var_dump($count);
        return $count;

    }

    public function calAmt($srcLineId,$destLineId)
    {
        if($srcLineId=='1' && $destLineId=='1')
        {
           $amtDao = new Line1DaoImpl();
           $amt = $amtDao->getAmount($_POST['source_id'],$_POST['dest_id']);
           $amt = $amt * 5;
           $_POST['result'] = $amt;
           echo var_dump($amt);

        }

        if($srcLineId=='2' && $destLineId=='2')
        {
           $amtDao = new Line2DaoImpl();
           $amt = $amtDao->getAmount($_POST['source_id'],$_POST['dest_id']);
           $amt = $amt * 5;
           $_POST['result'] = $amt;
           echo var_dump($amt);

        }

        if($srcLineId=='2' && $destLineId=='1')
        {
           $amtDao = new Line2DaoImpl();
           $crossingDao = new CrossingDaoImpl();
           $crossing = $crossingDao->searchCross();
           $amt = $amtDao->getAmount($_POST['source_id'],$crossing->getLine2());
           $amountDao=new Line1DaoImpl();
        //   $amount = $amountDao->getAmount($crossing->getLine1(),$_POST['dest_id']);
        $amount = $amountDao->getAmount($_POST['dest_id'],$crossing->getLine1());

           $totalamt = $amt + $amount;
           $totalamt = $totalamt*5;
           $_POST['result'] = $totalamt;
           echo var_dump($totalamt);
        }

       if($srcLineId=='1' && $destLineId=='2')
        {
           $amtDao = new Line1DaoImpl();
           $crossingDao = new CrossingDaoImpl();
           $crossing = $crossingDao->searchCross();
           $amt = $amtDao->getAmount($_POST['source_id'],$crossing->getLine1());
           echo var_dump($amt);
           $amountDao=new Line2DaoImpl();
         $amount = $amountDao->getAmount($_POST['dest_id'],$crossing->getLine2());
        //  $amount = $amountDao->getAmount($crossing->getLine2(),$_POST['dest_id']);
           $totalamt = $amt + $amount;
           echo var_dump($totalamt);
           $totalamt = $totalamt*5;
           $_POST['result'] = $totalamt;
           echo var_dump($totalamt);

        }
else
      //  if($srcLineId=='1' && $destLineId=='2')
        {
           $amtDao = new Line2DaoImpl();
           $crossingDao = new CrossingDaoImpl();
           $crossing = $crossingDao->searchCross();
           $amt = $amtDao->getAmount($_POST['source_id'],$crossing->getLine2());
           $amountDao=new Line1DaoImpl();
           $amount = $amountDao->getAmount($crossing->getLine1(),$_POST['dest_id']);
           $totalamt = $amt + $amount;
           $totalamt = $totalamt*5;
           $_POST['result'] = $totalamt;
           echo var_dump($totalamt);
        }

    }
}
*/


require_once 'DatabaseUtilities.php';
require_once 'Line1Dao.php';
require_once 'Line1.php';

class Line1DaoImpl implements Line1Dao{

    public function getAmount($src_id,$dest_id){

        $amount = "";
        $conn = DatabaseUtilities::getConnection();

        if($src_id<$dest_id)
        {
            $sql = "select count(station_id) from line1 where station_id > ".$src_id." and station_id< ".$dest_id;
            $statement = mysqli_query($conn,$sql);

            while ($row = mysqli_fetch_array($statement))
            {
                $count = $row['count(station_id)'];
            }
        }
        else{
          $sql = "select count(station_id) from line1 where station_id < ".$src_id." and station_id > ".$dest_id;

            //$sql = "select count(station_id) from line1 where station_id > (select seq from line2 where station_id= $src_id) and station_id<=(select seq from line2 where station_id=$dest_id)";
            $statement = mysqli_query($conn,$sql);

            while ($row = mysqli_fetch_array($statement))
            {
                    $count = $row['count(station_id)'];
            }

        }

        $statement->close();
        $conn->close();
echo var_dump('count='.$count);
        return $count;

    }

    public function calAmt($srcLineId,$destLineId)
    {
        if($srcLineId=='1' && $destLineId=='1')
        {
           $amtDao = new Line1DaoImpl();
           $amt = $amtDao->getAmount($_POST['source_id'],$_POST['dest_id']);
           $amt = $amt * 5;
           $_POST['result'] = $amt;
        }

        if($srcLineId=='2' && $destLineId=='2')
        {
           $amtDao = new Line2DaoImpl();
           $amt = $amtDao->getAmount($_POST['source_id'],$_POST['dest_id']);
           echo 'hii';
          echo var_dump($amt);
           $amt = $amt * 5;
           echo var_dump($amt);
           $_POST['result'] = $amt;
        }

        if($srcLineId=='2' && $destLineId=='1')
        {
           $amtDao = new Line2DaoImpl();
           $crossingDao = new CrossingDaoImpl();
           $crossing = $crossingDao->getCrossing();
           $amt = $amtDao->getAmount($_POST['source_id'],$crossing->getLine2());
           $amountDao=new Line1DaoImpl();
           $amount = $amountDao->getAmount($crossing->getLine1(),$_POST['dest_id']);
           $totalamt = $amt + $amount;
           $totalamt = $totalamt*5;
           $_POST['result'] = $totalamt;
        }

        if($srcLineId=='1' && $destLineId=='2')
        {
           $amtDao = new Line1DaoImpl();
           $crossingDao = new CrossingDaoImpl();
           $crossing = $crossingDao->getCrossing();
           echo var_dump($crossing);
           $amt = $amtDao->getAmount($_POST['source_id'],$crossing->getLine1());
           $amountDao=new Line2DaoImpl();
           $amount = $amountDao->getAmount($_POST['dest_id'],$crossing->getLine2());
           $totalamt = $amt + $amount;
           $totalamt = $totalamt*5;
           $_POST['result'] = $totalamt;
        }
    }
}

?>
