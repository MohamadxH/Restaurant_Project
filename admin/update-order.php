<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
    <h1>Update Order<h1>
    <br><br>

    <?php
    
    //check if id is set or not
    if(isset($_GET['id']))
        {
            //get the order details
            $id = $_GET['id'];
            //sql query to get order details
            $sql = "SELECT * FROM tbl_order,tbl_food where order_id=$id And tbl_order.food_id=tbl_food.id";
            //redirect query
            $res = mysqli_query($con,$sql);
            //count rows
            $count = mysqli_num_rows($res);
            
            if($count == 1)
            {
                //have data
                $row=mysqli_fetch_assoc($res);

                $food = $row['title'];
                $price = $row['price'];
                $qty = $row['qty'];
                $status = $row['status'];
                $total=$row['total'];


                
            }
            else
            {
                //dont have data
                //redirect to m-o-pg
          header('location:'.SiteUrl.'admin/manage-order.php');
            }
        }  
        else
        {
            //redirect to m-o-pg
    header('location:'.SiteUrl.'admin/manage-order.php');
        }
    
    ?>

    <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                    <td>Food Name</td>
                    <td><b><?php echo $food; ?></b></td>
            </tr>

            <tr>
            <td>Price</td>
                <td>
                <b>$<?php echo $price; ?></b>
                </td>
            </tr>

            <tr>
                    <td>Qty</td>
                    <td>
                        <input type="number" name="qty" value="<?php echo $qty; ?>">
                    </td>
            </tr>

            <tr>
            <td>Total</td>
                <td>
                <b>$<?php echo $total; ?></b>
                </td>
            </tr>
            

            <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Ordered"){echo "selected";} ?>value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){echo "selected";} ?>value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";} ?>value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?>value="Cancelled">Concelled</option>
                        </select>
                    </td>
            </tr>


          

           

            <tr>   
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="hidden" name="price" value="<?php echo $price;?>">
                        <input type="submit" name="submit" value="Update Oreder" class="btn-secondary">
                    </td>
            </tr>
        </table>
    </form>


    <?php
    
    //check if update btn is clicked
    if(isset($_POST['submit']))
    {
        //echo "test";
        //get all the data from form
        $id = $_POST['id'];
        $price = $_POST['price'];
        $quantity = $_POST['qty'];
        $total = $price * $quantity ;
        $status = $_POST['status'];
       
   
        //update the value
        $sql2 = "UPDATE tbl_order Set 
        qty = $quantity,
        total = $total,
        status = '$status'
        WHERE order_id = $id 
        ";

        $res2 = mysqli_query($con,$sql2);

       
        //check if query work and updated
        if($res2==true)
        {
            //updated
            $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
            header('location:'.SiteUrl.'admin/manage-order.php');
        }
        else
        {
            //failed updated
            $_SESSION['update'] = "<div class='error'>Failed to Update Order.</div>";
            header('location:'.SiteUrl.'admin/manage-order.php');
        }
       
    }
    
    ?>

    </div>
</div>


<?php include('partials/footer.php') ?>