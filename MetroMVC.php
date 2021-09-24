

<html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

      <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!-- Required Core stylesheet -->
      <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.core.min.css">

      <!-- Optional Theme stylesheet -->
      <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.theme.min.css">

      <link rel="stylesheet" href="style.css">
      <script src="https://kit.fontawesome.com/87609a89cc.js" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-1.10.2.js">
    			</script>
          <script>
$(function(){
  $('#header').load('navigator.html');
});
</script>
<script>
$(function(){
$('#footer').load('footer.html');
});
</script>
</head>
<body >
<div id='header'></div>

    <?php
    require_once 'DatabaseUtilities.php';
    require_once 'MetroHelper.php';

    $metroHelper = new MetroHelper();
    $conn = DatabaseUtilities::getConnection();

    $result = false;
    if(isset($_POST['result']))
       $result = $_POST['result'];

    ?>



    <center>
      <div style="background-color:blue;border:10px solid black;color:white">
       <form name = "metroForm" method = "post" action = "MetroController.php" id='myform'>
       <br>
       <br>

              Choose city :
              <?php

               $sql1 = mysqli_query($conn, "SELECT `city_name` FROM `cities` ");?>
               <select name="city" id='cityid' onChange='this.form.submit();'>
               <?php while ($row = mysqli_fetch_array($sql1)) {
                   $display = $row['city_name'];?>
                   <option value = "<?php echo $display;?>" <?php echo $metroHelper->isCitySelected($display);?>><?php echo $display?></option>
               <?php }
               echo '</select>'
               ?>
       <br><br>



       Choose source :
       <?php

//select station_name from stations,cities,metrolines where stations.line_id=metrolines.line_id and metrolines.city_id=cities.city_id and city_name='bengaluru'
  //select station_name from stations where line_id=(select line_id from metrolines where city_id=(select city_id from cities where city_name='mumbai'))
  $sql1 = mysqli_query($conn, "select `station_name` from `stations`,`cities`,`metrolines` where stations.line_id=metrolines.line_id and metrolines.city_id=cities.city_id and city_name='$city'");?>
  <select name="source">
  <?php while ($row = mysqli_fetch_array($sql1)) {
      $display = $row['station_name'];?>
      <option value = "<?php echo $display;?>" <?php echo $metroHelper->isSrcSelected($display);?>><?php echo $display?></option>
  <?php }
  echo '</select>'



/*

//"select 'station_name' from 'stations' where 'line_id'= (select 'line_id' from 'metrolines' where 'city_id'= (select 'city_id' from 'cities' where 'city_name'=$city))")
        $sql1 = mysqli_query($conn, "SELECT `station_name` FROM `stations` order by line_id Desc  ");?>
        <select name="source">
        <?php while ($row = mysqli_fetch_array($sql1)) {
            $display = $row['station_name'];?>
            <option value = "<?php echo $display;?>" <?php echo $metroHelper->isSrcSelected($display);?>><?php echo $display?></option>
        <?php }
        echo '</select>'
*/
     ?>
<br><br>


         Choose destination :
         <?php
    /*
    //select station_name from stations where line_id=(select line_id from metrolines where city_id=(select city_id from cities where city_name='mumbai'))
    $sql1 = mysqli_query($conn, "select station_name from stations where line_id=(select line_id from metrolines where city_id=(select city_id from cities where city_name='$city'))  ");?>
    <select name="source">
    <?php while ($row = mysqli_fetch_array($sql1)) {
        $display = $row['station_name'];?>
        <option value = "<?php echo $display;?>" <?php echo $metroHelper->isSrcSelected($display);?>><?php echo $display?></option>
    <?php }
    echo '</select>'
*/

    //   $sql2 = mysqli_query($conn, "SELECT `station_name` FROM `stations` order by line_id ");
      $sql2 = mysqli_query($conn, "select `station_name` from `stations`,`cities`,`metrolines` where stations.line_id=metrolines.line_id and metrolines.city_id=cities.city_id and city_name='$city'");?>
        <select name="dest">
        <?php
        while ($row = mysqli_fetch_array($sql2)) {
            $display = $row['station_name']; ?>
            <option value = "<?php echo $display;?>" <?php echo $metroHelper->isDestSelected($display);?>><?php echo $display?></option>
        <?php }
        echo '</select>'
       ?>

       <br>
       <br>
       <input type = "submit" value = "Submit"/>
       <br>
       <br>

       <?php
           if(!empty($result))
           {
               echo "<h1> &#x20B9 ".$result."</h1>";
           }
           else {
             echo "<h1> no route </h1>";

           }
        ?>

        </form>
        </div>
        </center>
        <div id='footer'></div>
    </body>
</html>
