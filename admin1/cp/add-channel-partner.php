<?php
 include('partials/menu.php');
?>
 



    <?php 
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset( $_SESSION['add']);
        }
    ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      
      
      
      <h1 class="page-header">Add Channel Partner</h1>
      <form action="" method="POST">
          
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="cp_name">CP Name</label>
              <input type="text" name="cp_name" class="form-control" id="cp_name" placeholder="">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="cp_username">Username</label>
              <input type="text" name="cp_username" class="form-control" id="cp_username" placeholder="">
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="cp_password">Password</label>
              <input type="text" name="cp_password" class="form-control" id="cp_password" placeholder="">
            </div>
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>


    </div>
  </div>
</div>
<script src="../assets/js/admin.js"></script>

  </body>





<?php 


if(isset($_POST['submit']))
{

    $cp_name= $_POST["cp_name"] ;
    $cp_username= $_POST["cp_username"] ;
    $cp_password= md5($_POST["cp_password"]) ;

    $sql="INSERT INTO tbl_cp SET
         cp_name='$cp_name',
         cp_username='$cp_username',
         cp_password='$cp_password'
    ";


    $res= mysqli_query($conn,$sql) ;



    if($res==TRUE){

        $_SESSION['add']="true";
        echo("<script>location.href = '".SITEURL."/admin/channel-partner.php';</script>");

    }
    else{
        
        $_SESSION['add']="false";
        echo("<script>location.href = '".SITEURL."/admin/channel_partner.php';</script>");
    }

}
?>