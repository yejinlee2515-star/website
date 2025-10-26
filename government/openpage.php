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
   /*거리두기 단계 sql*/ 
   $sql1_1 = "SELECT distanceStep FROM government where countryName = '대한민국'";
   $obj1_1 = query_array($con, $sql1_1);

   /*접종현황 sql*/
   $sql1_2 = "select 1stVaccination, count(*)cnt from nation group by 1stVaccination order by 1stVaccination desc";
   $all1_2 = query_all($con, $sql1_2);
   $sql1_2 = "select count(*)cnt from nation";
   $all1_2_1 = query_array($con, $sql1_2);
   $sql1_2_2 = "select 2ndVaccination, count(*)cnt from nation group by 2ndVaccination order by 2ndVaccination desc";
   $arr1_2_2 = query_all($con, $sql1_2_2);

   /*발생현황 sql*/
   $sql1_3 = "SELECT count(*) as cnt FROM nation where covidInspectionDate='".$dateString."'"; /*일일 확진자 수*/ 
   $sql1_3_2 = "select count(*) as cnt from patient where hospitalizationDate='".$dateString."' and diseaseName='covid-19'"; /*일일 입원자 수*/
   $sql1_3_3 = "select count(*) as cnt from patient where dateOfDeath='".$dateString."' and diseaseName='covid-19'";/*일일 사망자 수*/
   $arr1_3 = query_array($con, $sql1_3);
   $arr1_3_2 = query_array($con, $sql1_3_2);
   $arr1_3_3 = query_array($con, $sql1_3_3);

   /*주간 발생현황 sql*/
   $sql1_4 = "SELECT count(case when date(dateOfDeath) BETWEEN subdate(curdate(),date_format(curdate(),'%w')) AND subdate(curdate(),date_format(curdate(),'%w')-6) then 1 end)die, count(case when date(hospitalizationDate) BETWEEN subdate(curdate(),date_format(curdate(),'%w')) AND subdate(curdate(),date_format(curdate(),'%w')-6) then 1 end)new FROM patient WHERE diseaseName='covid-19'"; 
   /*new, die 주간 입원자 수, 사망자 수*/ 
   $sql1_4_2 = "SELECT count(case when date(covidInspectionDate) BETWEEN subdate(curdate(),date_format(curdate(),'%w')) AND subdate(curdate(),date_format(curdate(),'%w')-6) then 1 end)covid from nation"; 
   /*covid 주간 확진자 수 */ 
   $arr1_4 = query_array($con, $sql1_4);
   $arr1_4_2 = query_array($con, $sql1_4_2);

   /*이동경로 */
   $sql1_5 = "select * from path where pssn = (select ssn from nation where covidInspectionDate='2021-12-01') order by visitTime";
   $ret1_5 = mysqli_query($con, $sql1_5);

   
   /*사망그래프 sql*/
   $data1 = "select count(*) as cnt from patient where ((day(dateOfDeath) > 0 and day(dateOfDeath) < 8) and diseaseName = 'covid-19')";
   $data2 = "select count(*) as cnt from patient where ((day(dateOfDeath) > 7 and day(dateOfDeath) < 15) and diseaseName = 'covid-19')";
   $data3 = "select count(*) as cnt from patient where ((day(dateOfDeath) > 14 and day(dateOfDeath) < 22)and diseaseName = 'covid-19')";
   $data4 = "select count(*) as cnt from patient where ((day(dateOfDeath) > 21 and day(dateOfDeath) < 31) and diseaseName = 'covid-19')";
   $data1_obj = query_obj($con, $data1);
   $data2_obj = query_obj($con, $data2);
   $data3_obj = query_obj($con, $data3);
   $data4_obj = query_obj($con, $data4);
   /*확진그래프 sql*/
   $data5 = "select count(*) as cnt from nation where (day(covidInspectionDate) > 0 and day(covidInspectionDate) < 8)";
   $data6 = "select count(*) as cnt from nation where (day(covidInspectionDate) > 7 and day(covidInspectionDate) < 15)";
   $data7 = "select count(*) as cnt from nation where (day(covidInspectionDate) > 14 and day(covidInspectionDate) < 22)";
   $data8 = "select count(*) as cnt from nation where (day(covidInspectionDate) > 21 and day(covidInspectionDate) < 31)";
   $data5_obj = query_obj($con, $data5);
   $data6_obj = query_obj($con, $data6);
   $data7_obj = query_obj($con, $data7);
   $data8_obj = query_obj($con, $data8);
   /*입원그래프 sql*/
   $data9 = "select count(*) as cnt from patient where (day(hospitalizationDate) > 0 and day(hospitalizationDate) < 8)";
   $data10 = "select count(*) as cnt from patient where (day(hospitalizationDate) > 7 and day(hospitalizationDate) < 15)";
   $data11 = "select count(*) as cnt from patient where (day(hospitalizationDate) > 14 and day(hospitalizationDate) < 22)";
   $data12 = "select count(*) as cnt from patient where (day(hospitalizationDate) > 21 and day(hospitalizationDate) < 31)";
   $data9_obj = query_obj($con, $data9);
   $data10_obj = query_obj($con, $data10);
   $data11_obj = query_obj($con, $data11);
   $data12_obj = query_obj($con, $data12);
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
                           <h1><a href="openpage.php" id="logo"><span style="color:#ffffff">Korea Goverment</a></h1>

                        <!-- Nav -->
                           <nav id="nav">
                              <a href="login.html">관계자용</a>
                           </nav>

                     </div>
                  </div>
               </div>
            </section>

            <section id="features">
               <div class="container">
                  <div class="row">
                     <div class="col-12">
                                                  
                        <!-- Logo -->
                           <h1><a href="openpage.php" id="logo"><span style="color:#ffffff">Korea Goverment</a></h1>

                        <!-- Nav -->
                           <nav id="nav">
                              <a href="#">오늘 날짜 : <?php echo $dateString;?> </a>
                           </nav>

                     </div>
                  </div>
               </div>
            </section>

         <!-- Features -->
            <section id="content">
               <div class="container">
                  <div class="row">
                     <div class="col-6 col-6-medium col-12-small">
                        <!-- Feature #1 -->
                        <section>
                           <section>
                              <h2>거리두기 단계</h2>
                                 <h3><?php 
                                       echo "현재 거리두기 단계는 "; 
                                       echo $obj1_1['distanceStep'];
                                       echo "단계이다.";
                                 ?></h3>
                           </section>
                           <section>
                              <h2>백신 접종 현황</h2>
                              <table class="bluetop">
                              <TR>
                                 <TH></TH><TH>1차 완료 </TH><TH>접종 완료</TH>
                              </TR>
                              <TR>
                                 <TH>화이자</TH><TD><?php  echo round(($all1_2[0]['cnt']/$all1_2_1['cnt'])*100, 2), "%" ?></TD><TD> <?php echo round(($arr1_2_2[0]['cnt']/$all1_2_1['cnt'])*100, 2), "%"?></TD>
                              </TR>
                              <TR>
                                 <TH>모더나</TH><TD><?php echo round(($all1_2[1]['cnt']/$all1_2_1['cnt'])*100,2), "%" ?></TD><TD><?php echo round(($arr1_2_2[1]['cnt']/$all1_2_1['cnt'])*100,2), "%" ?></TD>
                              </TR>
                              </TABLE>
                           </section>
                           <section>
                              <h2>코로나 발생 현황</h2>
                              <table class="bluetop">
                              <TR>
                                 <TH></TH><TH>확진자 수 </TH><TH> 사망자 수</TH><TH> 신규 입원 수</TH>
                              </TR>
                              <TR>
                                 <TH>일일</TH><TD><?php echo $arr1_3['cnt'] ?></TD><TD> <?php echo $arr1_3_2['cnt']?></TD><TD><?php echo $arr1_3_3['cnt'] ?></TD>
                              </TR>
                              <TR>
                                 <TH>주 평균</TH><TD><?php echo round($arr1_4_2['covid']/7,2) ?></TD><TD><?php echo round($arr1_4['die']/7,2) ?></TD><TD><?php echo round($arr1_4['new']/7,2) ?></TD>
                              </TR>
                              </TABLE>
                           </section>
                           <section>
                              <h2>당일 확진자 이동경로</h2>
                              <table class="bluetop">
                              <TR>
                                 <TH>확진자 번호</TH><TH> 방문한 장소</TH><TH> 방문한 시간</TH>
                              </TR>
                              <?php
                                 $number='0';
                                 $count=0;
                                 while($arr1_5 = mysqli_fetch_array($ret1_5)){
                                    if ($number != $arr1_5['pssn']){
                                       $count+=1;
                                       $number=$arr1_5['pssn'];
                                    }
                                    echo "<TR>";
                                    echo "<TH>확진자 $count</TH>";
                                    echo "<TD>".$arr1_5['visitPlace']." </TD>";
                                    echo "<TD>".$arr1_5['visitTime']."</TD>";
                                    echo "</TR>";
                                 }
                              ?>
                              </TABLE>
                           </section>
                        </section>
                     </div>
                     <div class="col-6 col-6-medium col-12-small">
                        <!-- Feature #2 -->
                           <section>
                           
                              <h2>코로나19 발생 추이</h2>
                              <p>
                              <?php
                              // 다른 파일의 사용자 정의 함수 「makeChartParts( )」를 불러옵니다.
                              require_once './make_chart_parts.php';
