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
                        <?php echo "<a href='pfizer.php'> 이전 화면</a>"; ?>
                        <h1> 백신 생산 계획 </h1>
                        <FORM METHOD="GET" ACTION="">
                     pharmacistName: <INPUT TYPE="text" NAME="pharmacistName" VALUE=<?php echo "화이자" ?> > <br>
                            uniqueNumber: <INPUT TYPE = "text" NAME="uniqueNumber"><br>
                     plannedProduction: <INPUT TYPE = "text" NAME="plannedProduction"><br>
                            price: <INPUT TYPE = "text" NAME="price"><br>
                     registrationDate: <INPUT TYPE = "text" NAME="registrationDate"><br>
                     validity: <INPUT TYPE = "text" NAME="validity"><br>
                            <br><br>
                            <INPUT TYPE="submit" VALUE="ENROLL">
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


 <?php
   $con=mysqli_connect("localhost","root","1234", "covid19") or die("MySQL 접속 실패 !!");
   
   if(isset($_GET["uniqueNumber"])==FALSE)
    {
       exit();
    }
   
    $uniqueNumber=$_GET["uniqueNumber"];
    $price=$_GET["price"];
    $registrationDate=$_GET["registrationDate"];
    $validity=$_GET["validity"];
    $plannedProduction=$_GET["plannedProduction"];
   
    $sql = "INSERT INTO vaccine VALUES('".$uniqueNumber."', '".$price."', '화이자', '".$registrationDate."', '".$validity."', '".$plannedProduction."', '".$plannedProduction."', '화이자')";
   
    $ret = mysqli_query($con, $sql);
                            
    if($ret){
         echo "success enrolling / ";
		 echo "<a href='pfizer.php'><--돌아가기</a>";
    }
    else{
         echo "failed!!"."<br>";
         echo mysqli_error($con);
    }
    mysqli_close($con);
 ?>