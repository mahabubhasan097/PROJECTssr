<?php

//Database connection

$host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'obe';
  $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

    $semester;
    $course;
    $section;
    $year = '2021';
  
    
    //Submit button 1 perform
    if (isset($_POST["submit-btn"])) {
      
        $semester = $_POST["semester"];
        $course = $_POST["course"];
        $section = $_POST["section"];
        $year = $_POST["year"];
        $co = $_POST["co"];
        $plo = $_POST["plo"];
        
        $query = "INSERT INTO `coplomap` (`semester`,`course`,`section`,`year`,`co`,`plo`) VALUES ('$semester', '$course', '$section', '$year', '$co', '$plo')";
        if(mysqli_query($mysqli, $query)){
          echo "<script>
          alert('success');
          </script>";
        } else{
          echo "ERROR: Could not able to insert $query. " . mysqli_error($mysqli);
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
    <h3>Enter Course Information & CO-PLO Mapping</h3>
    <form method="post">
      <label for="semesters">Choose a semester:</label>

      <select name="semester" id="semester">
        <option value="autumn">autumn</option>
        <option value="winter">winter</option>
        <option value="summer">summer</option>
      </select>
      
      <label for="years">Enter year:</label>
      <input type='number' name='year' placeholder='Year'/>

      <label for="courses">Choose a course:</label>

      <select name="course" id="course">
        <option value="cse-303">cse-303</option>
        <option value="cse-201">cse-201</option>
        <option value="cse-212">cse-212</option>
      </select>

      <label for="sections">Enter section:</label>
      <input type='number' name='section' placeholder='Section'/>

      <label for="plos">Enter PLO:</label>
      <select name="plo" id="plo">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <optio>10</option>
        <option>11</option>
        <option>12</option>
      </select>

      <label for="cos">Enter CO:</label>
      <select name="co" id="co">
        <option >1</option>
        <option >2</option>
        <option >3</option>
        <option >4</option>
        <option >5</option>
        <option >6</option>
        <option >7</option>
      </select>

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
