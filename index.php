<?php include 'classes/action.php'; ?>
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="https://media.flaticon.com/img/favicon.ico">
		<link rel="shortcut icon" href="https://media.flaticon.com/img/favicon.ico">
		<title>Hello, world!</title>
	</head>
	<body>
		<div class="github" style="
    position: fixed;
    transform: rotate(-45deg);
    width: 151px;
    font-size: 20px;
    margin-top: 15px;
    margin-left: -40px;
"><a href="https://github.com/tarikmanoar/CRUD-usig-OOP-PHP" style="
    background: #000;
    display: block;
    padding: 5px;
    text-align: center;
"><i class="fa fa-code-fork" ></i>&nbsp;FORK</a></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="jumbotron text-uppercase text-center">
						<h1 class="display-1">Medicine Strore</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="card ">
						<div class="card-header text-white bg-success mb-3">Enter Medicine Details</div>
						<div class="card-body">
								<?php 
									if (isset($_GET['msg'])) {
										echo "<h1 class='text-success text-uppercase'>Medicine Store Successful!</h1>";
									}
									if (isset($_GET['umsg'])) {
										echo "<h1 class='text-success text-uppercase'>UPDATE Successful!</h1>";
									}
									if (isset($_GET['edit'])) {
										$id  = $_GET['id'] ?? NULL;
										$where = ['id' => $id];
										$row = $obj -> select_record("medicine",$where);?>

									<form action="classes/action.php" method="POST" accept-charset="utf-8">
										<table class="table table-hover">
											<a href="index.php" class="btn btn-info"><i class="fa fa-angle-double-left"></i></a>
											<tbody>
												<tr>
													<td><input type="hidden" class="form-control" name="id" value="<?php echo $id?>"></td>
												</tr>
												<tr>
													<td>Medicine Name</td>
													<td><input type="text" class="form-control" name="medicine" value="<?php echo $row['name'];?>" placeholder="Enter the medicine name" autocomplete="off"></td>
												</tr>
												<tr>
													<td>Medicine Quantity</td>
													<td><input type="number" class="form-control" name="qty" value="<?php echo $row['qty'];?>" placeholder="Enter the medicine quantity" autocomplete="off"></td>
												</tr>
												<tr>
													<td colspan="2" align="center"><input type="submit" class="btn btn-success col-2 form-control" name="update" value="Update"></td>
												</tr>
											</tbody>
										</table>
									</form>
										<?php
									}else {
										?>
									<form action="classes/action.php" method="POST" accept-charset="utf-8">
										<table class="table table-hover">
											<tbody>
												<tr>
													<td>Medicine Name</td>
													<td><input type="text" class="form-control" name="medicine" placeholder="Enter the medicine name" autocomplete="off"></td>
												</tr>
												<tr>
													<td>Medicine Quantity</td>
													<td><input type="number" class="form-control" name="qty" placeholder="Enter the medicine quantity" autocomplete="off"></td>
												</tr>
												<tr>
													<td colspan="2" align="center"><input type="submit" class="btn btn-primary col-2 form-control" name="submit" value="Store"></td>
												</tr>
											</tbody>
										</table>
									</form>
										<?php
									}
								?>
							
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-lg-8 offset-lg-2">
					<table class="table table-hover table-dark table-bordered">
						<thead>
							<tr class="text-center">
								<th>No</th>
								<th>Medicine Name</th>
								<th>Medicine Quantity</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$myrow = $obj->fetch_record("medicine");
								$c = "";
								foreach ($myrow as $row) {
									$c++;
									?>

							<tr>
								<td><?php echo $c;?></td>
								<td><?php echo $row['name'] ?></td>
								<td><?php echo $row['qty'] ?></td>
								<td class="text-center">
									<a href="?edit=1&id=<?php echo $row['id'] ?>" class="btn btn-info mb-2"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
									&nbsp;&nbsp;
									<a href="?delete=1&id=<?php echo $row['id'] ?>" class="btn btn-danger mt-0"><i class="fa fa-times" aria-hidden="true"></i></a></td>
							</tr>
									<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>