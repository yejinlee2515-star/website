<?php
   $dateString = date("Y-m-d");
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패!!");
    $sql = "SELECT *FROM `order` WHERE orderNumber='".$_GET['orderNumber']."'";
   
   $ret = mysqli_query($con, $sql);
   if($ret){
      $count=mysqli_num_rows($ret);
      if($count==0){
         echo $GET['orderDate']."오류"."<br>";
         echo "<br> <a href='vaccin1_3.php'> <--초기화면</a>";
         exit();
      }
   }
   else{
      echo "vaccine 데이터 조회 실패!!!"."<br>";
      echo "실패 원인 : ". mysqli_error($con);
      echo "<br> <a href='vaccin1_3.php'> <--초기화면</a>";
      exit();
   }
   
   $row = mysqli_fetch_array($ret);
   $orderNumber=$row["orderNumber"];
   $orderDate= $row["orderDate"];
   $orderQuantity=$row["orderQuantity"];
   $pharmacistName=$row["pharmacistName"];
   $country=$row["country"];
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
                           <h1><a href="vaccin.html" id="logo"><span style="color:#ffffff">Korea Goverment</a></h1>

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
                           <h1><a href="vaccin.html" id="logo"><span style="color:#ffffff">Korea Goverment</a></h1>

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
                        <?php echo "<a href='vaccin1_3.php'> 이전 화면</a><br>"; ?>
                        <h1>update vaccine data</h1>
                        <FORM METHOD="POST" ACTION="update_result_vaccin1_3.php">
	                    orderNumber: <INPUT TYPE="text" NAME="orderNumber" VALUE=<?php echo $orderNumber ?> READONLY> <br> 
                        orderDate: <INPUT TYPE="text" NAME="orderDate" VALUE=<?php echo $orderDate ?> > <br>
                        orderQuantity: <INPUT TYPE="text" NAME="orderQuantity" VALUE=<?php echo $orderQuantity ?> > <br>
                        pharmacistName: <INPUT TYPE="text" NAME="pharmacistName" VALUE=<?php echo $pharmacistName ?> READONLY> <br>
                        country: <INPUT TYPE="text" NAME="country" VALUE=<?php echo $country ?> READONLY> <br>
                        <br> <br>
                        <INPUT TYPE="submit" VALUE="정보 수정">
                        </FORM>
                    
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