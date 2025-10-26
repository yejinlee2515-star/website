<html>
	<head>
		<title>Strongly Typed by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
<section id="header">
               <div class="container">
                  <div class="row">
                     <div class="col-12">
                                                  
                        <!-- Logo -->
                           <h1><a href="KNUhospital.php" id="logo"><span style="color:#ffffff">Korea Goverment</a></h1>

                        <!-- Nav -->

                     </div>
                  </div>
               </div>
            </section>

            <section id="features">
               <div class="container">
                  <div class="row">
                     <div class="col-12">
                                                  
                        <!-- Logo -->
                           <h1><a href="KNUhospital.php" id="logo"><span style="color:#ffffff">Korea Goverment</a></h1>

                        <!-- Nav -->
                            <nav id="nav">
                              <a href="">오늘 날짜 : <?php echo date("Y-m-d");?> </a>
                            </nav>
                     </div>
                  </div>
               </div>
            </section>
<section id="content">
               <div class="container">
                  <div class="row">
                     <div class="col-4 col-12-medium">
                     <div class="col-4 col-6-medium col-12-small">
<h1> 환자 등록 결과</h1>
<?php
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");

   $pname = $_POST["pname"];
   $pssn = $_POST["pssn"];
   $age = $_POST["age"];
   $tel = $_POST["tel"];
   $address = $_POST["address"];
   $gender = $_POST["gender"];   
   $hospitalizationDate = $_POST["hospitalizationDate"];
   $dischargeDate = $_POST["dischargeDate"];  
   $dateOfDeath = $_POST["dateOfDeath"]; 
   $covidInspectionDate = $_POST["covidInspectionDate"];  
   $hospitalName = $_POST["hospitalName"];  
   $diseaseName = $_POST["diseaseName"];  
   
   
   
   $sql =" INSERT INTO patient VALUES('".$pname."','".$pssn."','".$age."','".$tel."','".$address."','".$gender."','".$hospitalizationDate."','".$dischargeDate."','".$dateOfDeath."','".$covidInspectionDate."',1,'".$hospitalName."','".$diseaseName."')";
   
   $ret = mysqli_query($con, $sql);
 
    echo "<h1> ... </h1>";
   if($ret) {
	   echo "환자 등록이 완료되었습니다.";
   }
   else {
	   echo "환자 등록에 실패하였습니다."."<br>";
	   echo "실패 원인 :".mysqli_error($con);
   } 
   echo "<br> <a href='KNUhospital.php'><--초기 화면</a>";
   mysqli_close($con);
?>
</div>
                        
                     </div>
            
                     
                  </div>
               </div>
            </section>
		
</BODY>
<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
</HTML>