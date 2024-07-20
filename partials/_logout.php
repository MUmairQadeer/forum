
<?php
session_start();

echo "Loging you out ...please wait...";
// echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
//   <strong>Failure!</strong> Password and confirm password must be same.
//   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
// </div>';
header("location :forum/index.php");
session_destroy();

?>