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
   $con=mysqli_connect("localhost","root","1234", "covid19") or die("MySQL 접속 실패 !!");
   
   $idnum=$_POST["uniqueNumber"];
    $date=$_POST["registrationDate"];
	
	
	$count_stock_sq =  "SELECT * FROM pharmacist WHERE phname='화이자'";
	$count_stock_ret = mysqli_query($con, $count_stock_sq);
	$row=mysqli_fetch_array($count_stock_ret);
	$count_stock = $row['stock'];

	$count_totalP_sq =  "SELECT * FROM vaccine WHERE uniqueNumber='$idnum'";
	$count_totalP_ret = mysqli_query($con, $count_totalP_sq) or die(mysqli_error($con));
	$row=mysqli_fetch_array($count_totalP_ret);
	$count_totalP = $row['totalProduction'];
	
	$count=0;
	$count = intval($count_stock) - intval($count_totalP);
   $sql7 = "UPDATE pharmacist SET stock='$count' WHERE phname='화이자'";
	 $ret7 = mysqli_query($con, $sql7);
   
   $sql="DELETE FROM vaccine WHERE uniqueNumber='".$idnum."'";
   
   $ret = mysqli_query($con, $sql);
   
   echo "<h1> 백신 정보 삭제 결과 </h1>";
   if($ret7){
   }
   else{
      echo "데이터 삭제 실패!"."<br>";
      echo "실패 원인 :".mysqli_error($con);
   }
   mysqli_close($con);
   
   echo "<br><br> <a href='select_pfizer.php'><--돌아가기></a>";
   
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