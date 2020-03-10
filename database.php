<?PHP
error_reporting(0);
$con = mysqli_connect("localhost:8080","root","","kidswear");
if (mysqli_connect_errno())
{
  echo "Failed to connect to database. Please check the database details";
  exit;
}
function get_category($id,$con){
  $query = "SELECT name FROM category where id = ".$id;
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);
  return $row['name'];
}
?>
