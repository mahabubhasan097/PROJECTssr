<?php  
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'obe';
  $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

  
  //vars ====
  $total_student = '';
  
  $sql = "SELECT COUNT(DISTINCT student_id) AS `total_student` FROM individual_co_plo_map WHERE course_id = 'cse-303'";

  $result = mysqli_query($mysqli, $sql);

  while ($row = mysqli_fetch_array($result)) {
    $total_student = $row['total_student'];
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
    <link rel="stylesheet" type="text/css" href="assets/css/plo-achievement.css" />
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


    <section class='table-section'>
        <div class='container'>
            <div class="row">
                <div class="table col-md-12">       
                <form action='plo-achievement.php' method="post">
                  <input type="text" name='student_id'>
                  <input type="submit" value='enter'>
                </from>    
    <h5></h5>
                    <?php 
                        $sql = "SELECT count(`student`.`student_id`) AS `passed_students`, `student`.`plo_number` FROM `individual_co_plo_map` AS `student` INNER JOIN `course_co_plo_map_section_wise` AS `course` ON `student`.`course_id` = `course`.`course_id` AND `student`.`section` = `course`.`section` AND `student`.`semester` = `course`.`semester` AND `student`.`year` = `course`.`year` AND `student`.`plo_number` = `course`.`plo_number` WHERE `student`.course_id = 'cse-303' AND (`co-1_achieved_mark` + `co-2_achieved_mark` + `co-3_achieved_mark` + `co-4_achieved_mark` + `co-5_achieved_mark` + `co-6_achieved_mark` + `co-7_achieved_mark` + `co-8_achieved_mark`)*100/(`course`.`co-1_alotted_mark` + `course`.`co-2_alotted_mark` + `course`.`co-3_alotted_mark` + `course`.`co-4_alotted_mark` + `course`.`co-5_alotted_mark` + `course`.`co-6_alotted_mark` + `course`.`co-7_alotted_mark` + `course`.`co-8_alotted_mark`) > 4 GROUP BY `student`.`plo_number`";
                        $result = mysqli_query($mysqli, $sql);

                        if ($result->num_rows > 0) {
                            echo "<table class='content-table'><thead><tr><th>Total Student</th><th>PLO</th><th>Successfully Achieved</th><th>Successfully Achieved(%)</th><th>Failed to Achieve</th><th>Failed to Achieve (%)</th></tr></thead>";
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $total_student. "</td><td>" . $row["plo_number"]. "</td><td>" . $row["passed_students"]. "</td><td>" . $row["passed_students"]*100/$total_student. "</td><td>" . $total_student - $row["passed_students"]. "</td><td>" . ($total_student - $row["passed_students"])*100/$total_student. "</td></tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "0 results";
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

   

    

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
