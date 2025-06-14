<?php

require_once('../Database/dbconnection.php');
require_once('sidebar.php');

$sql = "SELECT * from doctors";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">


<!-- doctors-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Hyderabad - Hospital - Sindh</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/php5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="index.php" class="logo">
					<img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Hyderabad - Hospital</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown d-none d-sm-block">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                        <span>Admin</span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="profile.php">My Profile</a>
						<a class="dropdown-item" href="edit-profile.php">Edit Profile</a>
						<a class="dropdown-item" href="settings.php">Settings</a>
						<a class="dropdown-item" href="login.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.php">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.php">Edit Profile</a>
                    <a class="dropdown-item" href="settings.php">Settings</a>
                    <a class="dropdown-item" href="login.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Doctors</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-doctor.php" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Doctor</a>
                    </div>
                </div>
                <?php 
                 if(isset($_GET['message']))
                 {
                    ?>
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-success" role="alert">
                        <?=$_GET['message']?>
                    </div>
               
                    </div>
                </div>
                <?php
                
                 }
                ?>
                <?php

                if(isset($_GET['error']))
                 {
                    ?>
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-danger" role="alert">
                        <?=$_GET['error']?>
                    </div>
               
                    </div>
                </div>
                <?php
                
                 }
                ?>
				<div class="row doctor-grid">
                  

                    <?php

                    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // echo "<pre>";
        // print_r($row['id']);
        ?>

          <div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="profile.php"><img alt="" src="assets/img/doctor-thumb-07.jpg"></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="edit-doctor.php"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <!-- <a class="dropdown-item" href="./delete-doctor.php?id=<?=$row['id']?>"  ><i class="fa fa-trash-o m-r-5"></i> Delete</a> -->
                                    <a class="dropdown-item"  onclick="deleteDoctor(<?=$row['id'] ?>)"  data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                 </div>
                            </div>
                            <h4 class="doctor-name text-ellipsis"><a href="profile.php">  <?php echo $row["first_name"]?> </a></h4>
                            <div class="doc-prof"><?php echo $row["last_name"] ?></div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> <?php echo $row["country"]; echo ""; $row['city']; echo $row['state'];?>
                            </div>
                        </div>
                    </div>
        <?php
    }
} else {
    echo "0 results";
}


                    ?>
                  
                </div>
				<div class="row">
                    <div class="col-sm-12">
                        <div class="see-all">
                            <a class="see-all-btn" href="javascript:void(0);">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
		<div id="delete_doctor" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
                    <form action="./delete-doctor.php" method="POST">

                        <div class="modal-body text-center">
                            <img src="assets/img/sent.png" alt="" width="50" height="46">
                            <h3>Are you sure want to delete this Doctor?</h3>
                            <input type="hidden" name="doctor_id" id="doctor_id">
                            <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<button type="submit" class="btn btn-danger">Delete</button>
						</div>
                    </form>
					</div>
				</div>
			</div>
		</div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>

<script>
    function deleteDoctor(id)
    {
        document.getElementById("doctor_id").value=id
    }
</script>
</body>

</html>