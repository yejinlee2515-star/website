<?php
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die( "MySQL 접속 실패");
   $emrBedNum = 10;
   $norBedNum = 10;
   $dateString = date("Y-m-d");

   $emer_count = 0;
   $ava_emer_count=0;
   $ava_nor_count=0;
   $nor_count=0;
  $pssn = "SELECT * from patient where (hospitalizationDate!='0000-00-00' and dateOfDeath='0000-00-00' and hospitalName='영남대병원')";
  $pssn1 = "SELECT availableEmerBed, availableNorBed from hospital where hName='영남대병원'";
  $data = mysqli_query($con, $pssn);
  #$pssn_rows = mysqli_num_rows($data);
  $pssn_ret = mysqli_query($con, $pssn1);
  while($row=mysqli_fetch_array($data)){
     if (($row['dischargeDate']='0000-00-00' or $row['dischargeDate']>date('Y-m-d'))and$row['diseaseName']!='covid-19'){
        $nor_count+=1;
     }
     if(($row['dischargeDate']='0000-00-00' or $row['dischargeDate']>date('Y-m-d'))and$row['diseaseName']=='covid-19'){
        $emer_count+=1;
      }
   }
   $pssn_row = mysqli_fetch_array($pssn_ret); 
   $ava_emer_count=$pssn_row['availableEmerBed'] - $emer_count;
   $ava_nor_count=$pssn_row['availableNorBed'] - $nor_count;
   

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
      background: #f0f6f9;
      }
      .bluetop th, .bluetop td {
      color: #168;
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
                           <h1><a href="YNUhospital3_1.php" id="logo"><span style="color:#ffffff">YU Medical Center</a></h1>

                        <!-- Nav -->

                     </div>
                  </div>
               </div>
            </section>

            <section id="features">
               <div class="container">
                  <div class="row">
                     <div class="col-12">
                                                  
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
                     <h1> ▶보유 병상 수 조회 결과 </h1>
                         <table class='bluetop'>
                             <TR>
                             <TH> 영남대병원 </TH><TH>보유 병상</TH><TH>가용 병상</TH>
                            </TR>
                            <TR>
                            <TR>
                     <TR>
                            <TH>일반 병상</TH>
                     <?php
                     echo "<TD>", $pssn_row['availableNorBed'], "</TD>";
                            echo "<TD>", $ava_nor_count, "</TD>";?>
                            </TR>
                     <TR>
                            <TH>응급 병상</TH>
                     <?php
                     echo "<TD>", $pssn_row['availableEmerBed'], "</TD>";
                            echo "<TD>", $ava_emer_count, "</TD>";?>
                            
                            <?php mysqli_close($con);
                  
                            ?>
                        </table>
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