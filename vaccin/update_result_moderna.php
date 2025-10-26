<?php
   $dateString=date("Y-m-d");
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패!!");
   $tproduct = "SELECT totalProduction FROM vaccine WHERE uniqueNumber='".$_POST['uniqueNumber']."'";
	
   $idnum=$_POST["uniqueNumber"];
   $pName=$_POST["productName"];
   $date=$_POST["registrationDate"];
   $val=$_POST["validity"];
   $tP=$_POST["totalProduction"];
   
   
	$count_stock_sq =  "SELECT * FROM pharmacist WHERE phname='모더나'";
	$count_stock_ret = mysqli_query($con, $count_stock_sq);
	$row=mysqli_fetch_array($count_stock_ret);
	$count_stock = $row['stock'];

	$count_totalP_sq =  "SELECT * FROM vaccine WHERE uniqueNumber='$idnum'";
	$count_totalP_ret = mysqli_query($con, $count_totalP_sq) or die(mysqli_error($con));
	$row=mysqli_fetch_array($count_totalP_ret);
	$count_totalP = $row['totalProduction'];
	
	$count=0;
	$count = intval($count_stock) - intval($count_totalP) + intval($tP);
   $sql7 = "UPDATE pharmacist SET stock='$count' WHERE phname='모더나'";
   
   $sql2="UPDATE vaccine SET registrationDate='$date' WHERE uniqueNumber='".$_POST['uniqueNumber']."'";
   $sql4="UPDATE vaccine SET totalProduction='$tP' WHERE uniqueNumber='".$_POST['uniqueNumber']."'";
   
   $ret2 = mysqli_query($con, $sql2);
   $ret4 = mysqli_query($con, $sql4);
	$ret7=mysqli_query($con, $sql7)
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
                           <h1><a href="moderna.php" id="logo"><span style="color:#ffffff">모더나</a></h1>

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
                           <h1><a href="moderna.php" id="logo"><span style="color:#ffffff">Korea Goverment</a></h1>

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
   echo "<h1>백신 정보 수정 결과</h1>";
   if(($ret2 and $ret4) or $ret7){
      echo "데이터가 성공적으로 수정됨.";
   }
   else{
      echo "데이터 수정 실패!"."<br>";
      echo "실패 원인:".mysqli_error($con);
   }
   mysqli_close($con);
   
   echo "<br> <a href='select_moderna.php'> <--모더나 화면</a>";
   
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