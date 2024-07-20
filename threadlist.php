<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>iDiscuss -Coding Forum</title>
    <style>
        .min-height{
            min-height: 40vh;
           
        }
    </style>
</head>

<body>

    <?php
    include 'partials/dbconnect.php';
  include 'partials/header.php';
  
  ?>
    <?php
   $id=$_GET['catid'];
      $sql ="SELECT * FROM `categories` WHERE category_id=$id";
      $result = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_assoc($result)){
        $catname =$row['category_name'];
        $catdesc =$row['category_description'];
      }
  ?>

    <?php
      $showAlert =false;
  $method =$_SERVER['REQUEST_METHOD'];
  if($method =='POST'){
    $th_title = $_POST['title'];
    $th_desc = $_POST['description'];
    //convert if user enter code in question
    $th_title = str_replace(">","&gt;",$th_title);
    $th_title = str_replace("<","&lt;",$th_title);

    $th_desc = str_replace("<","&lt;",$th_desc);
    $th_desc = str_replace(">","&gt;",$th_desc);

    $sno = $_POST['sno'];
  
    $sql ="INSERT INTO `thread` (`thread_id`,`thread_title`, `thread_description`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( NULL , '$th_title', '$th_desc', '$id', '$sno', current_timestamp() )";
    $result = mysqli_query($conn,$sql);
    $showAlert =true;
    if($showAlert){
      echo
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sucess!</strong> Your thread has been addded! Please wait for community to respond.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

  }
  ?>

    <!-- //container for jumbotron -->
    <div class="container  my-4  bg-secondary p-5" >
        <div class="jumbotron">
            <h1 class="display-4">
                Welcome to <?php echo $catname?>
            </h1>
            <p class="lead">
                <?php echo $catdesc?>
            </p>
            <hr class="my-4">
            <p class="fs-5">
                This peer to peer forum is for sharing knowledge with each other.Create unique posts.
                Keep posts courteous.
                Use respectful language when posting.
                Posting content from private messages and displaying that subject matter on the public forum is
                prohibited.
                Edit and delete posts as necessary using the tools provided by the forum.
            </p>
            <a href=""> </a>
            <a href="#" class="btn btn-primary btn-lg bg-success" role="button"> Learn more</a>
        </div>
    </div>

    <!-- //Get comment from user -->

    <?php
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
 {
  echo '<div class="container" >

<form action= "'.$_SERVER["REQUEST_URI"].'" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Problem Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Keep your title as short and crips crip as possible</div>
    </div>
    
    <input type="hidden" name="sno" value ="'.$_SESSION['sno'].'">

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Elaborate Your Problem</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-success mb-2">Submit</button>
    </form>

    </div>
    </div>';}
   
    else{
echo '
<div class="container">
<h3 class="py-2">Start a Discussion </h3>
<p class="lead">
You are not logged in ... please login to be able to start Discussion.
</p>
</div>';
    }
    ?>

    <!-- container for questions  -->
<div class="min-height"   >


    <div class="container mx-6" >
        <h1 class=" center" >Browse Questions</h1>

        <?php
      
      $id =$_GET['catid'];
      $sql ="SELECT * FROM `thread` WHERE thread_cat_id = $id";
 
    $result = mysqli_query($conn,$sql);
    $noResult =true ;
      while($row = mysqli_fetch_assoc($result)){
        $noResult =false ;
        $id =$row['thread_id'];
        $title =$row['thread_title'];
        $desc =$row['thread_description'];
        $thread_time=$row['timestamp'];
        $thread_user_id=$row['thread_user_id'];

        $sql2 ="SELECT user_email FROM `users` WHERE sno= '$thread_user_id'";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
        echo '
        <div class="question my-5">
        <div class="my-2 m">

            <div class="flex-shrink-0 d-flex">
                <img src="partials/img/userlogo.jpg" width="50px" height="50px" alt="...">
     
                <h5 class="mx-2 my-2" > <a href ="thread.php?threadid='.$id.'"class ="text-dark"> '.$title.' . </a></h5>     <div >
                <p class="font-weight-bold mx-5 my-2">'. $row2['user_email'].' at '.$thread_time.'</p>
    </div></div> 
            
                <div class="flex-grow-1  mt-2 fs-5"> 
                '.$desc.'
             </div>
           
        </div>
    </div> ';}

  if($noResult){
    echo'
    <h3 >No Thread</h3>
     <p><b>Be First person to ask question </b></p></div>
    ';
  } ?>
    </div></div>
 

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
<?php
  include 'partials/footer.php';
  ?>