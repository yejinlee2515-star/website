<?php
// 다른 파일의 사용자 정의 함수 「makeChartParts( )」를 불러옵니다.
require_once './make_chart_parts.php';

// 그래프의 값
$data = array();
$data[] = array('', '가격');  // 제목
$data[] = array('짜장 라면', 590);
$data[] = array('매운 라면', 750);
$data[] = array('보통 라면', 630);

// 그래프의 옵션
$options = array(
  'title'  => '그래프를 생성하고 싶을 때',             // 그래프 제목
  'titleTextStyle' => array('fontSize' => 16),  // 제목의 스타일
  'hAxis'  => array('title' => '좋아하는 라면',  // 가로 축 라벨
                    'titleTextStyle' => array('color' => 'blue')),  // 스타일
  'vAxis'  => array('minValue' => 0, 'maxValue' => 800,  // 세로축 범위
                    'title' => '단위: 원'),              // 세로축 라벨
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
<title>그래프를 생성하고 싶을 때</title>
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