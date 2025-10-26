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
						<input type="VARCHAR" name="dateOfDeath" aria-label="Small" size="20" placeholder="사망 날짜를 검색해주세요">
						<input type="VARCHAR" name="diseaseName" aria-label="Small" size="20" placeholder="병명을 검색해주세요">
						<input type="VARCHAR" name="hospitalName" aria-label="Small" size="20" placeholder="병원을 검색해주세요">
						<input type="submit" value="조회하기" class="btn btn-secondary btn-number">
                        <i class="fa fa-search"></i>
                        </button>
                        </FORM>
<?php
	$con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
	
	$bool1=(isset($_GET["pname"])&& $_GET["pname"])?isset($_GET["pname"]):NULL;
	$bool2=(isset($_GET["pssn"])&& $_GET["pssn"])?isset($_GET["pssn"]):NULL;
	$bool3=(isset($_GET["dateOfDeath"])&& $_GET["dateOfDeath"])?isset($_GET["dateOfDeath"]):NULL;
	$bool4=(isset($_GET["diseaseName"])&& $_GET["diseaseName"])?isset($_GET["diseaseName"]):NULL;
	$bool5=(isset($_GET["hospitalName"])&& $_GET["hospitalName"])?isset($_GET["hospitalName"]):NULL;
	
	if($bool5){
		if($bool1)
		{
			if($bool2) 
			{
				if($bool3) 
				{
					if($bool4) 
					{
						$sql = "SELECT *FROM patient WHERE (pname='".$_GET["pname"]."' AND pssn='".$_GET["pssn"]."' AND dateOfDeath='".$_GET["dateOfDeath"]."' AND diseaseName='".$_GET["diseaseName"]."' AND hospitalName='".$_GET["hospitalName"]."')";
					}
					else 
					{
						$sql = "SELECT *FROM patient WHERE (pname='".$_GET["pname"]."' AND pssn='".$_GET["pssn"]."' AND dateOfDeath='".$_GET["dateOfDeath"]."'AND hospitalName='".$_GET["hospitalName"]."')";
					}
				}
				else if($bool4)
				{
					$sql = "SELECT *FROM patient WHERE (pname='".$_GET["pname"]."' AND pssn='".$_GET["pssn"]."' AND diseaseName='".$_GET["diseaseName"]."'AND hospitalName='".$_GET["hospitalName"]."')";
				}
				else
				{
					$sql = "SELECT *FROM patient WHERE (pname='".$_GET["pname"]."' AND pssn='".$_GET["pssn"]."'AND hospitalName='".$_GET["hospitalName"]."')";
				}
			}
			else /*id set, regist- unset*/
			{
				if($bool3)
				{
					if($bool4)
					{
						$sql = 'SELECT *FROM patient WHERE (pname="'.$_GET["pname"].'" AND dateOfDeath="'.$_GET["dateOfDeath"].'" AND diseaseName="'.$_GET["diseaseName"].'" AND hospitalName="'.$_GET["hospitalName"].'")';
					}
					else
					{
					$sql = 'SELECT *FROM patient WHERE (pname="'.$_GET["pname"].'" AND dateOfDeath="'.$_GET["dateOfDeath"].'" AND hospitalName="'.$_GET["hospitalName"].'")';
					}
				}
				else if($bool4)
				{
					$sql = 'SELECT *FROM patient WHERE (pname="'.$_GET["pname"].'" AND diseaseName="'.$_GET["diseaseName"].'" AND hospitalName="'.$_GET["hospitalName"].'")';
				}
				else
				{
					$sql = 'SELECT *FROM patient WHERE (pname="'.$_GET["pname"].'" AND hospitalName="'.$_GET["hospitalName"].'")';
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
						$sql = 'SELECT *FROM patient WHERE (pssn="'.$_GET["pssn"].'" AND dateOfDeath="'.$_GET["dateOfDeath"].'" AND diseaseName="'.$_GET["diseaseName"].'" AND hospitalName="'.$_GET["hospitalName"].'")';
					}
					else 
					{
						$sql = 'SELECT *FROM patient WHERE (pssn="'.$_GET["pssn"].'" AND dateOfDeath="'.$_GET["dateOfDeath"].'" AND hospitalName="'.$_GET["hospitalName"].'")';
					}
				}
				else if($bool4)
				{
					$sql = 'SELECT *FROM patient WHERE (pssn="'.$_GET["pssn"].'" AND diseaseName="'.$_GET["diseaseName"].'" AND hospitalName="'.$_GET["hospitalName"].'")';
				}
				else
				{
					$sql = 'SELECT *FROM patient WHERE (pssn="'.$_GET["pssn"].'" AND hospitalName="'.$_GET["hospitalName"].'")';
				}
			}
			else /*id set, regist- unset*/
			{
				if($bool3)
				{
					if($bool4)
					{
						$sql = 'SELECT *FROM patient WHERE (dateOfDeath="'.$_GET["dateOfDeath"].'" AND diseaseName="'.$_GET["diseaseName"].'" AND hospitalName="'.$_GET["hospitalName"].'")';
					}
					else
					{
						$sql = 'SELECT *FROM patient WHERE (dateOfDeath="'.$_GET["dateOfDeath"].'" AND hospitalName="'.$_GET["hospitalName"].'")';
					}
				}
				else if($bool4)
				{
					$sql = 'SELECT *FROM patient WHERE (diseaseName="'.$_GET["diseaseName"].'" AND hospitalName="'.$_GET["hospitalName"].'")';
				}
				else
				{
					$sql = 'SELECT *FROM patient WHERE hospitalName="'.$_GET["hospitalName"].'"';
				}
			}
		}
	}
	else{
		if($bool1)
		{
			if($bool2) 
			{
				if($bool3) 
				{
					if($bool4) 
					{
						$sql = "SELECT *FROM patient WHERE (pname='".$_GET["pname"]."' AND pssn='".$_GET["pssn"]."' AND dateOfDeath='".$_GET["dateOfDeath"]."' AND diseaseName='".$_GET["diseaseName"]."')";
					}
					else 
					{
						$sql = "SELECT *FROM patient WHERE (pname='".$_GET["pname"]."' AND pssn='".$_GET["pssn"]."' AND dateOfDeath='".$_GET["dateOfDeath"]."')";
					}
				}
				else if($bool4)
				{
					$sql = "SELECT *FROM patient WHERE (pname='".$_GET["pname"]."' AND pssn='".$_GET["pssn"]."' AND diseaseName='".$_GET["diseaseName"]."')";
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
						$sql = 'SELECT *FROM patient WHERE (pname="'.$_GET["pname"].'" AND dateOfDeath="'.$_GET["dateOfDeath"].'" AND diseaseName="'.$_GET["diseaseName"].'")';
					}
					else
					{
					$sql = 'SELECT *FROM patient WHERE (pname="'.$_GET["pname"].'" AND dateOfDeath="'.$_GET["dateOfDeath"].'")';
					}
				}
				else if($bool4)
				{
					$sql = 'SELECT *FROM patient WHERE (pname="'.$_GET["pname"].'" AND diseaseName="'.$_GET["diseaseName"].'")';
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
						$sql = 'SELECT *FROM patient WHERE (pssn="'.$_GET["pssn"].'" AND dateOfDeath="'.$_GET["dateOfDeath"].'" AND diseaseName="'.$_GET["diseaseName"].'")';
					}
					else 
					{
						$sql = 'SELECT *FROM patient WHERE (pssn="'.$_GET["pssn"].'" AND dateOfDeath="'.$_GET["dateOfDeath"].'")';
					}
				}
				else if($bool4)
				{
					$sql = 'SELECT *FROM patient WHERE (pssn="'.$_GET["pssn"].'" AND diseaseName="'.$_GET["diseaseName"].'")';
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
						$sql = 'SELECT *FROM patient WHERE (dateOfDeath="'.$_GET["dateOfDeath"].'" AND diseaseName="'.$_GET["diseaseName"].'")';
					}
					else
					{
						$sql = 'SELECT *FROM patient WHERE (dateOfDeath="'.$_GET["dateOfDeath"].'")';
					}
				}
				else if($bool4)
				{
					$sql = 'SELECT *FROM patient WHERE (diseaseName="'.$_GET["diseaseName"].'")';
				}
				else
				{
					$sql = 'SELECT *FROM patient';
				}
			}
		}
	}
	
   
	$ret = mysqli_query($con, $sql);
	if($ret){
		$count=mysqli_num_rows($ret);
	}
	else{
		echo "vaccine 데이터 조회 실패!!!"."<br>";
		echo "실패 원인 : ". mysqli_error($con);
		exit();
	}

	echo "<h1> 사망자 조회 결과 </h1>";
	echo "<TABLE class='bluetop'>";
	echo "<TR>";
	echo "<TH>pname</TH><TH>pssn</TH><TH>age</TH>";
	echo "<TH>address</TH><TH>gender</TH>";
	echo "<TH>hospitalizationDate</TH><TH>dateOfDeath</TH>";
	echo "<TH>covidInspectionDate</TH>";
	echo "<TH>diseaseName</TH><TH>hospitalName</TH>";
	echo "</TR>";
   
	while($row=mysqli_fetch_array($ret)){
		if($row['dateOfDeath']=='0000-00-00'){
			continue;
		}
		echo "<TR>";
		echo "<TD>", $row['pname'], "</TD>";
		echo "<TD>", $row['pssn'], "</TD>";
		echo "<TD>", $row['age'], "</TD>";
		echo "<TD>", $row['address'], "</TD>";
		echo "<TD>", $row['gender'], "</TD>";
		echo "<TD>", $row['hospitalizationDate'], "</TD>";
		echo "<TD>", $row['dateOfDeath'], "</TD>";
		echo "<TD>", $row['covidInspectionDate'], "</TD>";
		echo "<TD>", $row['diseaseName'], "</TD>";
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