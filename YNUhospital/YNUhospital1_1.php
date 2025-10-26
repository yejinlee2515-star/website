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
      border: 1px solid #hospitalName;
      }
      .bluetop th:first-child, .bluetop td:first-child {
      border-left: 0;
      }
      .bluetop th:last-child, .bluetop td:last-child {
      border-right: 0;
      }
      </style>
   </head>

<BODY>

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
                           <h1><a href="YNUhospital.php" id="logo"><span style="color:#ffffff">YU Medical Center</a></h1>

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
                     <div class="col-6 col-6-medium col-12-small">
<h1> ▶환자 등록 </h1>
<?php

?>
<FORM METHOD="post"  ACTION="YNUhospital1_1_1.php">
   이름 : <INPUT TYPE ="text" NAME="pname"> <br>
   주민등록번호 : <INPUT TYPE ="text" NAME="pssn"> <br> 
   나이 : <INPUT TYPE ="text" NAME="age"> <br>
   전화번호 : <INPUT TYPE ="text" NAME="tel"> <br>
   주소 : <INPUT TYPE ="text" NAME="address"> <br>
   성별 : <INPUT TYPE ="text" NAME="gender"> <br>
   입원일 : <INPUT TYPE ="text" NAME="hospitalizationDate" value='0000-00-00'><br>
   퇴원일 : <INPUT TYPE ="text" NAME="dischargeDate" value='0000-00-00'> <br>
   사망일 : <INPUT TYPE ="text" NAME="dateOfDeath" value='0000-00-00'> <br>
   확진일 : <INPUT TYPE ="text" NAME="covidInspectionDate" value='0000-00-00'> <br>
   병원명 : <INPUT TYPE ="text" value="영남대병원" readonly> <br>
   병명 : <INPUT TYPE ="text" NAME="diseaseName"> <br>
   <BR><BR>
   <INPUT TYPE="submit"  VALUE="submit">
</FORM>
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