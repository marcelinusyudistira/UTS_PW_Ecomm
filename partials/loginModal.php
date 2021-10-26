<!-- Login Modal -->
<br><br>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="loginModal">Login Here</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/handleLogin.php" method="post">
          <div class="text-left my-2">
              <b><label for="username">Username</label></b>
              <input class="form-control" id="loginusername" name="loginusername" placeholder="Enter Your Username" type="text" required>
          </div>
          <div class="text-left my-2">
              <b><label for="password">Password</label></b>
              <input class="form-control" id="loginpassword" name="loginpassword" placeholder="Enter Your Password" type="password" required data-toggle="password">
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <p class="mb-0 mt-1">Tidak memiliki Akun? <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up Now</a>.</p>
      </div>
    </div>
  </div>
</div>