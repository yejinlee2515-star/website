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
                        <input type="VARCHAR" name="hospitalName" value="영남대병원" aria-label="Small" size="20" placeholder="목적지 검색" readonly>      
                        <input type="VARCHAR" name="vaccineType" aria-label="Small" size="20" placeholder="백신종류 검색">
                        <input type="VARCHAR" name="supplyDate" aria-label="Small" size="20" placeholder="공급날짜 검색">
                        <input type="submit" value="조회하기" class="btn btn-secondary btn-number"> <Br><Br>
                        <i class="fa fa-search"></i>
                        </button>
                        </FORM>
                        </FORM>
                        <?php
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
   $currentdate=date("y-m-d");
   
   $bool = isset($_GET["hospitalName"]) OR isset($_GET["vaccineType"]) OR isset($_GET["supplyDate"]);
   if($bool == FALSE)
   {
      $sql2 = "SELECT * FROM supply where type='공급'";
      $ret2 = mysqli_query($con, $sql2);
      echo "<TABLE class='bluetop'>";
      echo "<TR>";
      echo "<TH>출발지</TH><TH>목적지</TH><TH>백신종류</TH><TH>백신공급날짜</TH><TH>백신공급수량</TH>";
      echo "</TR>";
   
      while($row=mysqli_fetch_array($ret2)){
        if($row['hospitalName']!='영남대병원'){
           continue;
        }
         echo "<TR>";
        echo "<TD>", $row['country'], "</TD>";
        echo "<TD>", $row['hospitalName'], "</TD>";
        echo "<TD>", $row['vaccineType'], "</TD>";
       echo "<TD>", $row['supplyDate'], "</TD>";
       echo "<TD>", $row['amount'], "</TD>";
      echo "</TR>";
      }
         
      mysqli_close($con);
      echo "</TABLE>";
       
      exit();
   }

?>
<?php
   $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
   $bool1=(isset($_GET["hospitalName"])&& $_GET["hospitalName"])?isset($_GET["hospitalName"]):NULL;
   $bool2=(isset($_GET["vaccineType"])&& $_GET["vaccineType"])?isset($_GET["vaccineType"]):NULL;
   $bool3=(isset($_GET["supplyDate"])&& $_GET["supplyDate"])?isset($_GET["supplyDate"]):NULL;
   
   if($bool1){
      if($bool2){
         if($bool3){
           $sql="SELECT * FROM supply WHERE hospitalName='".$_GET['hospitalName']."' AND vaccineType='".$_GET['vaccineType']."' AND supplyDate='".$_GET['supplyDate']."' AND type='공급'";
         }
         else{
            $sql="SELECT * FROM supply WHERE hospitalName='".$_GET['hospitalName']."' AND vaccineType='".$_GET['vaccineType']."' AND type='공급'";
         }
      }
      else{
         if($bool3){
            $sql="SELECT * FROM supply WHERE hospitalName='".$_GET['hospitalName']."' AND supplyDate='".$_GET['supplyDate']."'AND type='공급'";
         }
         else{
            $sql="SELECT * FROM supply WHERE hospitalName='".$_GET['hospitalName']."'AND type='공급'";
         }
      }
   }
   else{
      if($bool2){
         if($bool3){
            $sql="SELECT * FROM supply WHERE vaccineType='".$_GET['vaccineType']."' AND supplyDate='".$_GET['supplyDate']."'AND type='공급'";
         }
         else{
            $sql="SELECT * FROM supply WHERE vaccineType='".$_GET['vaccineType']."'AND type='공급'";
         }
      }
      else{
         if($bool3){
            $sql="SELECT * FROM supply WHERE supplyDate='".$_GET['supplyDate']."'AND type='공급'";
         }
         else{
            $sql="SELECT * FROM supply AND type='공급'";
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
      echo "<TABLE class='bluetop'>";
      echo "<TR>";
      echo "<TH>출발지</TH><TH>목적지</TH><TH>백신종류</TH><TH>백신공급날짜</TH><TH>백신공급수량</TH>";
      echo "</TR>";
   
      while($row=mysqli_fetch_array($ret)){
          if($row['country']=="대한민국"){
              $row['country']='정부';
          }
         echo "<TR>";
        echo "<TD>", $row['country'], "</TD>";
        echo "<TD>", $row['hospitalName'], "</TD>";
        echo "<TD>", $row['vaccineType'], "</TD>";
       echo "<TD>", $row['supplyDate'], "</TD>";
       echo "<TD>", $row['amount'], "</TD>";
      echo "</TR>";
      }
   echo "<br> <a href='YNUhospital2_3.php'><--초기 화면</a>";
   mysqli_close($con);
   echo "</TABLE>";
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