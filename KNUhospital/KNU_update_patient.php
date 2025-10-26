<HTML>
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
                              <a href="">오늘 날짜 : <?php echo date("Y-m-d");?> </a>
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
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
   $sql = "SELECT *FROM patient WHERE pssn='".$_GET['pssn']."'";
   error_reporting(E_ALL); ini_set("display_errors", 1);
   $ret = mysqli_query($con, $sql); 
   if($ret){
      $count=mysqli_num_rows($ret);
      if($count==0){
         echo $GET['pssn']."해당 환자 없음!!!"."<br>";
         echo "<br> <a href='YNUhospital.php'> <--초기화면</a>";
         exit();
      }
   }
   else{
      echo "데이터 조회 실패!!!"."<br>";
      echo "실패 원인 : ". mysqli_error($con);
      echo "<br> <a href='YNUhospital.php'> <--초기화면</a>";
      exit();
   }
   $row = mysqli_fetch_array($ret);
   $pname = $row["pname"];
   $pssn = $row["pssn"];
   $age = $row["age"];
   $tel = $row["tel"];
   $address = $row["address"];
   $gender = $row["gender"];   
   $hospitalizationDate = $row["hospitalizationDate"];
   $dischargeDate = $row["dischargeDate"];  
   $dateOfDeath = $row["dateOfDeath"]; 
   $covidInspectionDate = $row["covidInspectionDate"];  
   $diseaseName = $row["diseaseName"];    
   $hospitalName = $row["hospitalName"];   


?>


<h1> 환자 등록 </h1>
<FORM METHOD="post"  ACTION="YNU_update_patient_result.php">
   이름 : <INPUT TYPE ="text" NAME="pname" VALUE=<?php echo $pname ?>> <br>
   주민등록번호 : <INPUT TYPE ="text" NAME="pssn" VALUE=<?php echo $pssn ?>> <br> 
   나이 : <INPUT TYPE ="text" NAME="age" VALUE=<?php echo $age ?>> <br>
   전화번호 : <INPUT TYPE ="text" NAME="tel" VALUE=<?php echo $tel ?>> <br>
   주소 : <INPUT TYPE ="text" NAME="address" VALUE=<?php echo $address ?>> <br>
   성별 : <INPUT TYPE ="text" NAME="gender" VALUE=<?php echo $gender ?>> <br>
   입원일 : <INPUT TYPE ="text" NAME="hospitalizationDate" VALUE=<?php echo $hospitalizationDate ?>><br>
   퇴원일 : <INPUT TYPE ="text" NAME="dischargeDate" VALUE=<?php echo $dischargeDate ?>> <br>
   사망일 : <INPUT TYPE ="text" NAME="dateOfDeath" VALUE=<?php echo $dateOfDeath ?>> <br>
   확진날짜 : <INPUT TYPE ="text" NAME="covidInspectionDate" VALUE=<?php echo $covidInspectionDate ?>> <br>
   병명 : <INPUT TYPE ="text" NAME="diseaseName" VALUE=<?php echo $diseaseName ?>> <br>
   병원명 : <INPUT TYPE ="text" NAME="hospitalName" VALUE=<?php echo $hospitalName ?>> <br>
   <BR><BR>
   <INPUT TYPE="submit"  VALUE="정보수정">
</FORM>
</div>
                        
<script src="assets/js/jquery.min.js"></script>
         <script src="assets/js/jquery.dropotron.min.js"></script>
         <script src="assets/js/browser.min.js"></script>
         <script src="assets/js/breakpoints.min.js"></script>
         <script src="assets/js/util.js"></script>
         <script src="assets/js/main.js"></script>
         </body>
</HTML>