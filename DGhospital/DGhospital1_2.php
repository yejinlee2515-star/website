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
                           <h1><a href="DGhospital.php" id="logo"><span style="color:#ffffff"> DG Medical Center</a></h1>

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
                           <h1><a href="DGhospital.php" id="logo"><span style="color:#ffffff">Korea Goverment</a></h1>

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
                        <input type="VARCHAR" name="pname" aria-label="Small" size="20" placeholder="이름 검색">      
                        <input type="VARCHAR" name="id" aria-label="Small" size="20" placeholder="주민등록번호 검색">
                        <input type="VARCHAR" name="hospitalizationDate" aria-label="Small" size="20" placeholder="입원날짜 검색">
                        <input type="VARCHAR" name="diseaseName" aria-label="Small" size="20" placeholder="병명 검색">
                        <input type="submit" value="조회하기" class="btn btn-secondary btn-number">
                        <i class="fa fa-search"></i>
                        </button>
                        </FORM>
                        </FORM>
                        <?php
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
   $currentdate=date("y-m-d");
   $bool = isset($_GET["id"]) OR isset($_GET["pname"]) OR isset($_GET["hospitalizationDate"]) OR isset($_GET["diseaseName"]);
   if($bool == FALSE)
   {
      $sql2 = "SELECT *FROM patient WHERE (hospitalName='대구병원')";
      $ret2 = mysqli_query($con, $sql2);
      echo "<br><h1> list </h1>";
      echo "<TABLE class='bluetop'>";
      echo "<TR>";
      echo "<TH>환자명</TH><TH>주민등록번호</TH><TH>나이</TH><TH>전화번호</TH><TH>주소</TH><TH>성별</TH><TH>입원일</TH><TH>퇴원일</TH><TH>사망일</TH><TH>확진날짜</TH><TH>병명</TH><TH>병원명</TH>";
        echo "<TH>수정</TH><TH>삭제</TH>";
      echo "</TR>";
   
      while($row=mysqli_fetch_array($ret2)){
         echo "<TR>";
        echo "<TD>", $row['pname'], "</TD>";
        echo "<TD>", $row['pssn'], "</TD>";
        echo "<TD>", $row['age'], "</TD>";
        echo "<TD>", $row['tel'], "</TD>";
        echo "<TD>", $row['address'], "</TD>";
       echo "<TD>", $row['gender'], "</TD>";
       echo "<TD>", $row['hospitalizationDate'], "</TD>";
       echo "<TD>", $row['dischargeDate'], "</TD>";
       echo "<TD>", $row['dateOfDeath'], "</TD>";
        echo "<TD>", $row['covidInspectionDate'], "</TD>";
       echo "<TD>", $row['diseaseName'], "</TD>";
      echo "<TD>", $row['hospitalName'], "</TD>";
       echo "<TD>", "<a href='DG_update_patient.php?pssn=", $row['pssn'], "'>수정</a></TD>";
      echo "<TD>", "<a href='DG_delete_patient.php?pssn=", $row['pssn'], "'>삭제</a></TD?"; 
      echo "</TR>";
      }
         
      mysqli_close($con);
      echo "</TABLE>";
       
      exit();
   }

