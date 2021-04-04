<?php  

  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'obe';
  $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

  //vars ====


  //Card 1 ===================
  $sql = "SELECT COUNT(DISTINCT `course_id`) AS `totalCourse` FROM `course_co_plo_map_section_wise`";
  
  $result = mysqli_query($mysqli, $sql);
  while ($row = mysqli_fetch_array($result)) {
    $totalCourse = $row['totalCourse'];
  } 

  //Card 2 ===================
  $sql = "SELECT COUNT(DISTINCT `student_id`) AS `totalStudent` from `individual_co_plo_map`";

  $result = mysqli_query($mysqli, $sql);
  while ($row = mysqli_fetch_array($result)) {
    $totalStudent = $row['totalStudent'];
  } 

  //Card 3 ===================
  $sql = "SELECT COUNT(DISTINCT `faculty_id`) AS `total_faculty` from `studentcomap`";

  $result = mysqli_query($mysqli, $sql);
  while ($row = mysqli_fetch_array($result)) {
    $totalFaculty = $row['total_faculty'];
  }

  //Card 4 ===================
  $sql = "SELECT COUNT(DISTINCT `plo_number`) AS `totalPlo` from `course_co_plo_map_section_wise`";

  $result = mysqli_query($mysqli, $sql);
  while ($row = mysqli_fetch_array($result)) {
    $totalPlo = $row['totalPlo'];
  } 

?>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>| Home Page</title>

    <!-- Bootstrap CSS File -->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/bootstrap.min.css"
    />

    <!-- Font Awesome CSS File -->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/css/font-awesome.min.css"
    />

    <!-- Theme CSS File -->
    <link rel="stylesheet" type="text/css" href="assets/css/dashboard.css" />
  </head>
  <body>
    <!--  Section Start -->
    <header>
      <form method="post" action="logout.php">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <a href="#"
                ><img src="assets/img/logo.png"
              /></a>
            </div>
            <div class="col-md-4">
              <button class="log-out-btn" name="log-out-btn">Log out</button>
            </div>
          </div>
        </div>
      </form>
    </header>
    <!--  Section End -->

    <!-- Nav Section Start -->
    <nav class="navbar navbar-expand-lg navbar-dark">
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="navbar-toggler-icon"></span>
						  </button>
						  <div class="collapse navbar-collapse" id="navbarNavDropdown">
						    <ul class="navbar-nav ">
						      <li class="nav-item dropdown">
						        <a class="nav-link" href="dashboard.php">Dashboard<span class="sr-only">(current)</span></a>
						        
						      </li>
						      <li class="nav-item dropdown">
						        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          Data Entry
						        </a>
						        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="coPloMapping.php">PLO to CO Mapping</a>
                    <a class="dropdown-item" href="assesment.php">Assessment to Existing CO Mapping</a>
                    <a class="dropdown-item" href="studentAssesment.php">Marks Entry Form for Each Assessment</a>
						          
						      </li>
						      <li class="nav-item active">
						        <a class="nav-link" href="plo-achievement.php">PLO Achievement<span class="sr-only">(current)</span></a>
						      </li>
						      <li class="nav-item">
						        <a class="nav-link" href="studentProgressView.php">Student Progress View</a>
						      </li>
						      <li class="nav-item">
						        <a class="nav-link" href="courseProgress.php">Course Progress</a>
						      </li>
						    </ul>
						  </div>
						</nav>
    <!-- Nav Section End -->

    <!--  Section Start -->
    <section class="card-section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="dash-card">
              <h3>Total number of Courses: <?php echo $totalCourse ?></h3>
              <h3>AVG PLO Map: <?php echo $totalPrice ?></h3>
            </div>
          </div>
          <div class="col-md-3">
            <div class="dash-card">
              <h3>Total number of Student: <?php echo $totalStudent ?></h3>
              <h3>AVG PLO Achieved: <?php echo $nocPrice ?></h3>
            </div>
          </div>
          <div class="col-md-3">
            <div class="dash-card">
              <h3>Total number of Faculty: <?php echo $totalFaculty ?></h3>
              <h3>Practicing Smesters: <?php echo $pipelinePrice ?></h3>
            </div>
          </div>
          <div class="col-md-3">
            <div class="dash-card">
              <h3>Total number of PLO: <?php echo $totalPlo ?></h3>
              <h3>Total Number of Achieved PLO: <?php echo $techPrice ?></h3>
            </div>
          </div>
        </div>
    </section>
    <!--  Section End -->

    

    <!-- JS Lib File -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>

    <!-- Bootstrap JS File -->
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
      integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
      crossorigin="anonymous"
    ></script>

    <!-- Chart-js JS File -->

    <!-- Theme JS File -->
    <script type="text/javascript" src="assets/js/contact-us.js"></script>
  </body>
</html>
