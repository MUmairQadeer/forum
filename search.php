<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    .min-height{
        min-height: 90vh;
    }
</style>
    <title>iDiscuss -Coding Forum</title>
</head>

<body>

<?php

include 'partials/dbconnect.php';
  include 'partials/header.php';
?> 
<!-- Search here start from here -->
<div class=" min-height "> 
<div class="container  my-5 mx-5">
<h1 class ="" >Search Result for <em>"<?php echo $_GET['search'] ?>"</em></h1>

<?php
$noresult =true;
$query =$_GET['search'];
$sql ="SELECT * FROM `thread` where match(`thread_title` ,`thread_description`) against ('$query')";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
    $noresult =false;

  $title =$row['thread_title'];
  $desc =$row['thread_description'];
 $thread_id =$row['thread_id'];
 $url ="thread.php?threadid=$thread_id ";
  echo '  <div class="result ">

  <h3>  <a href="'.$url.'" class="text-dark">'.$title.' </a></h3>
  <p class="fs-3"> '.$desc.'</p>
</div>
';
}
if($noresult){
    echo '<h3>No Result Found</h3>
    <p class="lead"><b> Suggestions:
<ul>
    <li>Make sure that all words are spelled correctly.</li>
    <li>Try different keywords.</li>
    <li>Try more general keywords. </li></b></ul></p>';
}
?>
</div>
</div>
  


        <?php
  // ini_set('display_errors', 1);
  // error_reporting(E_ALL);
  include 'partials/footer.php';
  ?>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>