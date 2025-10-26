<?php
   $dateString=date("Y-m-d");
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패!!");


   $supplyNumber = $_POST["supplyNumber"];
   $supplyDate = $_POST["supplyDate"];
   $vaccineType = $_POST["vaccineType"];
   $amount = $_POST["amount"];
   
   $sql4 = "UPDATE supply SET vaccineType='$vaccineType' WHERE supplyNumber='$supplyNumber'";
   $sql5 = "UPDATE supply SET amount='$amount' WHERE supplyNumber='$supplyNumber'";
   
   $ret4 = mysqli_query($con, $sql4);
   $ret5 = mysqli_query($con, $sql5);
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

 echo "<h1>접종 등록 수정 결과</h1>";
    if($ret4 or $ret5){
      echo "<br>"."데이터가 성공적으로 수정됨.";
   }
   else{
      echo "데이터 수정 실패!"."<br>";
      echo "실패 원인:".mysqli_error($con);
   }
   mysqli_close($con);
   
   echo "<br> <a href='DGhospital2_5.php'> <--되돌아가기</a>";
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