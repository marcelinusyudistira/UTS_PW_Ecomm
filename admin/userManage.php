<div class="container-fluid" style="margin-top:98px">
	
	<div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary float-right btn-sm" data-bs-toggle="modal" data-bs-target="#newUser"><i class="fa fa-plus"></i> New user</button>
        </div>
	</div>
	    <br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12 text-center">
                    <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th>UserId</th>
                            <th style="width:7%">Photo</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone No.</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM users"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row=mysqli_fetch_assoc($result)) {
                                $Id = $row['id'];
                                $username = $row['username'];
                                $firstName = $row['firstName'];
                                $lastName = $row['lastName'];
                                $email = $row['email'];
                                $phone = $row['phone'];
                                $userType = $row['userType'];
                                if($userType == 0) 
                                    $userType = "user";
                                else
                                    $userType = "Admin";

                                echo '<tr>
                                    <td>' .$Id. '</td>
                                    <td><img src="/PW_UTS_Ecomm/img/person-' .$Id. '.jpg" alt="image for this user" onError="this.src =\'/PW_UTS_Ecomm/img/profilePic.jpg\'" width="100px" height="100px"></td>
                                    <td>' .$username. '</td>
                                    <td>
                                        <p>First Name : <b>' .$firstName. '</b></p>
                                        <p>Last Name : <b>' .$lastName. '</b></p>
                                    </td>
                                    <td>' .$email. '</td>
                                    <td>' .$phone. '</td>
                                    <td>' .$userType. '</td>
                                    <td class="text-center">
                                        <div class="container">
                                            <div class="row" style="width:80px; margin-left:1px; margin-right:-50px;">
                                                <div class="col-6">
                                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editUser' .$Id. '" type="button">Edit</button> </div>';
                                                if($Id == 1) {
                                                    echo '<div class="col-6">
                                                        <button class="btn btn-sm btn-danger" disabled style="margin-left:9px;">Delete</button>
                                                        </div>';
                                                }
                                                else {
                                                    echo '<div class="col-6">
                                                    <form action="partials/userManage.php" method="POST">
                                                            <button name="removeUser" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
                                                            <input type="hidden" name="Id" value="'.$Id. '">
                                                        </form></div>';
                                                }

                                    echo '  </div>
                                        </div>
                                    </td>
                                </tr>';
                            }
                        ?>
                    </tbody>
		        </table>
			</div>
		</div>
	</div>
</div>

<!-- newUser Modal -->
<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="newUser" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="newUser">Create New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/userManage.php" method="post">
              <div class="form-group">
                  <b><label for="username">Username</label></b>
                  <input class="form-control" id="username" name="username" placeholder="Choose a unique Username" type="text" required minlength="3" maxlength="11">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <b><label for="firstName">First Name:</label></b>
                  <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
                </div>
                <div class="form-group col-md-6">
                  <b><label for="lastName">Last name:</label></b>
                  <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name" required>
                </div>
              </div>
              <div class="form-group">
                  <b><label for="email">Email:</label></b>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
              </div>
              <div class="form-group row my-0">
                    <div class="form-group col-md-6 my-0">
                        <b><label for="phone">Phone No:</label></b>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon">+62</span>
                            </div>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Phone No" required pattern="[0-9]{10}" maxlength="10">
                        </div>
                    </div>
                    <div class="form-group col-md-6 my-0">
                        <b><label for="userType">Type:</label></b>
                        <select name="userType" id="userType" class="custom-select browser-default" required>
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                        </select>
                    </div>
              </div>
              <div class="form-group">
                  <b><label for="password">Password:</label></b>
                  <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password" required data-bs-toggle="password" minlength="4" maxlength="21">
              </div>
              <div class="form-group">
                  <b><label for="password1">Confirm Password:</label></b>
                  <input class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" type="password" required data-bs-toggle="password" minlength="4" maxlength="21">
              </div>
              <button type="submit" name="createUser" class="btn btn-success">Submit</button>
            </form>
      </div>
    </div>
  </div>
</div>

<?php 
    $usersql = "SELECT * FROM `users`";
    $userResult = mysqli_query($conn, $usersql);
    while($userRow = mysqli_fetch_assoc($userResult)){
        $Id = $userRow['id'];
        $name = $userRow['username'];
        $firstName = $userRow['firstName'];
        $lastName = $userRow['lastName'];
        $email = $userRow['email'];
        $phone = $userRow['phone'];
        $userType = $userRow['userType'];


?>
<!-- editUser Modal -->
<div class="modal fade" id="editUser<?php echo $Id; ?>" tabindex="-1" role="dialog" aria-labelledby="editUser<?php echo $Id; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="editUser<?php echo $Id; ?>">User Id: <b><?php echo $Id; ?></b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            
            <form action="partials/userManage.php" method="post">
                <div class="form-group">
                    <b><label for="username">Username</label></b>
                    <input class="form-control" id="username" name="username" value="<?php echo $name; ?>" type="text" disabled>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <b><label for="firstName">First Name:</label></b>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <b><label for="lastName">Last name:</label></b>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required>
                </div>
                </div>
                <div class="form-group">
                    <b><label for="email">Email:</label></b>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="form-group row my-0">
                    <div class="form-group col-md-6 my-0">
                        <b><label for="phone">Phone No:</label></b>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon">+62</span>
                            </div>
                            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" required pattern="[0-9]{10}" maxlength="10">
                        </div>
                    </div>
                    <div class="form-group col-md-6 my-0">
                        <b><label for="userType">Type:</label></b>
                        <select name="userType" id="userType" class="custom-select browser-default" required>
                        <?php 
                            if($userType == 1) {
                        ?>
                            <option value="0">User</option>
                            <option value="1" selected>Admin</option>
                        <?php
                            } 
                            else {
                        ?>
                            <option value="0" selected>User</option>
                            <option value="1">Admin</option>
                        <?php
                            } 
                        ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                <button type="submit" name="editUser" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
  </div>
</div>

<?php
    }
?>