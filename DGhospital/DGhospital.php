<?php
    $con=mysqli_connect("localhost", "root", "1234", "covid19") or die( "MySQL 접속 실패");
    $sql_vaccine = "SELECT * from supply where hospitalName='대구병원'and type='공급'";
    $ret_vaccine = mysqli_query($con, $sql_vaccine);
    $pfizer = 0;
    $moderna = 0;
    while($row_vaccine=mysqli_fetch_array($ret_vaccine)){
        if($row_vaccine['supplyDate']<date('Y-m-d')){
            if($row_vaccine['vaccineType']=='화이자'){
                $pfizer += $row_vaccine['amount'];
            }
            if($row_vaccine['vaccineType']=='모더나'){
                $moderna += $row_vaccine['amount'];
            }
        }
    }
    $sql_vaccine2 = "SELECT * from reservation where hname='대구병원'";
    $ret_vaccine2 = mysqli_query($con, $sql_vaccine2);
    while($row_vaccine2=mysqli_fetch_array($ret_vaccine2)){
        if($row_vaccine2['date']<date('Y-m-d')){
            if($row_vaccine2['vaccinetype']=='화이자'){
                $pfizer -= 1;
            }
            if($row_vaccine2['vaccinetype']=='모더나'){
                $moderna -= 1;
            }
        }
    }
    $emrBedNum = 10;
   $norBedNum = 10;
   $dateString = date("Y-m-d");

   $emer_count = 0;
   $ava_emer_count=0;
   $ava_nor_count=0;
   $nor_count=0;
  $pssn = "SELECT * from patient where (hospitalizationDate!='0000-00-00' and dateOfDeath='0000-00-00' and hospitalName='대구병원')";
  $pssn1 = "SELECT availableEmerBed, availableNorBed from hospital where hName='대구병원'";
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
     /*지금은 단순히 텍스트로 인증받지만 테이블을 이용해서 인증할 예정*/
        echo "<!DOCTYPE HTML>\n";
        echo "<!--\n";
        echo "   Halcyonic by HTML5 UP\n";
        echo "   html5up.net | @ajlkn\n";
        echo "   Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)\n";
        echo "-->\n";
        echo "<html>\n";
        echo "   <head>\n";
        echo "      <title>Halcyonic by HTML5 UP</title>\n";
        echo "      <meta charset=\"utf-8\" />\n";
        echo "      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=no\" />\n";
        echo "      <link rel=\"stylesheet\" href=\"assets/css/main.css\" />\n";
        
echo "<style>  \n";
echo "      body { background: #fff; }\n";
echo "      .bluetop {\n";
echo "      border-collapse: collapse;\n";
echo "      border-top: 3px solid #168;\n";
echo "      }  \n";
echo "      .bluetop th {\n";
echo "      background: #f0f6f9;\n";
echo "      }\n";
echo "      .bluetop th, .bluetop td {\n";
echo "      color: #168;\n";
echo "      padding: 10px;\n";
echo "      border: 1px solid #ddd;\n";
echo "      }\n";
echo "      .bluetop th:first-child, .bluetop td:first-child {\n";
echo "      border-left: 0;\n";
echo "      }\n";
echo "      .bluetop th:last-child, .bluetop td:last-child {\n";
echo "      border-right: 0;\n";
echo "      }\n";
echo "      </style>\n";

        echo "   </head>\n";
        echo "   <body>\n";
        echo "      <div id=\"page-wrapper\">\n";
        echo "\n";
        echo "         <!-- Header -->\n";
        echo "            <section id=\"header\">\n";
        echo "               <div class=\"container\">\n";
        echo "                  <div class=\"row\">\n";
        echo "                     <div class=\"col-12\">\n";
        echo "\n";
        echo "                        <!-- Logo -->\n";
        echo "                           <h1><a href=\"DGhospital.php\" id=\"logo\"><span style=\"color:#ffffff\">DG Medical Center</a></h1>\n";
        echo "\n";
        echo "                        <!-- Nav -->\n";
        echo "                           <nav id=\"nav\">                              \n";
        echo "                               <a href=\"index.php\">Korea Goverment</a>\n";
        echo "                           </nav>\n";
        echo "\n";
        echo "                     </div>\n";
        echo "                  </div>\n";
        echo "               </div>\n";
        echo "            </section>\n";
        echo "\n";
        echo "         <!-- Features -->\n";
        echo "            <section id=\"content\">\n";
        echo "               <div class=\"container\">\n";
        echo "                  <div class=\"row\">\n";
        echo "                     <div class=\"col-4 col-6-medium col-12-small\">\n";
        echo "\n";
        echo "                        <!-- Feature #1 -->\n";
        echo "                           <section>\n";
        echo "                              <a href=\"covid.html\"><img src=\"patient.jpg\" alt=\"\" /></a>\n";
        echo "                              <h2>환자 정보 관련</h2>\n";
        echo "                              <p>\n";
        echo "                                            <a href=\"DGhospital1_1.php\"> 1. 환자 정보 등록</a><br>\n";
        echo "                                            <a href=\"DGhospital1_2.php\"> 2. 환자 정보 조회 및 수정</a><br>\n";   
	    echo "                                            <a href=\"DGhospital1_3.php\"> 3. 접종 등록</a><br>\n";  	
		echo "  										  <a href=\"DGhospital1_4.php\"> 4. 접종 계획 조회 및 수정</a><br>\n";  
        echo "                                 <!--<a href=\"http://www.president.go.kr/\"</a>-->\n";
        echo "                           \n";
        echo "                              </p>\n";
        echo "                           </section>\n";
        echo "\n";
        echo "                     </div>\n";
        echo "                     <div class=\"col-4 col-6-medium col-12-small\">\n";
        echo "\n";
        echo "                        <!-- Feature #2 -->\n";
        echo "                           <section>\n";
        echo "                              <a href=\"hospital.html\"><img src=\"vaccin2.jpg\" alt=\"\" /></a>\n";
        echo "                              <h2>백신 정보 관련</h2>\n";
        echo "                              <p>\n";
        #echo "                                 <a href=\"DGhospital2_1.php\"> 1. 백신 재고 조회</a><br>\n";
        echo"<table class='bluetop'>";
   echo"<TR>";
   echo"<TH> 화이자 재고량 </TH><TH>모더나 재고량</TH>";
  echo"</TR>";
