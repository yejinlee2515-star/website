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
      border: 1px solid #hospitalName;
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
                           <h1><a href="YNUhospital.php" id="logo"><span style="color:#ffffff">YU Medical Center</a></h1>

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
                           <h1><a href="YNUhospital.php" id="logo"><span style="color:#ffffff">Korea Goverment</a></h1>

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
                        <h1> ▶조회하기 </h1>
                        <FORM METHOD="GET" ACTION="">
                        <input type="VARCHAR" name="rnum" aria-label="Small" size="20" placeholder="접종번호 검색">
                  <input type="VARCHAR" name="name" aria-label="Small" size="20" placeholder="이름 검색">                  
                        <input type="VARCHAR" name="ssn" aria-label="Small" size="20" placeholder="주민등록번호 검색">
                        <input type="VARCHAR" name="date" aria-label="Small" size="20" placeholder="접종일 검색">
                        <input type="submit" value="조회하기" class="btn btn-secondary btn-number">
                        <i class="fa fa-search"></i>
                        </button>
                        </FORM>
                        </FORM>
                        
<?php
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
   $bool1=(isset($_GET["rnum"])&& $_GET["rnum"])?($_GET["rnum"]):NULL;
   $bool2=(isset($_GET["name"])&& $_GET["name"])?($_GET["name"]):NULL;
   $bool3=(isset($_GET["ssn"])&& $_GET["ssn"])?($_GET["ssn"]):NULL;
   $bool4=(isset($_GET["date"])&& $_GET["date"])?($_GET["date"]):NULL;
   
   $sql = "SELECT reservation.*, nation.name FROM reservation inner join nation WHERE (nation.ssn=reservation.ssn AND reservation.hname='영남대병원')";
     
   $ret = mysqli_query($con, $sql);
  
     echo "<br><h1> list </h1>";
      echo "<TABLE class='bluetop'>";
      echo "<TR>";
      echo "<TH>접종번호</TH><TH>이름</TH><TH>주민등록번호</TH><TH>1차/2차</TH><TH>접종일</TH><TH>백신종류</TH><TH>병원명</TH>";
      echo "<TH>수정</TH><TH>삭제</TH>";
      echo "</TR>";
   while($row=mysqli_fetch_array($ret)){
      if($bool1!=NULL){
         if($bool1 != $row['rnum']){
            continue;
         }
      }
      if($bool2!=NULL){
         if($bool2 != $row['name']){
            continue;
         }
      }
      if($bool3!=NULL){
         if($bool3 != $row['date']){
            continue;
         }
      }
      if($bool4!=NULL){
         if($bool4 != $row['rnum']){
            continue;
         }
      }
        echo "<TR>";
        echo "<TD>", $row['rnum'], "</TD>";
      echo "<TD>", $row['name'], "</TD>";
        echo "<TD>", $row['ssn'], "</TD>";
      echo "<TD>", $row['degree'], "</TD>";
        echo "<TD>", $row['date'], "</TD>";
        echo "<TD>", $row['vaccinetype'], "</TD>";
        echo "<TD>", $row['hname'], "</TD>";
        echo "<TD>", "<a href='YNU_1_4_1.php?ssn=", $row['ssn'], "'>수정</a></TD>";
        echo "<TD>", "<a href='YNU_1_4_2.php?ssn=", $row['ssn'], "'>삭제</a></TD?"; 
        echo "</TR>";
   }
   
   if($ret) {
   }
   else {
      echo "요청 등록에 실패하였습니다."."<br>";
      echo "실패 원인 :".mysqli_error($con);
   } 
   
   mysqli_close($con);
   echo "</TABLE>";
   echo "<br> <a href='YNUhospital1_4.php'><--초기 화면</a>";
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