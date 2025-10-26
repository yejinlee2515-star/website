<?php 
$dateString = date("Y-m-d");?>
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
                        <h1> ▶백신 주문 </h1>
                        <FORM METHOD="GET" ACTION="">
                            pharmacistName: <INPUT TYPE = "text" NAME="pName"><br>
                            orderQuantity: <INPUT TYPE = "text" NAME="Quantity"><br>
                            country: <INPUT TYPE = "text" NAME='country' value = "대한민국" readonly><br>
                            orderDate: <INPUT TYPE = "date" NAME="date"><br>
                            <br><br>
                            <INPUT TYPE="submit" VALUE="ORDER">
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
   
                            if(isset($_GET["pName"])==FALSE)
                            {
                                exit();
                            }

                            $pName=$_GET["pName"];
                            $Quantity=$_GET["Quantity"];
                            $country=$_GET["country"];
                            $currentDate=$_GET["date"];
                            
                            
                            $sql2 = "SELECT * FROM `order`";
                            $ret2 = mysqli_query($con, $sql2);
                            $count= mysqli_num_rows($ret2)+1;
                            $count1= $count*10000;
                           
                            $sql = "INSERT INTO `order` VALUES('".$currentDate."', ".$Quantity.", ".$count.", '".$pName."','".$country."', '주문')";
                            $sql1 = "INSERT INTO `order` VALUES('".$currentDate."', ".$Quantity.", ".$count1.", '".$pName."','".$country."', '판매')";
                            
                            $ret = mysqli_query($con, $sql);
                            $ret = mysqli_query($con, $sql1);
                            
                            if($ret){
                                echo "success ordering";
                            }
                            else{
                                echo "failed!!"."<br>";
                                echo mysqli_error($con);
                            }
						    echo "<a href='vaccin.html'> 조회 화면</a>";
                            mysqli_close($con);
                        ?>