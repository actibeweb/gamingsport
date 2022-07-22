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
                    echo $_SESSION['update'];
                    unset( $_SESSION['update']);
                }
                


    ?>


    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Sites </h1>



      
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-site_name" id="exampleModalLabel">Modal site_name</h5>
              <button type="buttonsite_imageclass="close" data-dismiss="modal" ariasite_imagelabel="Close">
                <span aria-hidden="true">&site_agent;</span>
              site_agentbutton>
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

       <!-- Add cp's Site -->
      <a href="add-site.php" class="btn btn-primary" >Add Site </a>



      <!-- Member Table-------------  -->
      
      <table id="basic-data-table" class="table nowrap" style="width:100%">
        <thead>
          <tr>
            <th>Site Image</th>
            <th>Site Name</th>
            <th>Site Agent</th>
            <th>Site Amount</th>
            <th>Site Description</th>
            <th>Upload</th>
            <th>Delete</th>
          </tr>
        </thead>

        <tbody>

          <?php
                    $sql= "SELECT *  FROM  tbl_sites ";
                    $res = mysqli_query($conn,$sql);

                    if($res==TRUE){

                        $count=mysqli_num_rows($res);
                        $sn=1;

                        if($count>0){
                            while($rows=mysqli_fetch_assoc($res)){
                                $id=$rows['id'];
                                $site_name=$rows['site_name'];
                                $site_agent=$rows['site_agent'];
                                $site_image=$rows['site_image'];
                                $site_amount=$rows['site_amount'];
                                $site_description=$rows['site_description'];

                                ?>

                        
                            <tr>
                                <td><?php
                                if($site_image!=""){

                                    ?>
                                    <div class="imgTeam" style=" background: url('<?php echo SITEURL; ?>/assets/images/sites/<?php echo $site_image; ?>');background-size: contain;background-repeat: no-repeat;  ;"></div>
                                    <!-- <img src="<?php echo SITEURL; ?>/assets/images/team/<?php echo $site_image; ?>" width="100px" > -->
                                    <?php

                                }else{

                                   echo" image not added";

                                }
                                
                                ?></td>
                                <td><?php echo $site_name;?></td>
                                <td><?php echo $site_agent;?></td>
                                <td><?php echo $site_amount;?></td>
                                <td><?php echo $site_description;?></td>


                                <td><a href="<?php echo SITEURL;?>/cp/update-blog.php?id=<?php echo $id ?>" class="btnSecondary">Update Site</a></td>
                                <td><a href="<?php echo SITEURL;?>/cp/delete-site.php?id=<?php echo $id ?>&img=<?php echo $site_image ?>" class="btnSecondary">Delete Site</a></td>
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
<script src="../assets/js/cp.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>




  </body>


