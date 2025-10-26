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
                        <h1> 조회하기 </h1>
                        <FORM METHOD="GET" ACTION="">
                        <input type="VARCHAR" name="id" aria-label="Small" size="20" placeholder="고유번호를 검색해주세요">
                  <input type="VARCHAR" name = "pName" value='화이자' aria-label="Small" size="20" placeholder="상품 이름를 검색해주세요">
                  <input type="VARCHAR" name="registrationDate" aria-label="Small" size="20" placeholder="등록 날짜를 검색해주세요">
                  <input type="VARCHAR" name="validity" aria-label="Small" size="20" placeholder="유효 날짜를 검색해주세요">
                        <input type="submit" value="조회하기" class="btn btn-secondary btn-number">
                        <i class="fa fa-search"></i>
                        </button>
                        </FORM>
                        </FORM>
                        <?php
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
   $sql4 = "SELECT * from vaccine";
   $ret4 = mysqli_query($con, $sql4);
   $sql5 = "SELECT * from `order` where type = '판매'";
   $ret5 = mysqli_query($con, $sql5);
   $stock=0;
    while($row4=mysqli_fetch_array($ret4))
    {
      if ($row4['registrationDate']<date('Y-m-d')and$row4['plannedProduction']!=0){
        $row4['totalProduction']+=$row4['plannedProduction'];
        $row4['plannedProduction']=0;
        $sql5="UPDATE vaccine SET totalProduction='".$row4['totalProduction']."', plannedProduction='".$row4['plannedProduction']."' where uniqueNumber='".$row4['uniqueNumber']."'";
        $ret5 = mysqli_query($con, $sql5);
        
     }
     if($row4['registrationDate']<date('Y-m-d') and $row4['pharmacistName']=='화이자'){
      $stock+=$row4['totalProduction'];
     }
    }
   while($row5=mysqli_fetch_array($ret5))
    {
      if ($row5['orderDate']<date('Y-m-d')and$row5['pharmacistName']=='화이자'){
         $stock-=$row5['orderQuantity'];
      }
      
    }
   echo"<h2><br>현재 재고량 : '".$stock."'</h2>";
   $currentdate=date("y-m-d");
   $bool = isset($_GET["id"]) OR isset($_GET["registrationDate"]) OR isset($_GET["validity"]) OR isset($_GET["pName"]);
   if($bool == FALSE)
   {
      $sql2 = "SELECT *FROM vaccine WHERE ('$currentdate'>registrationDate) AND (pharmacistName='화이자')";
      $ret2 = mysqli_query($con, $sql2);
      echo "<br><h1> 생산된 백신 </h1>";
      echo "<TABLE class='bluetop'>";
      echo "<TR>";
      echo "<TH>UniqueNumber</TH><TH>ProductName</TH><TH>RegistraionDate</TH><TH>Validity</TH><TH>TotalProduction</TH>";
      echo "<TH>수정</TH><TH>삭제</TH>";
      echo "</TR>";
   
      while($row=mysqli_fetch_array($ret2)){
         echo "<TR>";
         echo "<TD>", $row['uniqueNumber'], "</TD>";
         echo "<TD>", $row['productName'], "</TD>";
         echo "<TD>", $row['registrationDate'], "</TD>";
         echo "<TD>", $row['validity'], "</TD>";
         echo "<TD>", $row['totalProduction'], "</TD>";
         echo "<TD>", "<a href='update_pfizer.php?uniqueNumber=", $row['uniqueNumber'], "'>수정</a></TD>";
         echo "<TD>", "<a href='delete_pfizer.php?uniqueNumber=", $row['uniqueNumber'], "'>삭제</a></TD?"; 
         echo "</TR>";
      }
   
      mysqli_close($con);
      echo "</TABLE>";
      
      
      echo "<br> <a href='pfizer.php'><--초기 화면</a>";
       
      exit();
   }
