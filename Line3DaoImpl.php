<?php

require_once 'DatabaseUtilities.php';
require_once 'Line3Dao.php';
require_once 'Line3.php';

class Line3DaoImpl implements Line3Dao{

    public function getAmount($src_id,$dest_id){

        $amount = "";
        $conn = DatabaseUtilities::getConnection();

        if($src_id<$dest_id)
        {
            $sql = "select count(station_id) from line3 where station_id > ".$src_id." and station_id<=".$dest_id;
            $statement = mysqli_query($conn,$sql);

            while ($row = mysqli_fetch_array($statement))
            {
                $count = $row['count(station_id)'];
            }
        }
        else{
            $sql = "select count(station_id) from line3 where station_id > (select seq from line3 where station_id= $src_id) and station_id<=(select seq from line3 where station_id=$dest_id)";
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
           $amtDao = new Line3DaoImpl();
           $amt = $amtDao->getAmount($_POST['source_id'],$_POST['dest_id']);
           $amt = $amt * 5;
           $_POST['result'] = $amt;
           echo var_dump($amt);

        }

        if($srcLineId=='2' && $destLineId=='2')
        {
           $amtDao = new Line3DaoImpl();
           $amt = $amtDao->getAmount($_POST['source_id'],$_POST['dest_id']);
           $amt = $amt * 5;
           $_POST['result'] = $amt;
           echo var_dump($amt);

        }

        if($srcLineId=='2' && $destLineId=='1')
        {
           $amtDao = new Line3DaoImpl();
           $crossingDao = new CrossingDaoImpl();
           $crossing = $crossingDao->searchCross();
           $amt = $amtDao->getAmount($_POST['source_id'],$crossing->getLine2());
           $amountDao=new Line3DaoImpl();
           $amount = $amountDao->getAmount($crossing->getLine1(),$_POST['dest_id']);
           $totalamt = $amt + $amount;
           $totalamt = $totalamt*5;
           $_POST['result'] = $totalamt;
           echo var_dump($totalamt);
        }

        if($srcLineId=='1' && $destLineId=='2')
        {
           $amtDao = new Line3DaoImpl();
           $crossingDao = new CrossingDaoImpl();
           $crossing = $crossingDao->searchCross();
           $amt = $amtDao->getAmount($_POST['source_id'],$crossing->getLine1());
           $amountDao=new Line3DaoImpl();
           $amount = $amountDao->getAmount($_POST['dest_id'],$crossing->getLine2());
           $totalamt = $amt + $amount;
           $totalamt = $totalamt*5;
           $_POST['result'] = $totalamt;
           echo var_dump($totalamt);

        }
    }
}
?>
