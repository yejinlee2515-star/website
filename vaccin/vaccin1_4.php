
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
                        <h1> ▶백신 공급 입력 </h1>
                        <FORM METHOD="GET" ACTION="">
                           supplyNumber: <INPUT TYPE = "text" NAME="supplyNumber"><br>
                           supplyDate: <INPUT TYPE = "text" NAME="supplyDate"><br>
                           vaccineType: <INPUT TYPE = "text" NAME="vaccineType"><br>
                           amount: <INPUT TYPE = "text" NAME="amount"><br>
                           hospitalName: <INPUT TYPE = "text" NAME="hospitalName"><br>
                           country: <INPUT TYPE="text" NAME="country" VALUE=<?php echo "대한민국" ?> READONLY> <br>
                           <br><br>
                           <INPUT TYPE="submit" VALUE="Enter">
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
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패!!");
   
   if(isset($_GET["supplyNumber"])==FALSE)
   {
      exit();
   }

   $supplyNumber=$_GET["supplyNumber"];
   $supplyDate=$_GET["supplyDate"];
   $vaccineType=$_GET["vaccineType"];
   $amount=$_GET["amount"];
   $hospitalName=$_GET["hospitalName"];
   $country="대한민국";
   
   $sql = "INSERT INTO supply VALUES('".$supplyNumber."', '".$supplyDate."', '".$vaccineType."', '".$amount."', '".$hospitalName."', '".$country."')";

   $ret = mysqli_query($con, $sql);
   
   if($ret){
        echo "success supplying";
   }
   else{
        echo "failed!!"."<br>";
        echo mysqli_error($con);
   }
   echo "<a href='vaccin.html'> 조회 화면</a>";
   mysqli_close($con);
   
?>