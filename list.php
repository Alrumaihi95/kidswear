<?php
  $dashboardCLS = 'active';
  include_once('admin-header.php');
  if($_POST){
    if($_POST['id'] != ''){
      $imagename = $_POST['oldimage'];
      if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
          $imagename = time().$_FILES['image']['name'];
          move_uploaded_file($_FILES['image']['tmp_name'], "images/" .$imagename );
      }
      $sql = " UPDATE clothes SET name = '".$_POST['name']."', image = '".$imagename."', price = '".$_POST['price']."', size = '".$_POST['size']."', color = '".$_POST['color']."', description = '".$_POST['description']."', cat_id = '".$_POST['category']."' WHERE id = ".$_POST['id'];
      if ($con->query($sql) === TRUE) {
          $message = 'Record Updated successfully!';
      } else {
          $message =  "Error: " . $sql . "<br>" . $con->error;
      }
    }else{
      $imagename = 'default.png';
      if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
          $imagename = time().$_FILES['image']['name'];
          move_uploaded_file($_FILES['image']['tmp_name'], "images/" .$imagename );
      }
      $sql = " INSERT INTO clothes (name, image, price, size, color, description, cat_id) VALUES ('".$_POST['name']."', '".$imagename."', '".$_POST['price']."', '".$_POST['size']."', '".$_POST['color']."', '".$_POST['description']."', '".$_POST['category']."')";

      if ($con->query($sql) === TRUE) {
          $message = 'Record Inserted successfully!';
      } else {
          $message =  "Error: " . $sql . "<br>" . $con->error;
      }
    }
  }
?>
<div id="page-wrapper">
   <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Lists <span style="float:right;font-size:20px;margin-top:22px;"><a href="list-edit.php"><i class="fa fa-plus"></i> Add Clothes</a></span></h1>
         </div>
      </div>

      <div class="row">
          <div class="col-lg-12">
            <?php
              if($message != ''){
                echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>'.$message.'.</div>';
              }
            ?>
              <div class="table-responsive">
                  <table id="table" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>#Id</th>
                              <th>Name</th>
                              <th>Image</th>
                              <th>Color</th>
                              <th>Price</th>
                              <th>Category</th>
                              <th style="width:12%;text-align:center;">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql = "SELECT *  FROM clothes order by ID ASC";
                        $result = $con->query($sql);
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                          ?>
                          <tr>
                              <td><?php echo $row['id'];?></td>
                              <td><?php echo $row['name'];?></td>
                              <td><img src="images/<?php echo $row['image'];?>" width="100" height="100"></td>
                              <td><?php echo $row['color'];?></td>
                              <td>$<?php echo $row['price'];?></td>
                              <td><?php echo get_category($row['cat_id'],$con);?></td>
                              <td><a href="view.php?id=<?php echo $row['id'];?>" title="View"><i class="fa fa-eye"></i></a><a href="list-edit.php?id=<?php echo $row['id'];?>" title="Edit"> <i class="fa fa-edit"></i></a><a href="delete.php?id=<?php echo $row['id'];?>" title="Delete"> <i class="fa fa-trash"></i></a></td>
                          </tr>
                          <?php
                          }
                        }
                        $con->close();
                        ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>

   </div>
   <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<script type="text/javascript">
  $(document).ready(function() {
      $('#table').DataTable();
  } );
</script>
<?php include_once('admin-footer.php');?>
