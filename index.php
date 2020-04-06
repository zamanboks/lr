<?php
include 'inc/header.php';
include 'lib/User.php';
$user = new User();
 ?>
    <?php
 	$loginmsg = Session::get("loginmsg");
 	if (isset($loginmsg)) {
 		echo "$loginmsg";
 	}
  ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>User List <span class="pull-right"><strong>Welcome! </strong>
					<?php
						$name = Session::get("name");
						if (isset($name)) {
							echo $name ;
						}
					 ?>
				</span></h2>
            </div>

            <div class="panel-body">
                <table class="table table-striped">
                    <th width="20%">Serial</th>
                    <th width="20%">Name</th>
                    <th width="20%">Username</th>
                    <th width="20%">Email Address</th>
                    <th width="20%">Action</th>

                    <tr>
                        <th>01</th>
                        <th>Asraf Uzzaman</th>
                        <th>zmanboks</th>
                        <th>zamanboks@gmail.com</th>
                        <th>
                            <a class="btn btn-primary" href="profile.php?id=1">View</a>
                    </tr>

                    <tr>
                        <th>01</th>
                        <th>Asraf Uzzaman</th>
                        <th>zmanboks</th>
                        <th>zamanboks@gmail.com</th>
                        <th>
                            <a class="btn btn-primary" href="profile.php?id=1">View</a>
                    </tr>

                    <tr>
                        <th>01</th>
                        <th>Asraf Uzzaman</th>
                        <th>zmanboks</th>
                        <th>zamanboks@gmail.com</th>
                        <th>
                            <a class="btn btn-primary" href="profile.php?id=1">View</a>
                    </tr>

                </table>
            </div>

            <?php
include 'inc/footer.php';
 ?>
