<?php
 include('partials/menu.php');
?>

    <?php 
            if(isset($_SESSION['add'])){
                    // echo $_SESSION['add'];
                    unset( $_SESSION['add']);
                }

                if(isset($_SESSION['delete'])){
                    // echo $_SESSION['delete'];
                    unset( $_SESSION['delete']);
                }

                if(isset($_SESSION['update'])){
                    // echo $_SESSION['update'];
                    unset( $_SESSION['update']);
                }
                


    ?>


    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Channel Partners</h1>





      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success">Save</button>
            </div>
          </div>
        </div>
      </div>



      <!-- Member Table-------------  -->

      <table id="basic-data-table" class="table nowrap" style="width:100%">
        <thead>
          <tr>
            <th>CP Name</th>
            <th>Username</th>
            <th>Password</th>
            <th>Delete</th>

      
          </tr>
        </thead>

        <tbody>

          <?php
                    $sql= "SELECT *  FROM  tbl_cp";
                    $res = mysqli_query($conn,$sql);

                    if($res==TRUE){

                        $count=mysqli_num_rows($res);
                        $sn=1;

                        if($count>0){
                            while($rows=mysqli_fetch_assoc($res)){
                                $cp_id=$rows['cp_id'];
                                $cp_name=$rows['cp_name'];
                                $cp_username=$rows['cp_username'];
                                $cp_password=$rows['cp_password'];
                            ?>

                        
                            <tr>
                                <td><?php echo $cp_name;?></td>
                                <td><?php echo $cp_username;?></td>
                                <td><?php echo $cp_password;?></td>
                                <td><a href="<?php echo SITEURL;?>/admin/delete-team.php?id=<?php echo $id ?>&img=<?php echo $profile_pic ?>" class="btnSecondary">Delete Member</a></td>
                            </tr>




                                <?php
                            }


                        }
                        else{

                        }
                    }



                    ?>

   
        </tbody>
      </table>

            <!-- Button trigger modal -->
            <a href="add-channel-partner.php" class="btn btn-primary" >
        Add new Channel Partner
      </a>


      
      
      

    </div>
<script src="../assets/js/admin.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>




  </body>


