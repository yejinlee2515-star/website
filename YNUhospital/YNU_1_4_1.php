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
   $sql = "SELECT reservation.*, nation.name FROM reservation inner join nation WHERE (nation.ssn=reservation.ssn AND reservation.hname='영남대병원' AND nation.ssn='".$_GET["ssn"]."')";  
   $ret = mysqli_query($con, $sql);

   
   error_reporting(E_ALL); ini_set("display_errors", 1);
   $ret = mysqli_query($con, $sql); 
   if($ret){
      $count=mysqli_num_rows($ret);
      if($count==0){
         echo $GET['ssn']."해당 환자 없음!!!"."<br>";
         echo "<br> <a href='YNUhospital1_4.php'> <--초기화면</a>";
         exit();
      }
   }
   else{
      echo "데이터 조회 실패!!!"."<br>";
      echo "실패 원인 : ". mysqli_error($con);
      echo "<br> <a href='YNUhospital1_4.php'> <--초기화면</a>";
      exit();
   }
   $row = mysqli_fetch_array($ret);
   $rnum = $row["rnum"];
   $name = $row["name"];
   $ssn = $row["ssn"];
   $degree = $row["degree"];
   $date = $row["date"];
   $vaccinetype = $row["vaccinetype"];   


?>
<h1> ▶접종 등록 </h1>
<FORM METHOD="post"  ACTION="YNU_1_4_1_result.php">
   접종번호 : <INPUT TYPE ="text" NAME="rnum" VALUE=<?php echo $rnum ?> readonly> <br>
   이름 : <INPUT TYPE ="text" NAME="name" VALUE=<?php echo $name ?> readonly> <br>
   주민등록번호 : <INPUT TYPE ="text" NAME="ssn" VALUE=<?php echo $ssn ?> readonly> <br>
   1차/2차 : <INPUT TYPE ="text" NAME="degree" VALUE=<?php echo $degree ?>> <br> 
   접종일 : <INPUT TYPE ="text" NAME="date" VALUE=<?php echo $date ?>> <br>
   백신종류 : <INPUT TYPE ="text" NAME="vaccinetype" VALUE=<?php echo $vaccinetype ?>> <br>
   병원명 : <INPUT TYPE ="text" value="영남대병원" readonly> <br>
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