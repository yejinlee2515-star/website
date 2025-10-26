<?php $dateString = date("Y-m-d");?>
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
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
   
   $sql = "SELECT * from supply WHERE hospitalName = '영남대병원' and type='요청'";
     
   $ret = mysqli_query($con, $sql);
  
     echo "<br><h1> list </h1>";
      echo "<TABLE class='bluetop'>";
      echo "<TR>";
      echo "<TH>요청 번호</TH><TH>요청일</TH><TH>백신 종류</TH><TH>수량</TH>";
      echo "<TH>수정</TH>";
      echo "</TR>";
   while($row=mysqli_fetch_array($ret)){
        echo "<TR>";
        echo "<TD>", $row['supplyNumber'], "</TD>";
      echo "<TD>", $row['supplyDate'], "</TD>";
      echo "<TD>", $row['vaccineType'], "</TD>";
      echo "<TD>", $row['amount'], "</TD>";
        echo "<TD>", "<a href='YNU_2_5_1.php?supplyNumber=", $row['supplyNumber'], "'>수정</a></TD>";
        echo "</TR>";
   }
   
   if($ret) {
   }
   else {
      echo "요청 등록에 실패하였습니다."."<br>";
      echo "실패 원인 :".mysqli_error($con);
   } 
   
   mysqli_close($con);
   echo "</TABLE>";
   echo "<br> <a href='YNUhospital.php'><--초기 화면</a>";
?>                
                    
                        </div>       
                    </div>
                </div>
            </section>
 

      </div>

      <!-- Scripts -->
         <script src="assets/js/jquery.min.js"></script>
         <script src="assets/js/browser.min.js"></script>
         <script src="assets/js/breakpoints.min.js"></script>
         <script src="assets/js/util.js"></script>
         <script src="assets/js/main.js"></script>

   </body>
</html>