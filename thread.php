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

    <?php  include 'partials/dbconnect.php';
  include 'partials/header.php';

  ?>
    <?php
   $id=$_GET['threadid'];
      $sql ="SELECT * FROM `thread` WHERE thread_id=$id";
      $result = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_assoc($result)){
        $title =$row['thread_title'];
        $desc =$row['thread_description'];
//to display name who ask question 
$thread_user_id =$row['thread_user_id'];
        $sql2 ="SELECT user_email FROM `users` WHERE sno= '$thread_user_id'";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by =$row2['user_email'];


      }
  ?>
    <?php
      $showAlert =false;
  $method =$_SERVER['REQUEST_METHOD'];
  if($method =='POST'){
    //INSERT INTO DB
    $comment = $_POST['comment'];
    $comment = str_replace("<","&lt;",$comment);
    $comment = str_replace(">","&gt;",$comment);
    $sno = $_POST['sno'];
  
    $sql ="INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment', '$id', '$sno', current_timestamp())";
    $result = mysqli_query($conn,$sql);
    $showAlert =true;
    if($showAlert){
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sucess!</strong> Your comment has been addded! .
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

  }
  ?>
    <!-- //container for jumbotron -->
    <div class="container my-4 bg-secondary p-5">
        <div class="jumbotron">
            <h1 class="display-4">
                <?php echo $title?>
            </h1>
            <p class="lead">
                <?php echo $desc?>
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
            <p class="text">Posted by<b> <?php echo $posted_by;?></b></p>
        </div>
    </div>
    <!-- container for questions  -->
    <?php
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
 {
  echo ' <div class="container">
  <form action="'. $_SERVER['REQUEST_URI'].'" method="post">
      <h1 class="py-2">Post a Comment</h1>
      <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Type your comment</label>
          <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
          <input type="hidden" name="sno" value ="'.$_SESSION['sno'].'">

      </div>
      <button type="submit" class="btn btn-success">Post Comment</button>
  </form>
</div>
</div>';}
    else{
echo '
<div class="container">
<h2 class="py-2">Post a Comment</h2>
<p class="lead">
You are not logged in ... please login to be able to post comment.
</p>
</div>';
    }
    ?>


<div class="min-height">

    <div class="container mx-6">
        <h1 class=" center">Discuss Questions</h1>

        <?php
           $id =$_GET['threadid'];
           $sql ="SELECT * FROM `comments` WHERE thread_id = $id";
           $noResult =true;

    $result = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_assoc($result)){
        $noResult =false ;
        $id =$row['comment_id'];
        $content =$row['comment_content'];
        $comment_time =$row['comment_time'];
//query to display name who commented
      $comment_by =$row['comment_by'];
        $sql2 ="SELECT user_email FROM `users` WHERE sno= '$comment_by'";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
      
        echo '
        <div class="question my-5">
        <div class="my-2 m">

            <div class="flex-shrink-0 d-flex">
                <img src="partials/img/userlogo.jpg" width="50px" height="50px" alt="...">
                <p class="font-weight-bold my-2 fs-4 mx-3">'.$row2['user_email'].' at '.$comment_time.'</p>
                 </div>
                <div class="flex-grow-1  fs-5 mt-2"> 
                '.$content .'
             </div>
        </div>
    </div>
    ';
  }
  if($noResult){
    echo"
    <h3>No Thread</h3>
     <p><b>Be First person to ask question </b></p>
    ";
  }
  ?>
    </div> </div>
    <?php
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