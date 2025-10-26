<html>
   <head>
      <title>Strongly Typed by HTML5 UP</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
      <link rel="stylesheet" href="assets/css/main.css" />
   </head>
<BODY>
<section id="header">
               <div class="container">
                  <div class="row">
                     <div class="col-12">
                                                  
                        <!-- Logo -->
                           <h1><a href="DGhospital.php" id="logo"><span style="color:#ffffff">DG Medical Center</a></h1>

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
                           <h1><a href="DGhospital.php" id="logo"><span style="color:#ffffff">Korea Goverment</a></h1>

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
<h1> 백신 요청 등록 결과</h1>
<?php
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");

   $vaccineType = $_POST["vaccineType"];
   $amount = $_POST["amount"];
   $supplyDate=date("Y-m-d");
   $count_sql="SELECT * FROM supply";
   $count_ret = mysqli_query($con, $count_sql);
   $count=intval(mysqli_num_rows($count_ret)) + 1;
   
   
   $sql="INSERT INTO supply values ('$count', '$supplyDate', '$vaccineType', '$amount', '대구병원', '대한민국', '요청')";
   
   $count += 10000;
   $timestamp = strtotime("+2 days");
   $date2=date("Y-m-d", $timestamp);
   $sql2="INSERT INTO supply values ('$count', '$date2', '$vaccineType', '$amount', '대구병원', '대한민국', '공급')";
   
   $ret = mysqli_query($con, $sql);
   $ret2 = mysqli_query($con, $sql2);
 
   if($ret and $ret2) {
      echo "요청 등록이 완료되었습니다.";
   }
   else {
      echo "요청 등록에 실패하였습니다."."<br>";
      echo "실패 원인 :".mysqli_error($con);
   } 
   echo "<br><a href=\"DGhospital2_4.php\"> 조회 화면</a><br>\n";  
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