// 그래프의 값 
$data = array();
$data[] = array('', '사망자 수');  // 제목
$data[] = array('1주차', intval($data1_obj->cnt));
$data[] = array('2주차', intval($data2_obj->cnt));
$data[] = array('3주차', intval($data3_obj->cnt));
$data[] = array('4주차', intval($data4_obj->cnt));

// 그래프의 옵션
$options = array(
  'title'  => '<주차별 코로나 사망자 추이>',             // 그래프 제목
  'titleTextStyle' => array('fontSize' => 16),  // 제목의 스타일
  'hAxis'  => array('title' => '11월 주차',  // 가로 축 라벨
                    'titleTextStyle' => array('color' => 'black')),  // 스타일
  'vAxis'  => array('minValue' => 0, 'maxValue' => 5,  // 세로축 범위
                    'title' => '사망자 수'),              // 세로축 라벨
  'width'  => 450,  // 폭
  'height' => 350,  // 높이
  'bar'    => array('groupWidth' => '50%'),  // 바의 굵기
  'legend' => array('position' => 'top', 'alignment' => 'end'));  // 범례

// 그래프 종류
$type = 'ColumnChart';

// 그래프 그림의 JavaScript의 함수, 표시할 <div>태그의 생성
list($chart, $div) = makeChartParts($data, $options, $type);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>사망자 현황</title>
<script src="https://www.google.com/jsapi"></script>
<script>
<?php
// 그래프 그림을 위한 JavaScript의 함수를 표시합니다.
echo $chart;
?>
</script>
</head>
<body>
<div>
<?php
// 그래프를 표시할 <div> 태그를 적절한 장소에 배치합니다.
echo $div;
?>
</div>
</body>
</html>

