<?php  
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'obe';
  $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

  
  //vars ====
  $total_plo = '';
  $plo_number = '';
  $co1_percentage = '';
  $co2_percentage = '';
  $co3_percentage = '';
  $co4_percentage = '';
  $co5_percentage = '';
  $co6_percentage = '';
  $co7_percentage = '';
  $co8_percentage = '';
  $plo_number_chartOne = '';
  $student_id = $_POST["student_id"];

  echo $student_id;
  
  //PLO achievement One Start ------------->
  $sql = "SELECT SUM(`co-1_achieved_mark`+ `co-2_achieved_mark`+ `co-3_achieved_mark`+ `co-4_achieved_mark`+ `co-5_achieved_mark`+ `co-6_achieved_mark`+ `co-7_achieved_mark`+ `co-8_achieved_mark`) AS `total_plo`, `plo_number`, sum(`co-1_achieved_mark`) AS co1_total,sum(`co-2_achieved_mark`) AS co2_total,sum(`co-3_achieved_mark`) AS co3_total,sum(`co-4_achieved_mark`) AS co4_total,sum(`co-5_achieved_mark`) AS co5_total,sum(`co-6_achieved_mark`) AS co6_total,sum(`co-7_achieved_mark`) AS co7_total,sum(`co-8_achieved_mark`) AS co8_total FROM individual_co_plo_map where `student_id` = '$student_id' GROUP BY `plo_number`";

	$result = mysqli_query($mysqli, $sql);

  while ($row = mysqli_fetch_array($result)) {
    $plo_number_chartOne = $plo_number_chartOne . '"'. $row['plo_number'] .'",';
    $co1_percentage = $co1_percentage . '"'. $row['co1_total']*(100/$row['total_plo']) .'",';
    $co2_percentage = $co2_percentage . '"'. $row['co2_total']*(100/$row['total_plo']) .'",';
    $co3_percentage = $co3_percentage . '"'. $row['co3_total']*(100/$row['total_plo']) .'",';
    $co4_percentage = $co4_percentage . '"'. $row['co4_total']*(100/$row['total_plo']) .'",';
    $co5_percentage = $co5_percentage . '"'. $row['co5_total']*(100/$row['total_plo']) .'",';
    $co6_percentage = $co6_percentage . '"'. $row['co6_total']*(100/$row['total_plo']) .'",';
    $co7_percentage = $co7_percentage . '"'. $row['co7_total']*(100/$row['total_plo']) .'",';
    $co8_percentage = $co8_percentage . '"'. $row['co2_total']*(100/$row['total_plo']) .'",';
  }
  //PLO achievement One End ------------->

  //PLO achievement Two Start ------------->
  $sql = "SELECT SUM(`co-1_achieved_mark`+ `co-2_achieved_mark`+ `co-3_achieved_mark`+ `co-4_achieved_mark`+ `co-5_achieved_mark`+ `co-6_achieved_mark`+ `co-7_achieved_mark`+ `co-8_achieved_mark`) AS `total_plo`, `plo_number` FROM individual_co_plo_map where `student_id` = '$student_id' GROUP BY `plo_number`";

	$result = mysqli_query($mysqli, $sql);

  while ($row = mysqli_fetch_array($result)) {
    $total_plo = $total_plo . '"'. $row['total_plo'] .'",';
    $plo_number = $plo_number . '"'. $row['plo_number'] .'",';
  }
  echo $total_plo;
  //PLO achievement Two End ------------->

  //PLO achievement Three Start ------------->
  $sql = "SELECT `student`.`student_id`, `student`.`course_id`, `student`.`plo_number`, (`co-1_achieved_mark` + `co-2_achieved_mark` + `co-3_achieved_mark` + `co-4_achieved_mark` + `co-5_achieved_mark` + `co-6_achieved_mark` + `co-7_achieved_mark` + `co-8_achieved_mark`)AS `total_achieved_plo, `, (`course`.`co-1_alotted_mark` + `course`.`co-2_alotted_mark` + `course`.`co-3_alotted_mark` + `course`.`co-4_alotted_mark` + `course`.`co-5_alotted_mark` + `course`.`co-6_alotted_mark` + `course`.`co-7_alotted_mark` + `course`.`co-8_alotted_mark`)AS `total_alotted_plo` FROM `individual_co_plo_map` AS `student` INNER JOIN `course_co_plo_map_section_wise` AS `course` ON `student`.`course_id` = `course`.`course_id` AND `student`.`section` = `course`.`section` AND `student`.`semester` = `course`.`semester` AND `student`.`year` = `course`.`year` AND `student`.`plo_number` = `course`.`plo_number` WHERE student.student_id = 1 GROUP BY course_id, plo_number"
  
  //PLO achievement Three End ------------->
  


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
                        $sql = "SELECT `student`.`student_id`, `student`.`course_id`, `student`.`plo_number`, (`co-1_achieved_mark` + `co-2_achieved_mark` + `co-3_achieved_mark` + `co-4_achieved_mark` + `co-5_achieved_mark` + `co-6_achieved_mark` + `co-7_achieved_mark` + `co-8_achieved_mark`)AS `total_achieved_plo`, (`course`.`co-1_alotted_mark` + `course`.`co-2_alotted_mark` + `course`.`co-3_alotted_mark` + `course`.`co-4_alotted_mark` + `course`.`co-5_alotted_mark` + `course`.`co-6_alotted_mark` + `course`.`co-7_alotted_mark` + `course`.`co-8_alotted_mark`)AS `total_alotted_plo` FROM `individual_co_plo_map` AS `student` INNER JOIN `course_co_plo_map_section_wise` AS `course` ON `student`.`course_id` = `course`.`course_id` AND `student`.`section` = `course`.`section` AND `student`.`semester` = `course`.`semester` AND `student`.`year` = `course`.`year` AND `student`.`plo_number` = `course`.`plo_number` WHERE student.student_id = '$student_id' GROUP BY course_id, plo_number";
                        $result = mysqli_query($mysqli, $sql);

                        if ($result->num_rows > 0) {
                            echo "<table class='content-table'><thead><tr><th>Course ID</th><th>PLO Number</th><th>PLO Achieved(%)</th></tr></thead>";
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["course_id"]. "</td><td>" . $row["plo_number"]. "</td><td>" . $row["total_achieved_plo"]*100/$row["total_alotted_plo"]. "</td></tr>";
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

   

    <section class="chart">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">

            <h3></h3>

            <!---Intensity Chart-->
            <canvas
              id="ploAchievementOneChart"
              style="
                width: 80%;
                height: 30vh;
                background: rgb(243 243 243);
                border: 1px solid #555652;
                margin-top: 10px;
              "
            ></canvas>
          </div>
          <div class="col-md-6">

            <h3></h3>

            <!---Intensity Chart-->
            <canvas
              id="ploAchievementTwoChart"
              style="
                width: 80%;
                height: 30vh;
                background: rgb(243 243 243);
                border: 1px solid #555652;
                margin-top: 10px;
              "
            ></canvas>
          </div>
          
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
      <script>

        //Data for plo acheievement one
        ploAchievementOneData = {
          labels: [<?php echo $plo_number_chartOne ?>],
          datasets: [
            {
              label: "CO-1",
              data: [<?php echo $co1_percentage ?>],
              backgroundColor: "#caf270",
            },
            {
              label: "CO-2",
              data: [<?php echo $co2_percentage ?>],
              backgroundColor: "#000",
            },
            {
              label: "CO-3",
              data: [<?php echo $co3_percentage ?>],
              backgroundColor: "#caf270",
            },
            {
              label: "CO-4",
              data: [<?php echo $co4_percentage ?>],
              backgroundColor: "#000",
            },
            {
              label: "CO-5",
              data: [<?php echo $co5_percentage ?>],
              backgroundColor: "#caf270",
            },
            {
              label: "CO-6",
              data: [<?php echo $co6_percentage ?>],
              backgroundColor: "#000",
            },
            {
              label: "CO-7",
              data: [<?php echo $co7_percentage ?>],
              backgroundColor: "#caf270",
            },
            {
              label: "CO-8",
              data: [<?php echo $co8_percentage ?>],
              backgroundColor: "#000",
            }
          ],
        };

        //get plo acheievement one Chart
        Chart.defaults.global.defaultFontFamily = "monospace";
        var ploAchievementOneChart = document.getElementById("ploAchievementOneChart").getContext("2d");

        //generate plo acheievement one chart
        var generatePloAchievementOneChart = new Chart(ploAchievementOneChart, {
          type: "bar",
          data: ploAchievementOneData,
          options: {
            tooltips: {
                displayColors: true,
            },
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true,
                }]
            },
          }
        });


        //Data for plo acheievement two
        ploAchicevementTwoData = {
          labels: [<?php echo $plo_number ?>],
          datasets: [
            {
              label: "Total PLO",
              data: [<?php echo $total_plo ?>],
              backgroundColor: "#caf270",
            }
          ],
        };

        //get plo acheievement two Chart
        Chart.defaults.global.defaultFontFamily = "monospace";
        var ploAchievementTwoChart = document.getElementById("ploAchievementTwoChart").getContext("2d");

        //generate plo acheievement one chart
        var generatePloAchievementTwoChart = new Chart(ploAchievementTwoChart, {
          type: "bar",
          data: ploAchicevementTwoData,
        });
        
      </script>
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
