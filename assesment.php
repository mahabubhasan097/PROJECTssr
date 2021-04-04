<?php

//Database connection

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "obe";
	
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Create database --------------------------------------------------------
	$sql = "CREATE DATABASE IF NOT EXISTS obe";

	if (mysqli_query($conn, $sql)) {
	    echo "Database created successfully<br>";
	} else {
	    echo "Error creating database: " . mysqli_error($conn) . "<br>";
	}

	$dbname = 'obe';
	mysqli_select_db ( $conn , $dbname);

	if (!$conn) {
	  die("select SREDA connection failed: " . mysqli_connect_error());
  }
    
    //Submit button perform
    if (isset($_POST["submit-btn"])) {
        $semester = $_POST["semester"];
        $course = $_POST["course"];
        $section = $_POST["section"];
        $co = $_POST["co"];
        $assesment = $_POST["assesment"];
        $question_number = $_POST["question_number"];
        $mark = $_POST["mark"];
        $year = $_POST["year"];

        
        
        $queryOne = "INSERT INTO `comap` (`semester`,`course`,`section`,`year`,`co`,`assesment`,`question_number`,`mark`) VALUES ('$semester', '$course', '$section', '$year', '$co', '$assesment', '$question_number', '$mark')";
        
        if(mysqli_query($conn, $queryOne)){
          echo "<script>
          alert('success');
          </script>";
        } else{
          echo "ERROR: Could not able to insert $queryOne. " . mysqli_error($conn);
        }  

        if($course == 'cse-101') {
          echo $co;
          if($co == 1) {
            $queryTwo = "UPDATE `course_co_plo_map_section_wise` SET `co-1_alotted_mark` = `co-1_alotted_mark` + $mark WHERE (`year` = '$year' AND `section` = '$section' AND `semester` = '$semester' AND `course_id` = '$course') AND (`plo_number` = 1 OR `plo_number` = 2 OR `plo_number` = 3 OR `plo_number` = 12) ";  
          }
          if($co == 2) {
            $queryTwo = "UPDATE `course_co_plo_map_section_wise` SET `co-2_alotted_mark` = `co-2_alotted_mark` + $mark WHERE (`year` = '$year' AND `section` = '$section' AND `semester` = '$semester' AND `course_id` = '$course') AND  (`plo_number` = 1 OR `plo_number` = 3 OR `plo_number` = 5 OR `plo_number` = 7)";
            
          }
          if($co == 3) {
            $queryTwo = "UPDATE `course_co_plo_map_section_wise` SET `co-3_alotted_mark` = `co-3_alotted_mark` + '$mark' WHERE (`year` = '$year' AND `section` = '$section' AND `semester` = '$semester' AND `course_id` = '$course') (`plo_number` = 3 OR `plo_number` = 4 OR `plo_number` = 7)";
          }
          if($co == 4) {
            $queryTwo = "UPDATE `course_co_plo_map_section_wise` SET `co-4_alotted_mark` = `co-4_alotted_mark` + '$mark' WHERE (`year` = '$year' AND `section` = '$section' AND `semester` = '$semester' AND `course_id` = '$course') AND (`plo_number` = 2 OR `plo_number` = 3 OR `plo_number` = 4)";
          }
          if($co == 5) {
            $queryTwo = "UPDATE `course_co_plo_map_section_wise` SET `co-5_alotted_mark` = `co-5_alotted_mark` + '$mark' WHERE (`year` = '$year' AND `section` = '$section' AND `semester` = '$semester' AND `course_id` = '$course') AND (`plo_number` = 6 OR `plo_number` = 9 OR `plo_number` = 13)";
          }
          if($co == 6) {
            $queryTwo = "UPDATE `course_co_plo_map_section_wise` SET `co-6_alotted_mark` = `co-6_alotted_mark` + '$mark' WHERE (`year` = '$year' AND `section` = '$section' AND `semester` = '$semester' AND `course_id` = '$course') AND (`plo_number` = 2 OR `plo_number` = 3 OR `plo_number` = 5 OR `plo_number` = 6 OR `plo_number` = 13)";
          }
          
        }
        
        if($course == 'cse-303') {
          echo $co;
          if($co == 1) {
            $queryTwo = "UPDATE `course_co_plo_map_section_wise` SET `co-1_alotted_mark` = `co-1_alotted_mark` + $mark WHERE (`year` = '$year' AND `section` = '$section' AND `semester` = '$semester' AND `course_id` = '$course') AND (`plo_number` = 2 OR `plo_number` = 4 OR `plo_number` = 6 OR `plo_number` = 12 OR `plo_number` = 13) ";  
          }
          if($co == 2) {
            $queryTwo = "UPDATE `course_co_plo_map_section_wise` SET `co-2_alotted_mark` = `co-2_alotted_mark` + $mark WHERE (`year` = '$year' AND `section` = '$section' AND `semester` = '$semester' AND `course_id` = '$course') AND (`plo_number` = 1 OR `plo_number` = 2 OR `plo_number` = 3)";
            
          }
          if($co == 3) {
            $queryTwo = "UPDATE `course_co_plo_map_section_wise` SET `co-3_alotted_mark` = `co-3_alotted_mark` + '$mark' WHERE (`year` = '$year' AND `section` = '$section' AND `semester` = '$semester' AND `course_id` = '$course') AND (`plo_number` = 1 OR `plo_number` = 4 OR `plo_number` = 5 OR `plo_number` = 6 OR `plo_number` = 7)";
          }
        }  
        
        if($course == 'cse-211') {
          echo $co;
          if($co == 1) {
            $queryTwo = "UPDATE `course_co_plo_map_section_wise` SET `co-1_alotted_mark` = `co-1_alotted_mark` + $mark WHERE (`year` = '$year' AND `section` = '$section' AND `semester` = '$semester' AND `course_id` = '$course') AND (`plo_number` = 1 OR `plo_number` = 2 OR `plo_number` = 3 OR `plo_number` = 4 OR `plo_number` = 5 OR `plo_number` = 6 OR `plo_number` = 7 OR `plo_number` = 11 OR `plo_number` = 12 OR `plo_number` = 13) ";  
          }
          if($co == 2) {
            $queryTwo = "UPDATE `course_co_plo_map_section_wise` SET `co-2_alotted_mark` = `co-2_alotted_mark` + $mark WHERE (`year` = '$year' AND `section` = '$section' AND `semester` = '$semester' AND `course_id` = '$course') AND (`plo_number` = 1 OR `plo_number` = 3 OR `plo_number` = 5 OR `plo_number` = 6)";
            
          }
        }  
        
        if($course == 'cse-406') {
          echo $co;
          if($co == 1) {
            $queryTwo = "UPDATE `course_co_plo_map_section_wise` SET `co-1_alotted_mark` = `co-1_alotted_mark` + $mark WHERE (`year` = '$year' AND `section` = '$section' AND `semester` = '$semester' AND `course_id` = '$course') AND (`plo_number` = 1 OR `plo_number` = 2 OR `plo_number` = 3 OR `plo_number` = 4 OR `plo_number` = 5) ";  
          }
          if($co == 2) {
            $queryTwo = "UPDATE `course_co_plo_map_section_wise` SET `co-2_alotted_mark` = `co-2_alotted_mark` + $mark WHERE (`year` = '$year' AND `section` = '$section' AND `semester` = '$semester' AND `course_id` = '$course') AND (`plo_number` = 1 OR `plo_number` = 2 OR `plo_number` = 3 OR `plo_number` = 7 OR `plo_number` = 12)";
            
          }
          if($co == 3) {
            $queryTwo = "UPDATE `course_co_plo_map_section_wise` SET `co-3_alotted_mark` = `co-3_alotted_mark` + $mark WHERE (`year` = '$year' AND `section` = '$section' AND `semester` = '$semester' AND `course_id` = '$course') AND (`plo_number` = 1 OR `plo_number` = 5 OR `plo_number` = 6 OR `plo_number` = 8) ";  
          }
          if($co == 4) {
            $queryTwo = "UPDATE `course_co_plo_map_section_wise` SET `co-4_alotted_mark` = `co-4_alotted_mark` + $mark WHERE (`year` = '$year' AND `section` = '$section' AND `semester` = '$semester' AND `course_id` = '$course') AND (`plo_number` = 4 OR `plo_number` = 5 OR `plo_number` = 6 OR `plo_number` = 9 OR `plo_number` = 10 OR `plo_number` = 12 OR `plo_number` = 13)";
            
          }
        }  
        if(mysqli_query($conn, $queryTwo)){
          echo $queryTwo;
        } else{
          echo "ERROR: Could not able to insert $queryTwo. " . mysqli_error($conn);
        }  
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
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/dataEntry.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/coPloMapping.css" />
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

    <h1>Step 1</h1>
    <h3>Enter Course Information</h3>
    <form method="post">
      <label for="semesters">Choose a semester:</label>

      <select name="semester" id="semester">
        <option value="autumn">autumn</option>
        <option value="spring">spring</option>
        <option value="summer">summer</option>
      </select>
      
      <label for="years">Enter year:</label>
      <input type='number' name='year' placeholder='Year'/>

      <label for="courses">Choose a course:</label>

      <select name="course" id="course">
        <option value="cse-101">cse-101</option>
        <option value="cse-211">cse-211</option>
        <option value="cse-303">cse-303</option>
        <option value="cse-406">cse-406</option>
      </select>

      <label for="sections">Enter section:</label>
      <input type='number' name='section' placeholder='Section'/>

      <label for="assesment-type">Enter Assesment Type:</label>
      <select name="assesment" id="assesment-type">
        <option >Assignment</option>
        <option >Quiz</option>
        <option >Mid</option>
        <option >Final</option>
        <option >Project</option>
      </select>

      <label for="question-number">Enter Question number:</label>
      <input name="question_number" id="question-number" type='number'/>

      <label for="cos">Enter CO:</label>
      <select name="co" id="plos">
        <option >1</option>
        <option >2</option>
        <option >3</option>
        <option >4</option>
        <option >5</option>
        <option >6</option>
        <option >7</option>
        <option >8</option>
      </select>

      <label for="alloted-mark">Enter Alloted Mark:</label>
      <input name="mark" id="alloted-mark" type='number'/>

      <input name='submit-btn' class='submit' type='submit' value='Submit'/>

    </form>

    <!-- JS Lib File -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>

    <!-- Bootstrap JS File -->
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
      integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
      crossorigin="anonymous"
    ></script>

    <!-- Owl Carousel JS File -->
    <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>

    <!-- Theme JS File -->
    <script type="text/javascript" src="assets/js/contact-us.js"></script>
  </body>
</html>
