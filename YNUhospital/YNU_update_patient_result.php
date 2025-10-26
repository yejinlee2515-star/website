<?php
   $dateString=date("Y-m-d");
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패!!");
   $tproduct = "SELECT *FROM patient WHERE pssn='".$_POST['pssn']."'";
   
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

   $sql2 = "UPDATE patient SET pname='$pname' WHERE pssn='".$_POST['pssn']."'";
   $sql3 = "UPDATE patient SET pssn='$pssn' WHERE pssn='".$_POST['pssn']."'";
   $sql4 = "UPDATE patient SET age='$age' WHERE pssn='".$_POST['pssn']."'";
   $sql5 = "UPDATE patient SET tel='$tel' WHERE pssn='".$_POST['pssn']."'";
   $sql6 = "UPDATE patient SET address='$address' WHERE pssn='".$_POST['pssn']."'";
   $sql7 = "UPDATE patient SET gender='$gender' WHERE pssn='".$_POST['pssn']."'";
   $sql8 = "UPDATE patient SET hospitalizationDate='$hospitalizationDate' WHERE pssn='".$_POST['pssn']."'";
   $sql9 = "UPDATE patient SET dischargeDate='$dischargeDate' WHERE pssn='".$_POST['pssn']."'";
   $sql10 = "UPDATE patient SET dateOfDeath='$dateOfDeath' WHERE pssn='".$_POST['pssn']."'";
   $sql11 = "UPDATE patient SET covidInspectionDate='$covidInspectionDate' WHERE pssn='".$_POST['pssn']."'";
   $sql13 = "UPDATE patient SET diseaseName='$diseaseName' WHERE pssn='".$_POST['pssn']."'";
   $sql14 = "UPDATE patient SET hospitalName='$hospitalName' WHERE pssn='".$_POST['pssn']."'";
   
   
   
   $ret2 = mysqli_query($con, $sql2);
   $ret3 = mysqli_query($con, $sql3);
   $ret4 = mysqli_query($con, $sql4);
   $ret5 = mysqli_query($con, $sql5);
   $ret6 = mysqli_query($con, $sql6);
   $ret7 = mysqli_query($con, $sql7);
   $ret8 = mysqli_query($con, $sql8);
   $ret9 = mysqli_query($con, $sql9);
   $ret10 = mysqli_query($con, $sql10);
   $ret11 = mysqli_query($con, $sql11);
   $ret13 = mysqli_query($con, $sql13);
   $ret14 = mysqli_query($con, $sql14);
   
  
?>
<html>
   <head> 
      <title>Halcyonic by HTML5 UP</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
      <link rel="stylesheet" href="assets/css/main.css" />
      <style>  
      body { background: #fff; }
      .bluetop {
      border-collapse: collapse;
      border-top: 3px solid #168;
      }  
      .bluetop th {
      color: #168;
      background: #f0f6f9;
      }
      .bluetop th, .bluetop td {
      padding: 10px;
      border: 1px solid #ddd;
      }
      .bluetop th:first-child, .bluetop td:first-child {
      border-left: 0;
      }
      .bluetop th:last-child, .bluetop td:last-child {
      border-right: 0;
      }
      </style>
   </head>
   
   <body>
      <div id="page-wrapper">

         <!-- Header -->
            <section id="header">
               <div class="container">
                  <div class="row">
                     <div class="col-12">
                                                  
                        <!-- Logo -->
                           <h1><a href="YNUhospital.php" id="logo"><span style="color:#ffffff">YU Medical Center</a></h1>

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
                           <h1><a href="YNUhospital.php" id="logo"><span style="color:#ffffff">Korea Goverment</a></h1>

                        <!-- Nav -->
                            <nav id="nav">
                              <a href="">오늘 날짜 : <?php echo $dateString;?> </a>
                            </nav>
                     </div>
                  </div>
               </div>
            </section>

         <!-- Features -->
            <section id="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-6-medium col-12-small">

<?php

 echo "<h1>환자 정보 수정 결과</h1>";
    if($ret2 or $ret3 or $ret4 or $ret5 or $ret6 or $ret7 or $ret8 or $ret0 or $ret10 or $ret11 or $ret13 or $ret14){
      echo "<br>"."데이터가 성공적으로 수정됨.";
	}
   else{
      echo "데이터 수정 실패!"."<br>";
      echo "실패 원인:".mysqli_error($con);
   }
   mysqli_close($con);
   
   echo "<br> <a href='YNUhospital1_2.php'> <--되돌아가기</a>";
  ?>
  
  </div>

      <!-- Scripts -->
         <script src="assets/js/jquery.min.js"></script>
         <script src="assets/js/browser.min.js"></script>
         <script src="assets/js/breakpoints.min.js"></script>
         <script src="assets/js/util.js"></script>
         <script src="assets/js/main.js"></script>

   </body>
</html>