?>
<?php
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
   $bool1=(isset($_GET["id"])&& $_GET["id"])?isset($_GET["id"]):NULL;
   $bool2=(isset($_GET["pname"])&& $_GET["pname"])?isset($_GET["pname"]):NULL;
   $bool3=(isset($_GET["hospitalizationDate"])&& $_GET["hospitalizationDate"])?isset($_GET["hospitalizationDate"]):NULL;
   $bool4=(isset($_GET["diseaseName"])&& $_GET["diseaseName"])?isset($_GET["diseaseName"]):NULL;
   
   if(isset($bool1)) /*id set*/
   {
      if($bool2) /*id,  pnameset*/
      {
         if($bool3) /*id,  pnameset, hospitalizationDate*/
         {
            if($bool4) /* 전체 set*/
            {
               $sql = "SELECT *FROM patient WHERE (pssn='".$_GET["id"]."' AND pname='".$_GET["pname"]."' AND hospitalizationDate='".$_GET["hospitalizationDate"]."' AND diseaseName='".$_GET["diseaseName"]."' AND (hospitalName='대구병원'))";
            }
            else /*diseaseName뺴고 다*/
            {
               $sql = "SELECT *FROM patient WHERE (pssn='".$_GET["id"]."' AND pname='".$_GET["pname"]."' AND hospitalizationDate='".$_GET["hospitalizationDate"]."' AND (hospitalName='대구병원'))";
            }
         }
         else if($bool4)
         {
            $sql = "SELECT *FROM patient WHERE (pssn='".$_GET["id"]."' AND pname='".$_GET["pname"]."' AND diseaseName='".$_GET["diseaseName"]."' AND (hospitalName='대구병원'))";
         }
         else
         {
            $sql = "SELECT *FROM patient WHERE (pssn='".$_GET["id"]."' AND pname='".$_GET["pname"]."' AND (hospitalName='대구병원'))";
         }
      }
      else /*id set, regist- unset*/
      {
         if($bool3)
         {
            if($bool4)
            {
               $sql = "SELECT *FROM patient WHERE (pssn='".$_GET["id"]."' AND hospitalizationDate='".$_GET["hospitalizationDate"]."' AND diseaseName='".$_GET["diseaseName"]."' AND (hospitalName='대구병원'))";
            }
            else
            {
               $sql = "SELECT *FROM patient WHERE (pssn='".$_GET["id"]."' AND hospitalizationDate='".$_GET["hospitalizationDate"]."' AND (hospitalName='대구병원'))";
            }
         }
         else if($bool4)
         {
            $sql = "SELECT *FROM patient WHERE (pssn='".$_GET["id"]."' AND diseaseName='".$_GET["diseaseName"]."' AND (hospitalName='대구병원'))";
         }
         else
         {
            $sql = "SELECT *FROM patient WHERE (pssn='".$_GET["id"]."' AND (hospitalName='대구병원'))";
         }
      }
      
   }
   else
   {
      if($bool2) /*re*/
      {
         if($bool3) /*va*/
         {
            if($bool4)  /*pNa*/
            {
               $sql = "SELECT *FROM patient WHERE (pname='".$_GET["pname"]."' AND hospitalizationDate='".$_GET["hospitalizationDate"]."' AND diseaseName='".$_GET["diseaseName"]."' AND (hospitalName='대구병원'))";
            }
            else 
            {
               $sql = "SELECT *FROM patient WHERE (pname='".$_GET["pname"]."' AND hospitalizationDate='".$_GET["hospitalizationDate"]."' AND (hospitalName='대구병원'))";
            }
         }
         else if($bool4)
         {
            $sql = "SELECT *FROM patient WHERE (pname='".$_GET["pname"]."' AND diseaseName='".$_GET["diseaseName"]."' AND (hospitalName='대구병원'))";
         }
         else
         {
            $sql = "SELECT *FROM patient WHERE (pname='".$_GET["pname"]."' AND (hospitalName='대구병원'))";
         }
      }
      else /*id set, regist- unset*/
      {
         if($bool3)
         {
            if($bool4)
            {
               $sql = "SELECT *FROM patient WHERE (hospitalizationDate='".$_GET["hospitalizationDate"]."' AND diseaseName='".$_GET["diseaseName"]."' AND (hospitalName='대구병원'))";
            }
            else
            {
               $sql = "SELECT *FROM patient WHERE (hospitalizationDate='".$_GET["hospitalizationDate"]."' AND (hospitalName='대구병원'))";
            }
         }
         else if($bool4)
         {
            $sql = "SELECT *FROM patient WHERE (diseaseName='".$_GET["diseaseName"]."' AND(hospitalName='대구병원'))";
         }
         else
         {
            $sql = "SELECT *FROM patient WHERE (hospitalName='대구병원')";
         }
      }
   }

   $ret = mysqli_query($con, $sql);
   if($ret){
      $count=mysqli_num_rows($ret);
   }
   else{
      echo "patient 데이터 조회 실패!!!"."<br>";
      echo "실패 원인 : ". mysqli_error($con);
      exit();
   }
   
   

   
   echo "<br><h1> 조회 결과 </h1>";
   echo "<TABLE class='bluetop'>";
   echo "<TR>";
   echo "<TH>환자명</TH><TH>주민등록번호</TH><TH>나이</TH><TH>전화번호</TH><TH>주소</TH><TH>성별</TH><TH>입원일</TH><TH>퇴원일</TH><TH>사망일</TH><TH>확진날짜</TH><TH>병명</TH><TH>병원명</TH>";
   echo "<TH>수정</TH><TH>삭제</TH>";
   echo "</TR>";
   while($row=mysqli_fetch_array($ret)){
      echo "<TR>";
        echo "<TD>", $row['pname'], "</TD>";
        echo "<TD>", $row['pssn'], "</TD>";
        echo "<TD>", $row['age'], "</TD>";
        echo "<TD>", $row['tel'], "</TD>";
        echo "<TD>", $row['address'], "</TD>";
       echo "<TD>", $row['gender'], "</TD>";
       echo "<TD>", $row['hospitalizationDate'], "</TD>";
       echo "<TD>", $row['dischargeDate'], "</TD>";
       echo "<TD>", $row['dateOfDeath'], "</TD>";
        echo "<TD>", $row['covidInspectionDate'], "</TD>";
       echo "<TD>", $row['diseaseName'], "</TD>";
      echo "<TD>", $row['hospitalName'], "</TD>";
       echo "<TD>", "<a href='DG_update_patient.php?pssn=", $row['pssn'], "'>수정</a></TD>";
      echo "<TD>", "<a href='DG_delete_patient.php?pssn=", $row['pssn'], "'>삭제</a></TD?"; 
      echo "</TR>";
   }
   
   mysqli_close($con);
   echo "</TABLE>";
   echo "<br> <a href='DGhospital1_2.php'><--초기 화면</a>";
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