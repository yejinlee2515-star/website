<?php
   function query_obj($con, $sql){
      $ret = mysqli_query($con, $sql);
      $obj = mysqli_fetch_object($ret);
      return $obj;
   }
   function query_array($con1, $sql1){
      $ret1 = mysqli_query($con1, $sql1);
      $arr = mysqli_fetch_array($ret1);
      return $arr;
   }
   function query_all($con2, $sql2){
      $ret2 = mysqli_query($con2, $sql2);
      $all = mysqli_fetch_all($ret2, MYSQLI_ASSOC);
      return $all;
   }
   
?>

<?php
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die( "MySQL 접속 실패");
   $dateString = date("Y-m-d");
   $sql = "select * from hospital";
   $ret = mysqli_query($con, $sql);
   $sumPfizer = 0;
    $sumModerna = 0;
   
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
                     <?php echo "<a href='vaccin.html'> 이전 화면</a>"; ?>
                     <h1> <br>보유 백신 수 조회 결과 </h1>
                         <table class='bluetop'>
                             <TR>
                             <TH>병원명</TH><TH>화이자 보유 수</TH><TH>모더나 보유 수</TH>
                            </TR>
                            <?php
                            $yu_count_p = 0;
                            $yu_count_m = 0;
                            $knu_count_p = 0;
                            $knu_count_m = 0;
                            $dg_count_p = 0;
                            $dg_count_m = 0;
                            $sql_hospital = "SELECT * from supply where type='공급'";
                            $sql_hospital2 = "SELECT * from reservation";
                            $ret_hospital2 = mysqli_query($con, $sql_hospital2);
                           $ret_hospital = mysqli_query($con, $sql_hospital);
                            while($row=mysqli_fetch_array($ret_hospital))
                            {
                              if($row['supplyDate']<date('Y-m-d'))
                              {
                                 if($row['hospitalName']=='영남대병원')
                                 {
                                    if($row['vaccineType']=='화이자'){
                                       $yu_count_p += $row['amount'];
                                    }
                                    else if($row['vaccineType']=='모더나'){
                                       $yu_count_m += $row['amount'];
                                    }
                                 }
                                 if($row['hospitalName']=='경북대병원'){
                                    if($row['vaccineType']=='화이자'){
                                       $knu_count_p += $row['amount'];
                                    }
                                    else if($row['vaccineType']=='모더나'){
                                       $knu_count_m += $row['amount'];
                                    }
                                 }
                                 if($row['hospitalName']=='대구병원'){
                                    if($row['vaccineType']=='화이자'){
                                       $dg_count_p += $row['amount'];
                                    }
                                    else if($row['vaccineType']=='모더나'){
                                       $dg_count_m += $row['amount'];
                                    }
                                 }
                              } 
                            }
                            while($row2=mysqli_fetch_array($ret_hospital2)){
                               if($row2['date']<date('Y-m-d'))
                               {
                              if($row2['hname']=='영남대병원')
                                 {
                                    if($row2['vaccinetype']=='화이자'){
                                       $yu_count_p -= 1;
                                    }
                                    if($row2['vaccinetype']=='모더나'){
                                       $yu_count_m -= 1;
                                    }
                                 }
                                 if($row2['hname']=='경북대병원'){
                                    if($row['vaccinetype']=='화이자'){
                                       $knu_count_p -= 1;
                                    }
                                    if($row2['vaccinetype']=='모더나'){
                                       $knu_count_m -= 1;
                                    }
                                 }
                                 if($row2['hname']=='대구병원'){
                                    if($row2['vaccinetype']=='화이자'){
                                       $dg_count_p -= 1;
                                    }
                                    if($row2['vaccinetype']=='모더나'){
                                       $dg_count_m -= 1;
                                    }
                                 }
                            }
                           }
                            
                            ?>
                           <TR>
                             <TH>영남대</TH><TH><?php echo $yu_count_p?></TH><TH><?php echo $yu_count_m?></TH>
                            </TR>
                            <TR>
                             <TH>경북대</TH><TH><?php echo $knu_count_p?></TH><TH><?php echo $knu_count_m?></TH>
                            </TR>
                            <TR>
                             <TH>대구</TH><TH><?php echo $dg_count_p?></TH><TH><?php echo $dg_count_m?></TH>
                            </TR>
                           </table>                            
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