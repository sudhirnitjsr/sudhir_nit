<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
// select logged in users detail
$res = $conn->query("SELECT * FROM users WHERE id=" . $_SESSION['user']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Hello,<?php echo $userRow['email']; ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/index.css" type="text/css"/>
</head>
<body>

<!-- Navigation Bar-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">RankWatch</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <span
                            class="glyphicon glyphicon-user"></span>&nbsp;Logged
                        in: <?php echo $userRow['email']; ?>
                        &nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>




<div class="container">
    <!-- Jumbotron-->
    <div class="jumbotron">
        <h1>Hello, <?php echo $userRow['name']; ?></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at auctor est, in convallis eros. Nulla
            facilisi. Donec ipsum nulla, hendrerit nec mauris vitae, lobortis egestas tortor. </p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h2>User Information</h2>
			<table class="table">
				<thead>
					<tr>
						<th>Full Name</th>
						<th>Email Id</th>
						<th>Mobile Number</th>
						<th>Address</th>
						<th>Country</th>
						<th>State</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $userRow['name'];?></td>
						<td><?php echo $userRow['email'];?></td>
						<td><?php echo $userRow['mobile'];?></td>
						<td><?php echo $userRow['address'];?></td>
						<td><?php echo $userRow['country'];?></td>
						<td><?php echo $userRow['state'];?></td>
					</tr>
				</tbody>
			</table>

        </div>


    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
