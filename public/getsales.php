<?php
  $driver = trim($_GET['driver']);
  $busnum = trim($_GET['busnum']);
  $fr = trim($_GET['fr']);
  $to = trim($_GET['to']);

  ?>
  <table align="center" class="table table-striped">
    <thead>
      <th width="25%">Date and Time</th>
      <th width="25%">Bus Number</th>
      <th width="25%">Driver</th>
      <th width="25%">Sales</th>
    </thead>

    <?php
      if($driver == "none")
        $driver = "%";
      if($busnum == "none")
        $busnum = "%";
      if($fr == "none")
        $fr = "0000-00-00";
      if($to == "none")
        $to = date("Y-m-d");

      $connection = mysqli_connect('localhost', 'root', '','bustapdb');
      $seldriver = "SELECT bus_driver.bus_fullname,DATE(sales_tbl.sales_date) dates,sales_tbl.* 
                      FROM `bus_driver` 
                      INNER JOIN `sales_tbl` 
                      ON bus_driver.bus_account like '$driver' 
                          AND sales_tbl.sales_busno like '$busnum' 
                          AND DATE(sales_tbl.sales_date) between '$fr' and '$to'";
                          // echo $seldriver;
      $resdriver = mysqli_query($connection, $seldriver);
        if($resdriver) {
          if(mysqli_num_rows($resdriver) > 0) {
            while($row = mysqli_fetch_assoc($resdriver)){


    ?>

    <tr>
      <td><?php echo $row['dates']; ?> </td>
      <td><?php echo $row['sales_busno']; ?></td>
      <td><?php echo $row['bus_fullname']; ?></td>
      <td><?php echo $row['sales_sales']; ?></td>
    </tr>

    <?php
          }
        }
      }
    ?>
  </table>