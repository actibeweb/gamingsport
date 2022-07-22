<?php
 include('partials/menu.php');
?>









<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      
      
      
      <h1 class="page-header content-title">Change Password</h1>
      <form astion="" method="POST">
          
       


        <div class="row">
          <div class="col-md-12">
            <div class="form-control">
              <label for="address" >Current Password</label>
              <input type="password" name="current_password" class="form-control" id="address" >
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-md-12">
            <div class="form-control">
              <label for="address">New Password</label>
              <input type="password" name="new_password" class="form-control" id="address" >
            </div>
          </div>
        </div>



        <div class="row">
          <div class="col-md-12">
            <div class="form-control">
              <label for="address">Confirm Password</label>
              <input type="password" name="confirm_password" class="form-control" id="address" >
            </div>
          </div>
        </div>




        <input type="hidden"  name="id" value="<?php  echo $id;?>" >
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>


    </div>
  </div>
</div>
<script src="../assets/js/admin.js"></script>

  </body>






<?php

if(isset($_POST['submit'])){
    $id= $_POST['id'];
    $current_password=md5($_POST['current_password']);
    $new_password=md5($_POST['new_password']);
    $confirm_password=md5($_POST['confirm_password']);




    $sql= "SELECT * FROM tbl_cp WHERE cp_id=$cp_id AND cp_password='$current_password' ";


    $res=mysqli_query($conn,$sql);

    if($res==true){

        $count=mysqli_num_rows($res);
        if($count==1){


            if($new_password==$confirm_password){

                $sql2="UPDATE tbl_cp SET 
                cp_password='$new_password'
                WHERE cp_id=$cp_id";

                $res2=mysqli_query($conn,$sql2);
                if($res2=TRUE){
                    $_SESSION['changed-password']="<h1 class='suc'>Password has been changed successfully!!</h1> ";
                    // header('location:'.SITEURL.'/cp/manage-cp.php');
                    echo("<script>location.href = '".SITEURL."/cp/profile.php';</script>");


                }else{

                    
                    $_SESSION['changed-password']="<h1 class='fail'>Password has not changed. Try later!!</h1>  ";
                    // header('location:'.SITEURL.'/cp/manage-cp.php');
                    echo("<script>location.href = '".SITEURL."/cp/profile.php';</script>");

                }


            }
            else{
                $_SESSION['pwd-not-match']="<h1 class='fail'>New and confirm password are not same!!</h1> ";
                // header('location:'.SITEURL.'/cp/manage-cp.php');
                echo("<script>location.href = '".SITEURL."/cp/profile.php';</script>");

            }




        }else{

            $_SESSION['user-not-found']="<h1 class='fail'>Sorry!! User not found with the same password...</h1> ";

            // header('location:'.SITEURL.'/cp/manage-cp.php');
            echo("<script>location.href = '".SITEURL."/cp/profile.php';</script>");

        }

    }



}


?>

<?php
 include('partials/footer.php');
?>