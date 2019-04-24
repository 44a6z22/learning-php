<?php
	require('php/config.php');
	
	if(!isset($_SESSION['userLogin']))
		header('location: ./');
?>

<?php	require('php/view/assets/header.php'); ?>
    <title>Add a book</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

<body>
	<?php
		require("php/view/assets/navBar.php");
		require("php/view/assets/leftSideBar.php");
	?>
	<div class="container">
		<div class="row justify-content-center" style="margin-top : 100px;">
			<div class="col-md-6 ">
				<!--  -->
				<form action="php/controller/addBook.php" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<input type="text" name="bookTitle" class="form-control" placeholder="Book title" required>
					</div>

					<div class="form-group">
						<input type="text" name="pages" class="form-control" placeholder="how many Pages" required>
					</div>

					<div class="custom-file ">
						<input type="file" name="bookPhoto" class="custom-file-input">
						<label class="custom-file-label" for="inputGroupFile01">Profile picture</label>
					</div>

					<input type="submit" name="addBook" class="btn btn-primary btn-block" value="Register">
				</form>
				<!--  -->
			</div>
		</div>
	</div>
	<?php	require('php/view/assets/footer.php'); ?>