echo"<TR>";
echo "<TD>", $pfizer, "</TD>";
  echo "<TD>", $moderna, "</TD>";
  echo"</TR>";
    echo"</table>";
        echo "                                 <a href=\"DGhospital2_3.php\"> 1. 백신 공급일 조회</a><br>\n";       
		echo " 								   <a href=\"DGhospital2_4.php\"> 2. 백신 요청 등록</a><br>\n"; 
		echo "                                 <a href=\"DGhospital2_5.php\"> 3. 백신 요청 조회 및 수정</a><br>\n"; 
        echo "                              </p>\n";
        echo "                           </section>\n";
        echo "\n";
        echo "                     </div>\n";
        echo "                     <div class=\"col-4 col-6-medium col-12-small\">\n";
        echo "\n";
        echo "                        <!-- Feature #3 -->\n";
        echo "                           <section>\n";
        echo "                              <a href=\"vaccin.html\"><img src=\"bed.jpg\" alt=\"\" /></a>\n";
        echo "                              <h2>병상 정보 관련</h2>\n";
        echo "                              <p> \n";
        #echo "                                 <a href=\"DGhospital3_1.php\"> 1. 가용 병상 수 조회</a><br>\n";

   $emrBedNum = 10;
   $norBedNum = 10;
   $dateString = date("Y-m-d");

   $emer_count = 0;
   $ava_emer_count=0;
   $ava_nor_count=0;
   $nor_count=0;
  $pssn = "SELECT * from patient where (hospitalizationDate!='0000-00-00' and dateOfDeath='0000-00-00' and hospitalName='대구병원')";
  $pssn1 = "SELECT availableEmerBed, availableNorBed from hospital where hName='대구병원'";
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
   

   echo"<table class='bluetop'>";
   echo"<TR>";
   echo"<TH> 대구병원 </TH><TH>보유 병상</TH><TH>가용 병상</TH>";
  echo"</TR>";
  echo"<TR>";
  echo"<TR>";
echo"<TR>";
  echo"<TH>일반 병상</TH>";

echo "<TD>", $pssn_row['availableNorBed'], "</TD>";
  echo "<TD>", $ava_nor_count, "</TD>";
  echo"</TR>";
echo"<TR>";
  echo"<TH>응급 병상</TH>";
echo "<TD>", $pssn_row['availableEmerBed'], "</TD>";
  echo "<TD>", $ava_emer_count, "</TD>";
        echo "                              </p>\n";
        echo "                           </section>\n";
        echo "\n";
        echo "                     </div>\n";
        echo "                     \n";
        echo "                     \n";
        echo "                     \n";
        echo "                     \n";
        echo "                     \n";
        echo "                  </div>\n";
        echo "               </div>\n";
        echo "            </section>\n";
        echo "\n";
        echo "\n";
        echo "      </div>\n";
        echo "\n";
        echo "      <!-- Scripts -->\n";
        echo "         <script src=\"assets/js/jquery.min.js\"></script>\n";
        echo "         <script src=\"assets/js/browser.min.js\"></script>\n";
        echo "         <script src=\"assets/js/breakpoints.min.js\"></script>\n";
        echo "         <script src=\"assets/js/util.js\"></script>\n";
        echo "         <script src=\"assets/js/main.js\"></script>\n";
        echo "\n";
        echo "   </body>\n";
        echo "</html>\n";
?>