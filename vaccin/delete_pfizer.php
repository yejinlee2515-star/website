<?php $dateString = date("Y-m-d");
$con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
$sql = "SELECT *FROM vaccine WHERE uniqueNumber='".$_GET['uniqueNumber']."'";

$ret = mysqli_query($con, $sql);
if($ret){
    $count = mysqli_num_rows($ret);
    if($count==0){
        echo $_GET['uniqueNumber']."의 백신이 없습니다."."<br>";
        echo "<br> <a href='pfizer.html'><--초기 화면</a>";
        exit();
    }
}
else {
    echo "데이터 조회 실패"."<br>";
    echo "실패 원인 :".mysqli_error($con);
    echo "<br> <a href='pfizer.html'><--초기 화면</a>";
    exit();
}
$row=mysqli_fetch_array($ret);
$uniqueNumber=$row['uniqueNumber'];
$registrationDate=$row['registrationDate'];
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
      <br><br><h1> 정보 삭제 </h1>
<FORM METHOD="post" ACTION="delete_result_pfizer.php">
	고유번호 : <INPUT TYPE = "text" NAME="uniqueNumber" VALUE=<?php echo $uniqueNumber ?> READONLY> 
	<br>
	생산날짜 : <INPUT TYPE = "text" NAME="registrationDate" VALUE=<?php echo $registrationDate ?> READONLY> 
	<br>
	<BR><BR>
	위 정보를 삭제하시겠습니까?
	<INPUT TYPE = "submit" VALUE="회원 삭제">
</FORM>
      </div>

      <!-- Scripts -->
         <script src="assets/js/jquery.min.js"></script>
         <script src="assets/js/browser.min.js"></script>
         <script src="assets/js/breakpoints.min.js"></script>
         <script src="assets/js/util.js"></script>
         <script src="assets/js/main.js"></script>

   </body>
</html>