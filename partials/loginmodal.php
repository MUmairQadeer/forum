


<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
     <form action ="/forum/partials/_handleLogin.php" method ="POST" >
      <div class="modal-body">
   <div class="mb-3">
    <label for="loginEmail" class="form-label">User name/Email</label>
    <input type="name" class="form-control" id="loginEmail" name ="loginEmail" aria-describedby="emailHelp"> 
  </div> 
  <div class="mb-3">
    <label for="loginPass" class="form-label">Password</label>
    <input type="password" class="form-control" id="loginPass" name="loginPass">
  </div>
  

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Login</button>

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div></form>
    </div>
  </div>
</div>  