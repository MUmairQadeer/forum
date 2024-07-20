<?php
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/forum">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top  Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
$sql ="SELECT category_name ,category_id from `categories` limit 3";
$result =mysqli_query($conn,$sql);
while($row =mysqli_fetch_assoc($result)){ 
          echo'<a class="dropdown-item" href="/forum/threadlist.php?catid='.$row['category_id'].'">
    '. $row['category_name'] .'</a>';
}
    echo' </ul>
        <li class="nav-item">
          <a class="nav-link " href="/forum/contact.php" tabindex="-1" >Contact us</a>
        </li>
     </ul>';

      echo'
      <div class="row mx-2 ">';

   
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']
==true){
  echo'
 <form class="d-flex " action ="/forum/search.php" method="get"  >
        <input class="form-control p-19 me-2" name ="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
<p class ="text-light mx-1 my-0 "> Welcome '.$_SESSION['useremail'].'<p>
<a href ="partials/_logout.php" class="btn btn-outline-success mx-2 my-0" >Logout<a></form>
';
}


else{   echo '
  <form class="d-flex " action ="/forum/search.php" method="get"  >
  <input class="form-control p-19 me-2" name ="search" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success" type="submit">Search</button>
        <button type="button" class="btn btn-outline-success mx-2"  data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button type="button" class="btn btn-outline-success mx-2"  data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button></form>
      '; 
    
}
     echo ' </div>
    </div>
    </div>
</nav>';


include 'partials/loginmodal.php';
include 'partials/signupmodal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You can login using credentials.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="namefalse"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Failure!</strong> User name/Email is Already in Use.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="passfalse"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Failure!</strong> Password and confirm password must be same.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}

?>