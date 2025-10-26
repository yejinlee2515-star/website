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

         <!-- Features -->
            <section id="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-6-medium col-12-small">
<?php
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
   $sql = "SELECT * from supply WHERE (type='요청') AND (supplyNumber='".$_GET['supplyNumber']."')";
   $ret = mysqli_query($con, $sql);
   
   error_reporting(E_ALL); ini_set("display_errors", 1);
   $ret = mysqli_query($con, $sql); 
   if($ret){
      $count=mysqli_num_rows($ret);
      if($count==0){
         echo $GET['ssn']."해당 환자 없음!!!"."<br>";
         echo "<br> <a href='DGhospital2_5.php'> <--초기화면</a>";
         exit();
      }
   }
   else{
      echo "데이터 조회 실패!!!"."<br>";
      echo "실패 원인 : ". mysqli_error($con);
      echo "<br> <a href='DGhospital1_5.php'> <--초기화면</a>";
      exit();
   }
   $row = mysqli_fetch_array($ret);
   $supplyDate=$row['supplyDate'];
   $vaccineType=$row['vaccineType'];
   $amount=$row['amount'];
?>
<h1> ▶ 백신 요청 조회 </h1>
<FORM METHOD="post"  ACTION="DG_2_5_1_result.php">
   요청번호 : <INPUT TYPE ="text" NAME="supplyNumber" VALUE=<?php echo $_GET['supplyNumber'] ?> readonly> <br>
   요청일 : <INPUT TYPE ="text" NAME="supplyDate" VALUE=<?php echo $supplyDate ?> readonly> <br>
   백신 종류 : <INPUT TYPE ="text" NAME="vaccineType" VALUE=<?php echo $vaccineType ?>> <br>
   수량 : <INPUT TYPE ="text" NAME="amount" VALUE=<?php echo $amount ?>> <br> 
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