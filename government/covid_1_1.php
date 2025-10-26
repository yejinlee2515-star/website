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
                           <h1><a href="index.html" id="logo"><span style="color:#ffffff">Korea Government</a></h1>

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
                           <h1><a href="index.html" id="logo"><span style="color:#ffffff">Korea Government</a></h1>

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
						<h1> 조회하기 </h1>
                        <FORM METHOD="GET" ACTION="">
                        <input type="VARCHAR" name="pname" aria-label="Small" size="20" placeholder="환자 이름을 검색해주세요">
						<input type="VARCHAR" name = "pssn" aria-label="Small" size="20" placeholder="주민등록번호를 검색해주세요">
						<input type="VARCHAR" name="hospitalizationDate" aria-label="Small" size="20" placeholder="입원 날짜를 검색해주세요">
						<input type="VARCHAR" name="hospitalName" aria-label="Small" size="20" placeholder="병원 이름을 검색해주세요">
                        <input type="submit" value="조회하기" class="btn btn-secondary btn-number">
                        <i class="fa fa-search"></i>
                        </button>
                        </FORM>
<?php
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
   
   $bool1=(isset($_GET["pname"])&& $_GET["pname"])?isset($_GET["pname"]):NULL;
   $bool2=(isset($_GET["pssn"])&& $_GET["pssn"])?isset($_GET["pssn"]):NULL;
   $bool3=(isset($_GET["hospitalizationDate"])&& $_GET["hospitalizationDate"])?isset($_GET["hospitalizationDate"]):NULL;
   $bool4=(isset($_GET["hospitalName"])&& $_GET["hospitalName"])?isset($_GET["hospitalName"]):NULL;
   
   if($bool1)
   {
      if($bool2) 
      {
         if($bool3) 
         {
            if($bool4) 
            {
               $sql = "SELECT *FROM patient WHERE (pname='".$_GET["pname"]."' AND pssn='".$_GET["pssn"]."' AND hospitalizationDate='".$_GET["hospitalizationDate"]."' AND hospitalName='".$_GET["hospitalName"]."')";
            }
            else 
            {
               $sql = "SELECT *FROM patient WHERE (pname='".$_GET["pname"]."' AND pssn='".$_GET["pssn"]."' AND hospitalizationDate='".$_GET["hospitalizationDate"]."')";
            }
         }
         else if($bool4)
         {
            $sql = "SELECT *FROM patient WHERE (pname='".$_GET["pname"]."' AND pssn='".$_GET["pssn"]."' AND hospitalName='".$_GET["hospitalName"]."')";
         }
         else
         {
            $sql = "SELECT *FROM patient WHERE (pname='".$_GET["pname"]."' AND pssn='".$_GET["pssn"]."')";
         }
      }
      else /*id set, regist- unset*/
      {
         if($bool3)
         {
            if($bool4)
            {
               $sql = 'SELECT *FROM patient WHERE (pname="'.$_GET["pname"].'" AND hospitalizationDate="'.$_GET["hospitalizationDate"].'" AND hospitalName="'.$_GET["hospitalName"].'")';
            }
            else
            {
               $sql = 'SELECT *FROM patient WHERE (pname="'.$_GET["pname"].'" AND hospitalizationDate="'.$_GET["hospitalizationDate"].'")';
            }
         }
         else if($bool4)
         {
            $sql = 'SELECT *FROM patient WHERE (pname="'.$_GET["pname"].'" AND hospitalName="'.$_GET["hospitalName"].'")';
         }
         else
         {
            $sql = 'SELECT *FROM patient WHERE (pname="'.$_GET["pname"].'")';
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
               $sql = 'SELECT *FROM patient WHERE (pssn="'.$_GET["pssn"].'" AND hospitalizationDate="'.$_GET["hospitalizationDate"].'" AND hospitalName="'.$_GET["hospitalName"].'")';
            }
            else 
            {
               $sql = 'SELECT *FROM patient WHERE (pssn="'.$_GET["pssn"].'" AND hospitalizationDate="'.$_GET["hospitalizationDate"].'")';
            }
         }
         else if($bool4)
         {
            $sql = 'SELECT *FROM patient WHERE (pssn="'.$_GET["pssn"].'" AND hospitalName="'.$_GET["hospitalName"].'")';
         }
         else
         {
            $sql = 'SELECT *FROM patient WHERE (pssn="'.$_GET["pssn"].'")';
         }
      }
      else /*id set, regist- unset*/
      {
         if($bool3)
         {
            if($bool4)
            {
               $sql = 'SELECT *FROM patient WHERE (hospitalizationDate="'.$_GET["hospitalizationDate"].'" AND hospitalName="'.$_GET["hospitalName"].'")';
            }
            else
            {
               $sql = 'SELECT *FROM patient WHERE (hospitalizationDate="'.$_GET["hospitalizationDate"].'")';
            }
         }
         else if($bool4)
         {
            $sql = 'SELECT *FROM patient WHERE (hospitalName="'.$_GET["hospitalName"].'")';
         }
         else
         {
            $sql = 'SELECT *FROM patient';
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

   echo "<h1> 확진자 조회 결과 </h1>";
   echo "<TABLE class='bluetop'>";
   echo "<TR>";
   echo "<TH>pname</TH><TH>pssn</TH><TH>age</TH>";
   echo "<TH>tel</TH><TH>address</TH>";
   echo "<TH>gender</TH><TH>hospitalizationDate</TH>";
   echo "<TH>dischargeDate</TH><TH>dateOfDeath</TH>";
   echo "<TH>covidInspectionDate</TH><TH>hospitalName</TH>";
   echo "</TR>";
   
   while($row=mysqli_fetch_array($ret)){
      $d1 = $row['dateOfDeath'];
      $d2 = $row['dischargeDate'];
      $d3 = $row['hospitalizationDate'];
	  $d4 = $row['covidInspectionDate'];
      if ($d1 == '0000-00-00'){
         $d1 = 'X';
      }
      if ($d2 == '0000-00-00'){
         $d2 = 'X';
      }
      if ($d3 == '0000-00-00'){
         $d3 = 'X';
      }
	  if($d4=='0000-00-00'){
		   continue;
	   }

      echo "<TR>";
      echo "<TD>", $row['pname'], "</TD>";
      echo "<TD>", $row['pssn'], "</TD>";
      echo "<TD>", $row['age'], "</TD>";
      echo "<TD>", $row['tel'], "</TD>";
      echo "<TD>", $row['address'], "</TD>";
      echo "<TD>", $row['gender'], "</TD>";
      echo "<TD>", $d3, "</TD>";
      echo "<TD>", $d2, "</TD>";
      echo "<TD>", $d1, "</TD>";
      echo "<TD>", $row['covidInspectionDate'], "</TD>";
      echo "<TD>", $row['hospitalName'], "</TD>"; 
      echo "</TR>";
    };
   
   mysqli_close($con);
   echo "</TABLE>";
   echo "<br> <a href='covid.html'><--이전 화면</a>";
?>    

                    
                        </div>       
                    </div>
                </div>
 

      </div>

      <!-- Scripts -->
         <script src="assets/js/jquery.min.js"></script>
         <script src="assets/js/browser.min.js"></script>
         <script src="assets/js/breakpoints.min.js"></script>
         <script src="assets/js/util.js"></script>
         <script src="assets/js/main.js"></script>

   </body>
</html>