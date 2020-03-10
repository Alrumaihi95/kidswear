<?php
  $solutionCLS = 'active';
  include_once('admin-header.php');
  if(isset($_REQUEST['id'])){
    $query = "SELECT * FROM `clothes` where id = ".$_REQUEST['id'];
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
  }
?>
<div id="page-wrapper">
   <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header"><?php echo $row['name']; ?></span></h1>
         </div>
      </div>

      <div class="row">
          <div class="col-lg-12">
          <?php
            if($_REQUEST['addtocart'] != ''){
              $key = 'usersitem'.$_SESSION['KSUSERID'];
              $itemids = $_SESSION[$key];
              if($itemids == ''){
                $itemids = array();
              }
              $newitem = $_REQUEST['addtocart'];
              if (!in_array($newitem, $itemids)) {
                array_push($itemids,$newitem);
              }
              $_SESSION[$key] = $itemids;              
              echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Prodcut Added to cart.</div>';
            }
          ?>
          </div>
          <div class="col-lg-6">
              <img style="width:100%;" src="images/<?php echo $row['image'];?>">
          </div>
          <div class="col-lg-6">
              <h3>$ <?php echo $row['price'];?></h3>
              <p><b>Size</b> <?php echo $row['size'];?></p>
              <p><b>Color</b> <?php echo $row['color'];?></p>
              <p><a href="?id=<?php echo $row['id'];?>&addtocart=<?php echo $row['id'];?>"><button class="btn btn-primary">Add To Cart</button></a></p>
              <p>
                <b>Description</b> <br><br>
                <?php echo $row['description'];?>
              </p>
          </div>
      </div>

   </div>
   <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include_once('admin-footer.php');?>