<?php
                              // 다른 파일의 사용자 정의 함수 「makeChartParts( )」를 불러옵니다.
                              require_once './make_chart_parts.php';
// 그래프의 값 
$data11 = array();
$data11[] = array('', '확진자 수');  // 제목
$data11[] = array('1주차', intval($data5_obj->cnt));
$data11[] = array('2주차', intval($data6_obj->cnt));
$data11[] = array('3주차', intval($data7_obj->cnt));
$data11[] = array('4주차', intval($data8_obj->cnt));

// 그래프의 옵션
$options11 = array(
  'title'  => '<주차별 코로나 확진자 추이>',             // 그래프 제목
  'titleTextStyle' => array('fontSize' => 16),  // 제목의 스타일
  'hAxis'  => array('title' => '11월 주차',  // 가로 축 라벨
                    'titleTextStyle' => array('color' => 'black')),  // 스타일
  'vAxis'  => array('minValue' => 0, 'maxValue' => 15,  // 세로축 범위
                    'title' => '확진자 수'),              // 세로축 라벨
  'width'  => 450,  // 폭
  'height' => 350,  // 높이
  'bar'    => array('groupWidth' => '50%'),  // 바의 굵기
  'legend' => array('position' => 'top', 'alignment' => 'end'));  // 범례

// 그래프 종류
$type11 = 'ColumnChart';

// 그래프 그림의 JavaScript의 함수, 표시할 <div>태그의 생성
list($chart, $div) = makeChartParts($data11, $options11, $type11);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>확진자 현황</title>
<script src="https://www.google.com/jsapi"></script>
<script>
<?php
// 그래프 그림을 위한 JavaScript의 함수를 표시합니다.
echo $chart;
?>
</script>
</head>
<body>
<div>
<?php
// 그래프를 표시할 <div> 태그를 적절한 장소에 배치합니다.
echo $div;
?>
</div>
</body>
</html>
<?php
                              // 다른 파일의 사용자 정의 함수 「makeChartParts( )」를 불러옵니다.
                              require_once './make_chart_parts.php';
// 그래프의 값 
$data111 = array();
$data111[] = array('', '입원자 수');  // 제목
$data111[] = array('1주차', intval($data9_obj->cnt));
$data111[] = array('2주차', intval($data10_obj->cnt));
$data111[] = array('3주차', intval($data11_obj->cnt));
$data111[] = array('4주차', intval($data12_obj->cnt));

// 그래프의 옵션
$options111 = array(
  'title'  => '<주차별 코로나 입원자 추이>',             // 그래프 제목
  'titleTextStyle' => array('fontSize' => 16),  // 제목의 스타일
  'hAxis'  => array('title' => '11월 주차',  // 가로 축 라벨
                    'titleTextStyle' => array('color' => 'black')),  // 스타일
  'vAxis'  => array('minValue' => 0, 'maxValue' => 15,  // 세로축 범위
                    'title' => '입원자 수'),              // 세로축 라벨
  'width'  => 450,  // 폭
  'height' => 350,  // 높이
  'bar'    => array('groupWidth' => '50%'),  // 바의 굵기
  'legend' => array('position' => 'top', 'alignment' => 'end'));  // 범례

// 그래프 종류
$type111 = 'ColumnChart';

// 그래프 그림의 JavaScript의 함수, 표시할 <div>태그의 생성
list($chart, $div) = makeChartParts($data111, $options111, $type111);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>입원자 현황</title>
<script src="https://www.google.com/jsapi"></script>
<script>
<?php
// 그래프 그림을 위한 JavaScript의 함수를 표시합니다.
echo $chart;
?>
</script>
</head>
<body>
<div>
<?php
// 그래프를 표시할 <div> 태그를 적절한 장소에 배치합니다.
echo $div;
?>
</div>
</body>
</html>
                                 
                              </p>
                           </section>
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