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
            <h1 class="page-header"><?php if(isset($_REQUEST['id'])){ echo 'Edit'; }else{ echo 'Add'; } ?> Clothe </span></h1>
         </div>
      </div>

      <div class="row">
          <div class="col-lg-6">
            <form role="form" action="list.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name : </label>
                    <input class="form-control" type="text" placeholder="Enter Category" name="name" value="<?php echo $row['name'];?>" required>
                </div>
                <div class="form-group">
                    <label>Image : </label>
                    <?php
                      if($row['image'] != ''){
                        echo '<img src="images/'.$row['image'].'" width="125px"><style>.imagefile{margin-left:15%;}</style>';
                      }
                    ?>
                    <input type="hidden" name="oldimage" value="<?php echo $row['image'];?>">
                    <input class="imagefile"  type="file" name="image" >
                </div>
                <div class="form-group">
                    <label>Price : </label>
                    <input class="form-control" type="text" placeholder="Enter Price" name="price" value="<?php echo $row['price'];?>" required>
                </div>
                <div class="form-group">
                    <label>Size : </label>
                    <select name="size" class="form-control" required>
                        <option value="">Select Size</option>
                        <option value="S" <?php if($row['size'] == 'S'){ echo 'selected';}?>>S</option>
                        <option value="M" <?php if($row['size'] == 'M'){ echo 'selected';}?>>M</option>
                        <option value="L" <?php if($row['size'] == 'L'){ echo 'selected';}?>>L</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Color : </label>
                    <select name="color" class="form-control" required>
                        <option value="">Select Size</option>
                        <option value="Black" <?php if($row['color'] == 'Black'){ echo 'selected';}?>>Black</option>
                        <option value="Red" <?php if($row['color'] == 'Red'){ echo 'selected';}?>>Red</option>
                        <option value="Orange" <?php if($row['color'] == 'Orange'){ echo 'selected';}?>>Orange</option>
                        <option value="Blue" <?php if($row['color'] == 'Blue'){ echo 'selected';}?>>Blue</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Category : </label>
                    <select name="category" class="form-control" required>
                        <option value="">Select Category</option>
                        <?php
                          $sql = "SELECT *  FROM category order by id ASC";
                          $result = $con->query($sql);
                          if ($result->num_rows > 0) {
                            while($rows = $result->fetch_assoc()) {
                        ?>
                          <option value="<?php echo $rows['id'];?>" <?php if($rows['id'] == $row['cat_id']){ echo 'selected';}?>><?php echo $rows['name'];?></option>
                        <?php
                            }
                          }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Description : </label>
                    <textarea name="description" class="form-control" placeholder="Enter Description" required><?php echo $row['description'];?></textarea>
                </div>
                <input type="hidden" name="id" value="<?php if(isset($_REQUEST['id'])){ echo $_REQUEST['id']; }?>">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
      </div>

   </div>
   <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include_once('admin-footer.php');?>
