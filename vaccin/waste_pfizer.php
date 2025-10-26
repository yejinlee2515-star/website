<?php
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
   
   $dateString=date("Y-m-d");
 
   $sql = "SELECT *FROM vaccine WHERE (validity < '$dateString') AND pharmacistName='화이자'";

   $ret = mysqli_query($con, $sql);
   if($ret){
      $count=mysqli_num_rows($ret);
   }
   else{
      echo "vaccine 데이터 조회 실패!!!"."<br>";
      echo "실패 원인 : ". mysqli_error($con);
      exit();
   }
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
                           <h1><a href="pfizer.php" id="logo"><span style="color:#ffffff">화이자</a></h1>

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
                           <h1><a href="pfizer.php" id="logo"><span style="color:#ffffff">Korea Goverment</a></h1>

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
    echo "<h1> 유효기한 지난 백신 조회 결과 </h1>";
   echo "<TABLE class='bluetop'>";
   echo "<TR>";
   echo "<TH>UniqueNumber</TH><TH>ProductName</TH><TH>RegistraionDate</TH>";
   echo "<TH>TotalProduction</TH><TH>Validity</TH><TH>CurrentDate</TH><TH>폐기</TH>";
   echo "</TR>";
   
   while($row=mysqli_fetch_array($ret)){
      echo "<TR>";
      echo "<TD>", $row['uniqueNumber'], "</TD>";
	  echo "<TD>", $row['productName'], "</TD>";
      echo "<TD>", $row['registrationDate'], "</TD>";
	  echo "<TD>", $row['totalProduction'], "</TD>";
	  echo "<TD>", $row['validity'], "</TD>";
      echo "<TD>", $dateString, "</TD>";
	  echo "<TD>", "<a href='waste_result_pfizer.php?uniqueNumber=", $row['uniqueNumber'], "'>폐기</a></TD>";
      echo "</TR>";
   }
   
   mysqli_close($con);
   echo "</TABLE>";
   echo "<br> <a href='pfizer.php'><--초기 화면</a>";
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