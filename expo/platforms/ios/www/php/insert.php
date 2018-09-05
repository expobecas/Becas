<?php
 include "db.php";
 if(isset($_POST['insert']))
 {
 $title=$_POST['title'];
 $duration=$_POST['duration'];
 $price=$_POST['price'];
 $q=mysqli_query($con,"INSERT INTO `course_details` (`title`,`duration`,`price`,`specialty`) VALUES ('$title','$duration','$price',`$specialty`)");
 if($q)
  echo "success";
 else
  echo "error";
 }
 ?>