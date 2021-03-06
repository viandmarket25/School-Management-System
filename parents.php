<?php

session_start();

if($_SESSION['username']==true)
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    School Management System
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dash.php">
                        <i class="pe-7s-graph"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="students.php">
                        <i class="pe-7s-user"></i>
                        <p>Students</p>
                    </a>
                </li>
                <li class="active">
                    <a href="parents.php">
                        <i class="pe-7s-note2"></i>
                        <p>Parents</p>
                    </a>
                </li>
                <li>
                    <a href="teachers.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Teachers</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="dash.php">Home</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                    
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <h3>Parents:</h3>
                <a href="addparent.php">Add New Parent</a>
                
                <?php
                $con = mysqli_connect('localhost','root','','schoolmanagement');

$sql = "SELECT * from parent";

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
{

    ?>
    <table class="table">
       <thead>
         <tr>
           <th>Parent ID</th>
           <th>First Name</th>
           <th>Last Name</th>
           <th>Phone</th>
           <th>Profile</th>
           <th>Edit</th>
           <th>Delete</th>
         </tr>
       </thead>
       <tbody>

<?php
    while($row = $result->fetch_assoc())
    {
        
        echo "<tr>";
          echo "<td>".$row['parent_id']."</td>";
          echo "<td>" .$row['fname']."</td>";
          echo "<td>".$row['lname']."</td>";
          echo "<td>".$row['phone']."</td>";
          echo "<td><a href=parentprofile.php?id=".$row['parent_id'].">Check Profile</a></td>";
          echo "<td><a href='editparent.php?id=" . $row['parent_id']. "'>Edit<a/></td>";
          echo "<td><a href='deleteparent.php?id=" . $row['parent_id']. "'>Delete<a/></td>";
       echo "</tr>";
       


    }
    ?>
     </tbody>
   </table>
   <?php

}
?>
              
            </div>
        </div>
    </div>
</div>




    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>

<?php
}

else
{
header("location: signin.html");
}


?>
