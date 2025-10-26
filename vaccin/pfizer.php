<html>
	<head>
		<title>Halcyonic by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
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
									<nav id="nav">		
									<br>
									    <a href="vaccin_come.html"> 제약사선택페이지</a>
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
										<h2>▶생산된 백신 재고량 조회</h2>
										<a href = 'select_pfizer.php'> -> 조회 바로가기 </a><br>
										
										<br>
										<h2>▶생산 예정 백신 정보조회</h2>
										<a href = 'select_planned_pfizer.php'> -> 조회 바로가기 </a><br>
										
										<br>
										<h2>▶유효기간 조회 및 폐기</h2>
										<a href = 'waste_pfizer.php'> -> 조회 바로가기 </a><br>
										
										<br>
										<h2>▶백신 생산 계획 등록</h2>
										<a href = 'product_plan_pfizer.php'> -> 등록 바로가기 </a>
										
									</section>

							</div>

							<div class="col-6 col-6-medium col-12-small">

								<!-- Feature #2 -->
									<section>
										<h2>▶분기별 생산 계획</h2>
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
    $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
   
    $sql = "SELECT *FROM vaccine";
                                 
    $first="SELECT COUNT(*) as cnt FROM vaccine WHERE registrationDate BETWEEN ('2021-11-01') AND ('2021-11-07') AND pharmacistName='화이자'";
    $sec="SELECT COUNT(*) as cnt FROM vaccine WHERE registrationDate BETWEEN ('2021-11-08') AND ('2021-11-14') AND pharmacistName='화이자'";
    $third="SELECT COUNT(*) as cnt FROM vaccine WHERE registrationDate BETWEEN ('2021-11-15') AND ('2021-11-21') AND pharmacistName='화이자'";
    $fourth="SELECT COUNT(*)  as cnt FROM vaccine WHERE registrationDate BETWEEN ('2021-11-22') AND ('2021-11-28') AND pharmacistName='화이자'";
	$fifth="SELECT COUNT(*)  as cnt FROM vaccine WHERE registrationDate BETWEEN ('2021-11-29') AND ('2021-11-30') AND pharmacistName='화이자'";
   
    $first_q=query_obj($con, $first);
    $sec_q=query_obj($con, $sec);
    $third_q=query_obj($con, $third);
    $fourth_q=query_obj($con, $fourth);
	$fifth_q=query_obj($con, $fifth);
   
                              
 // 다른 파일의 사용자 정의 함수 「makeChartParts( )」를 불러옵니다.
require_once './make_chart_parts.php';

// 그래프의 값
$data = array();
$data[] = array('', '백신 수');  // 제목
$data[] = array('1주차', intval($first_q->cnt));
$data[] = array('2주차', intval($sec_q->cnt));
$data[] = array('3주차', intval($third_q->cnt));
$data[] = array('4주차', intval($fourth_q->cnt));
$data[] = array('5주차', intval($fifth_q->cnt));


// 그래프의 옵션
$options = array(
  'titleTextStyle' => array('fontSize' => 16),  // 제목의 스타일
  'hAxis'  => array('title' => '월(달)',  // 가로 축 라벨
                    'titleTextStyle' => array('color' => 'black')),  // 스타일
  'vAxis'  => array('minValue' => 0, 'maxValue' => 15,  // 세로축 범위
                    'title' => '백신 생산량'),              // 세로축 라벨
  'width'  => 500,  // 폭
  'height' => 400,  // 높이
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