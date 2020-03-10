<?php
  include_once('admin-header.php');
  $key = 'usersitem'.$_SESSION['KSUSERID'];
  if($_REQUEST['id'] != ''){
    $itemids = $_SESSION[$key];
    $itemids = array_diff($itemids, array($_REQUEST['id']));
    $message = 'Item Removed Successfully!';
    $_SESSION[$key] = $itemids;
  }
?>
<div id="page-wrapper">
   <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Basket Items <span style="float:right;font-size:20px;margin-top:22px;"><a href="list-edit.php"><i class="fa fa-plus"></i> Add Clothes</a></span></h1>
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
                              <th>Name</th>
                              <th>Price</th>
                              <th style="width:12%;text-align:center;">Remove</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                        $itemids = $_SESSION[$key];
                        foreach ($itemids as $item) {
                          $query = "SELECT name,price FROM `clothes` where id = ".$item['id'];
                          $result = mysqli_query($con, $query);
                          $row = mysqli_fetch_assoc($result);
                        ?>
                          <tr>
                              <td><?php echo $row['name'];?></td>
                              <td>$<?php echo $row['price'];?></td>
                              <td style="text-align:center;"><a href="cart.php?id=<?php echo $item['id'];?>" title="Remove"><i class="fa fa-close"></i></a></td>
                          </tr>
                          <?php
                        }
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