?>
<?php
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
   
   $bool1=(isset($_GET["id"])&& $_GET["id"])?isset($_GET["id"]):NULL;
   $bool2=(isset($_GET["registrationDate"])&& $_GET["registrationDate"])?isset($_GET["registrationDate"]):NULL;
   $bool3=(isset($_GET["validity"])&& $_GET["validity"])?isset($_GET["validity"]):NULL;
   $bool4=(isset($_GET["pName"])&& $_GET["pName"])?isset($_GET["pNamed"]):NULL;
   
   if(isset($bool1)) /*id set*/
   {
      if($bool2) /*id,  registrationDateset*/
      {
         if($bool3) /*id,  registrationDateset, validity*/
         {
            if($bool4) /* 전체 set*/
            {
               $sql = "SELECT *FROM vaccine WHERE (uniqueNumber='".$_GET["id"]."' AND registrationDate='".$_GET["registrationDate"]."' AND validity='".$_GET["validity"]."' AND pharmacistName='".$_GET["pName"]."')";
            }
            else /*pname뺴고 다*/
            {
               $sql = "SELECT *FROM vaccine WHERE (uniqueNumber='".$_GET["id"]."' AND registrationDate='".$_GET["registrationDate"]."' AND validity='".$_GET["validity"]."')";
            }
         }
         else if($bool4)
         {
            $sql = "SELECT *FROM vaccine WHERE (uniqueNumber='".$_GET["id"]."' AND registrationDate='".$_GET["registrationDate"]."' AND pharmacistName='".$_GET["pName"]."')";
         }
         else
         {
            $sql = "SELECT *FROM vaccine WHERE (uniqueNumber='".$_GET["id"]."' AND registrationDate='".$_GET["registrationDate"]."')";
         }
      }
      else /*id set, regist- unset*/
      {
         if($bool3)
         {
            if($bool4)
            {
               $sql = 'SELECT *FROM vaccine WHERE (uniqueNumber="'.$_GET["id"].'" AND validity="'.$_GET["validity"].'" AND pharmacistName="'.$_GET["pName"].'")';
            }
            else
            {
               $sql = 'SELECT *FROM vaccine WHERE (uniqueNumber="'.$_GET["id"].'" AND validity="'.$_GET["validity"].'")';
            }
         }
         else if($bool4)
         {
            $sql = 'SELECT *FROM vaccine WHERE (uniqueNumber="'.$_GET["id"].'" AND pharmacistName="'.$_GET["pName"].'")';
         }
         else
         {
            $sql = 'SELECT *FROM vaccine WHERE (uniqueNumber="'.$_GET["id"].'")';
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
               $sql = 'SELECT *FROM vaccine WHERE (registrationDate="'.$_GET["registrationDate"].'" AND validity="'.$_GET["validity"].'" AND pharmacistName="'.$_GET["pName"].'")';
            }
            else 
            {
               $sql = 'SELECT *FROM vaccine WHERE (registrationDate="'.$_GET["registrationDate"].'" AND validity="'.$_GET["validity"].'")';
            }
         }
         else if($bool4)
         {
            $sql = 'SELECT *FROM vaccine WHERE (registrationDate="'.$_GET["registrationDate"].'" AND pharmacistName="'.$_GET["pName"].'")';
         }
         else
         {
            $sql = 'SELECT *FROM vaccine WHERE (registrationDate="'.$_GET["registrationDate"].'")';
         }
      }
      else /*id set, regist- unset*/
      {
         if($bool3)
         {
            if($bool4)
            {
               $sql = 'SELECT *FROM vaccine WHERE (validity="'.$_GET["validity"].'" AND pharmacistName="'.$_GET["pName"].'")';
            }
            else
            {
               $sql = 'SELECT *FROM vaccine WHERE (validity="'.$_GET["validity"].'")';
            }
         }
         else if($bool4)
         {
            $sql = 'SELECT *FROM vaccine WHERE (pharmacistName="'.$_GET["pName"].'")';
         }
         else
         {
            $sql = 'SELECT *FROM vaccine';
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
   
   
   
   echo "<br><h1> 조회 결과 </h1>";
   echo "<TABLE class='bluetop'>";
   echo "<TR>";
   echo "<TH>UniqueNumber</TH><TH>ProductName</TH><TH>RegistraionDate</TH><TH>Validity</TH><TH>TotalProduction</TH>";
   echo "<TH>수정</TH><TH>삭제</TH>";
   echo "</TR>";
   
   while($row=mysqli_fetch_array($ret)){
      if($row['pharmacistName']=='화이자'){
         continue;
      }
      echo "<TR>";
      echo "<TD>", $row['uniqueNumber'], "</TD>";
      echo "<TD>", $row['productName'], "</TD>";
      echo "<TD>", $row['registrationDate'], "</TD>";
      echo "<TD>", $row['validity'], "</TD>";
      echo "<TD>", $row['totalProduction'], "</TD>";
      echo "<TD>", "<a href='update_pfizer.php?uniqueNumber=", $row['uniqueNumber'], "'>수정</a></TD>";
      echo "<TD>", "<a href='delete_pfizer.php?uniqueNumber=", $row['uniqueNumber'], "'>삭제</a></TD?"; 
      echo "</TR>";
   }
   
   mysqli_close($con);
   echo "</TABLE>";
   echo "<br> <a href='pfizer.php'><--초기 화면</a>";
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