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
	$con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
	$currentdate=date("y-m-d");
   $sql4 = "SELECT * from vaccine";
	$ret4 = mysqli_query($con, $sql4);
	$sql5 = "SELECT * from `order`";
	$ret5 = mysqli_query($con, $sql5);
	$stock=0;
    while($row4=mysqli_fetch_array($ret4))
    {
      if ($row4['registrationDate']>=date('Y-m-d')and$row4['totalProduction']!=0){
		  $row4['plannedProduction']+=$row4['totalProduction'];
		  $row4['totalProduction']=0;
		  $sql5="UPDATE vaccine SET totalProduction='".$row4['totalProduction']."', plannedProduction='".$row4['plannedProduction']."' where uniqueNumber='".$row4['uniqueNumber']."'";
		  $ret5 = mysqli_query($con, $sql5);
		  
	  }
	  if($row4['registrationDate']>=date('Y-m-d') and $row4['pharmacistName']=='화이자'){
		$stock+=$row4['plannedProduction'];
	  }
    }
    echo "<h3>예정 생산량 : '".$stock."'</h3>";
    $sql3 = "SELECT *FROM vaccine WHERE pharmacistName='화이자'";
		$ret3 = mysqli_query($con, $sql3);
		echo "<br><h1> 생산 예정 백신 </h1>";
		echo "<TABLE class='bluetop'>";
		echo "<TR>";
		echo "<TH>UniqueNumber</TH><TH>ProductName</TH><TH>RegistraionDate</TH><TH>Validity</TH><TH>Planned Production</TH>";
		echo "<TH>수정</TH><TH>삭제</TH>";
		echo "</TR>";
   
		while($row=mysqli_fetch_array($ret3)){
         if ($row['registrationDate']>=date('Y-m-d')){
			echo "<TR>";
			echo "<TD>", $row['uniqueNumber'], "</TD>";
			echo "<TD>", $row['productName'], "</TD>";
			echo "<TD>", $row['registrationDate'], "</TD>";
			echo "<TD>", $row['validity'], "</TD>";
			echo "<TD>", $row['plannedProduction'], "</TD>";
			echo "<TD>", "<a href='update_pfizer.php?uniqueNumber=", $row['uniqueNumber'], "'>수정</a></TD>";
			echo "<TD>", "<a href='delete_pfizer.php?uniqueNumber=", $row['uniqueNumber'], "'>삭제</a></TD?"; 
			echo "</TR>";
         }
		}
   
		mysqli_close($con);
		echo "</TABLE>";
		
		echo "<br> <a href='pfizer.php'><--초기 화면</a>";
	    
		exit();
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