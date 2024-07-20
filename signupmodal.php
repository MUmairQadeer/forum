

<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Signup </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
    <form action="/forum/partials/_handleSignup.php" method="post">
      <div class="modal-body">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">User name/Email</label>
    <input type="name" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="signupPassword" name="signupPassword">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"> Confirm Password</label>
    <input type="password" class="form-control" id="signupCpassword" name="signupCpassword">
  </div> 
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Signup</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div></form>
    </div>
  </div>
</div> 