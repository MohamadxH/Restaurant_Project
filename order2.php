<?php include('partials-front/menu.php'); ?>
<link rel="stylesheet" type="text/css" href="css/admin.css">
<div class="main-content">
    <div class="wrapper">
    <h1>Your Order Table</h1>
 <br><br><br>
<?php
 if(isset($_SESSION['delete']))
            {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
            }

            
?>
  <table class="tbl-full">
      <tr>
          <th>S.N</th>
          <th>Food Name</th>
          <th>Price</th>
          <th>Qty.</th>
          <th>Total Price</th>
          <th>Order Date</th>
          <th>Status</th>
          
          <th>Address</th>
          <th>Action</th>
</tr>

        <?php
     $user =$_SESSION['user-access'];
     $user_id=$_SESSION['user_id'];
  
        //get all order from database
        $sql = "SELECT * FROM tbl_order,tbl_client,tbl_food where tbl_client.id=tbl_order.client_id And tbl_food.id=tbl_order.food_id And tbl_client.username='$user'
        ";

        //execute query
        $res = mysqli_query($con,$sql);

        //count the rows
        $count = mysqli_num_rows($res);

        $sn=1;

        if($count>0)
        {
          //order available
          while($row = mysqli_fetch_assoc($res))
          {
            //get all the order data
            $id = $row['order_id'];
            $client_id = $row['client_id'];
            $food_id = $row['food_id'];
            $qty = $row['qty'];
            $total = $row['total'];
            $order_date = $row['order_date'];
            $status = $row['status'];
            $food_name = $row['title'];
            $food_price = $row['price'];
            $address = $row['address'];
            
            ?>

            <tr>
              <td><?php echo $sn++;?></td>
              <td><?php echo $food_name;?></td>
              <td><?php echo "$".$food_price?></td>
              <td><?php echo $qty;?></td>
              <td><?php echo "$".$total;?></td>
              <td><?php echo $order_date;?></td>
              
              <td>
              <?php 
              
                if($status=="Ordered")
                {
                  echo "<label>$status</lable>";
                }
                elseif($status=="On Delivery")
                {
                  echo "<label style='color:orange;'>$status</lable>";
                }
                elseif($status=="Delivered")
                {
                  echo "<label style='color:#27ae60;'>$status</lable>";
                }
                elseif($status=="Cancelled")
                {
                  echo "<label style='color:red;'>$status</lable>";
                }
              
              ?>
              </td>

             
              <td><?php echo $address;?></td>
            
              <td>
<?php
                if($status=="Ordered"){
             echo"<a href='delete-userorder.php?id= $id' class='btn-danger'>Cancel Order</a>";
                }
           ?>
            </td>
          
          
               
         

            <?php
          }
        }
        else
        {
          //order not available
          echo "<tr><td colspan='12' class='error'>Order not Available</td></tr>";
        }
        
        ?>

      
  </table>
  
    <?php
    $sql5 = "SELECT SUM(total) AS 'Tsum' FROM tbl_order,tbl_client WHERE tbl_order.client_id=tbl_client.id and username='$user' and status='On Delivery'";
    
    $res5 =  mysqli_query($con,$sql5);
    
    $data = mysqli_fetch_assoc($res5);
       $t_sum=$data['Tsum'];


       $sql6 = "SELECT SUM(total) AS 'Tsum' FROM tbl_order,tbl_client WHERE tbl_order.client_id=tbl_client.id and username='$user' and status='Ordered'";
    
       $res6 =  mysqli_query($con,$sql6);
       
       $data1 = mysqli_fetch_assoc($res6);
          $t_sum1=$data1['Tsum'];

          $final1 = $t_sum +$t_sum1;
    ?>
     <div class="total">
     <p>Total : </p>
     <input type="text" name="full-total" value="<?php echo "$".(INT)$final1; ?>" readonly>
  </div>
</div>
</div>
<?php include('partials-front/footer.php'); ?>