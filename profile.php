<?php 
include 'inc/header.php';
 ?>
		<div class="panel panel-default">
				<div class="panel-heading">
				<h2>User Profile  <span class="pull-right"><a class="btn btn-primary" href="index.php">Back</a></span></h2>
			</div>

			<div class="panel-body">

				<div style="max-width: 600px; margin: 0 auto">
				<form action="" method="POST">

					<div class="form-group">
						<label for="name">Your Name</label>
						<input type="text" name="name" id="name" class="form-control" value="Asraf Uzzaman">
					</div>

					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" class="form-control" value="zamanboks">
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" name="email" id="email" class="form-control" value="xzamanboks@gmail.com">
					</div>

					

					<button type="submit" name="update" class="btn btn-success">Update</button>

				</form>
				</div>
			</div>

<?php 
include 'inc/footer.php';
 ?>