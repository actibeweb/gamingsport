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
      <h1 class="page-header">Career Application</h1>

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
            
            <th>First Name</th>
            <th>Last Name</th>
            <th>Department</th>
            <th>Qualification</th>
            <th>Pass-Out Year</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Delete</th>

      
          </tr>
        </thead>

        <tbody>

          <?php
                    $sql= "SELECT *  FROM  tbl_career";
                    $res = mysqli_query($conn,$sql);

                    if($res==TRUE){

                        $count=mysqli_num_rows($res);
                        $sn=1;

                        if($count>0){
                            while($rows=mysqli_fetch_assoc($res)){
                                $id=$rows['id'];
                                $first_name=$rows['first_name'];
                                $last_name=$rows['last_name'];
                                $passout_year=$rows['passout_year'];
                                $department=$rows['department'];
                                $email=$rows['email'];
                                $phone_number=$rows['phone_number'];
                                $qualification=$rows['qualification'];
                                ?>

                        
                            <tr>
                                
                                
                                
                                <td><?php echo $first_name;?></td>
                                <td><?php echo $last_name;?></td>
                                <td><?php echo $department;?></td>
                                <td><?php echo $qualification;?></td>
                                <td><?php echo $passout_year;?></td>
                                <td><?php echo $phone_number;?></td>
                                <td><?php echo $email;?></td>
                                <td><a href="<?php echo SITEURL;?>/admin/delete-career.php?id=<?php echo $id ?>&img=<?php echo $qualification ?>" class="btnSecondary">Delete </a></td>
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




      
      
      

    </div>
<script src="../assets/js/admin.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>




  </body>


