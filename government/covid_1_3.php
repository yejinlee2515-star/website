
<html>
   <head>
      <title>Covid19</title>
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
   <body class="subpage">
      <div id="page-wrapper">

      <!-- Header -->
            <section id="header">
               <div class="container">
                  <div class="row">
                     <div class="col-12">

                        <!-- Logo -->
                           <h1><a href="index.html" id="logo"><span style="color:#ffffff">Korea Government</a></h1>

                        <!-- Nav -->
                           <nav id="nav">
                              <a href="index.html">Home</a>
                           </nav>

                     </div>
                  </div>
               </div>
            </section>
         <!-- Content -->
            <section id="content">
               <div class="container">
                  <div class="row">
                     <div class="col-12 col-12-medium">
						<h1> 조회하기 </h1>
                        <FORM METHOD="GET" ACTION="">
                        <input type="VARCHAR" name="pname" aria-label="Small" size="20" placeholder="환자 이름을 검색해주세요">
						<input type="VARCHAR" name = "pssn" aria-label="Small" size="20" placeholder="환자 고유 번호를 검색해주세요">
						<input type="VARCHAR" name="covidInspectionDate" aria-label="Small" size="20" placeholder="확진 날짜를 검색해주세요">
						<input type="VARCHAR" name="visitPlace" aria-label="Small" size="20" placeholder="방문 장소을 검색해주세요">
                        <input type="submit" value="조회하기" class="btn btn-secondary btn-number">
                        <i class="fa fa-search"></i>
                        </button>
                        </FORM>
                        <!-- Main Content -->
                        <?php
						$con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
						
						
	$pname=(isset($_GET["pname"]))?$_GET["pname"]:NULL;
	$pssn=(isset($_GET["pssn"]))?$_GET["pssn"]:NULL;
	$covidInspectionDate=(isset($_GET["covidInspectionDate"]))?$_GET["covidInspectionDate"]:NULL;
	$visitPlace=(isset($_GET["visitPlace"]))?$_GET["visitPlace"]:NULL;
	
	
	$sql = "select path.*, patient.address,patient.age,patient.covidInspectionDate,patient.hospitalName,patient.pname from path inner join patient where path.pssn = patient.pssn order by pssn";
	$ret = mysqli_query($con, $sql);
	
    echo "<h1> 코로나 확진자 이동경로 조회 </h1>";
    echo "<TABLE class='bluetop'>";
   echo "<TR>";
   echo "<TH>pname</TH><TH>pssn</TH><TH>age</TH>";
   echo "<TH>address</TH><TH>covidInspectionDate</TH>";
   echo "<TH>hospitalName</TH><TH>visitPlace</TH>";
   echo "<TH>visitTime</TH>";
   
   while($row=mysqli_fetch_array($ret)){
	   
		if($row['covidInspectionDate']==date("0000-00-00")){
			continue;
			}
		if($pname!=NULL){
			if($row['pname']!=$pname){
			continue;
			}
		}
		if($pssn!=NULL){
			if($row['pssn']!=$pssn){
			continue;
			}
		}
		if($covidInspectionDate!=NULL){
			if($row['covidInspectionDate']!=$covidInspectionDate){
			continue;
			}
		}
		if($visitPlace!=NULL){
			if($row['visitPlace']!=$visitPlace){
			continue;
			}
		}
		
	
      echo "<TR>";
      echo "<TD>".$row['pname']."</TD>";
      echo "<TD>", $row['pssn'], "</TD>";
      echo "<TD>", $row['age'], "</TD>";
      echo "<TD>", $row['address'], "</TD>";
      echo "<TD>", $row['covidInspectionDate'], "</TD>";
      echo "<TD>", $row['hospitalName'], "</TD>";
      echo "<TD>", $row['visitPlace'], "</TD>";
      echo "<TD>", $row['visitTime'], "</TD>";
      echo "</TR>";
    };
   
   mysqli_close($con);
   echo "</TABLE>";
   echo "<br> <a href='covid.php'><--이전 화면</a>";
        
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