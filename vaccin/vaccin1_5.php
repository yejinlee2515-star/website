<?php 
    $dateString = date("Y-m-d");
    $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
   
    $sql = "SELECT * FROM supply where type = '공급'";
   $sql1 = "SELECT * FROM `order` where type = '판매'";
   $ret1 = mysqli_query($con, $sql1);
    if($ret1){
        $count=mysqli_num_rows($ret1);
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
    $p_stock=0;
    $m_stock=0;
    while($row1=mysqli_fetch_array($ret1))
    {
      if ($row1['orderDate'] < date('Y-m-d') and ($row1['pharmacistName']=='화이자')){
         $p_stock = $p_stock + $row1['orderQuantity'];
      }
      if ($row1['orderDate'] < date('Y-m-d') and ($row1['pharmacistName']=='모더나')){
         $m_stock = $m_stock + $row1['orderQuantity'];
      }
    }
    while($row=mysqli_fetch_array($ret)){
      if($row['supplyDate']<date('Y-m-d')and($row['vaccineType']=='화이자')){
         $p_stock=$p_stock-$row['amount'];
      }
      if($row['supplyDate']<date('Y-m-d')and($row['vaccineType']=='모더나')){
         $m_stock=$m_stock-$row['amount'];
      }
   }

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
                           <h1><a href="vaccin.html" id="logo"><span style="color:#ffffff">Korea Goverment</a></h1>

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
                           <h1><a href="vaccin.html" id="logo"><span style="color:#ffffff">Korea Goverment</a></h1>

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
                        <?php echo "<a href='vaccin.html'> 이전 화면</a><br>"; ?>
                  <h1> 조회하기 </h1>
                        <FORM METHOD="GET" ACTION="">
                        <input type="VARCHAR" name="supplyNumber" aria-label="Small" size="20" placeholder="공급 번호를 검색해주세요">
                  <input type="VARCHAR" name = "supplyDate" aria-label="Small" size="20" placeholder="공급 날짜를 검색해주세요">
                  <input type="VARCHAR" name="vaccineType" aria-label="Small" size="20" placeholder="백신 종류를 검색해주세요">
                  <input type="VARCHAR" name="hospitalName" aria-label="Small" size="20" placeholder="병원 이름을 검색해주세요">
                        <input type="submit" value="조회하기" class="btn btn-secondary btn-number">
                        <i class="fa fa-search"></i>
                        </button>
                        </FORM>
                        <h2><br><?php echo "현재 화이자 재고량 : '".$p_stock."'" ?></h2>
                        <h2><?php echo "현재 모더나 재고량 : '".$m_stock."'" ?></h2>
                        <?php
                  $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
   
   $bool1=(isset($_GET["supplyNumber"])&& $_GET["supplyNumber"])?isset($_GET["supplyNumber"]):NULL;
   $bool2=(isset($_GET["supplyDate"])&& $_GET["supplyDate"])?isset($_GET["supplyDate"]):NULL;
   $bool3=(isset($_GET["vaccineType"])&& $_GET["vaccineType"])?isset($_GET["vaccineType"]):NULL;
   $bool4=(isset($_GET["hospitalName"])&& $_GET["hospitalName"])?isset($_GET["hospitalName"]):NULL;
   if(isset($bool1))
   {
      if($bool2) 
      {
         if($bool3) 
         {
            if($bool4) 
            {
               $sql = "SELECT *FROM supply WHERE (supplyNumber='".$_GET["supplyNumber"]."' AND supplyDate='".$_GET["supplyDate"]."' AND vaccineType='".$_GET["vaccineType"]."' AND hospitalName='".$_GET["hospitalName"]."' AND type='공급')";
            }
            else 
            {
               $sql = "SELECT *FROM supply WHERE (supplyNumber='".$_GET["supplyNumber"]."' AND supplyDate='".$_GET["supplyDate"]."' AND vaccineType='".$_GET["vaccineType"]."'AND type='공급')";
            }
         }
         else if($bool4)
         {
            $sql = "SELECT *FROM supply WHERE (supplyNumber='".$_GET["supplyNumber"]."' AND supplyDate='".$_GET["supplyDate"]."' AND hospitalName='".$_GET["hospitalName"]."'AND type='공급')";
         }
         else
         {
            $sql = "SELECT *FROM supply WHERE (supplyNumber='".$_GET["supplyNumber"]."' AND supplyDate='".$_GET["supplyDate"]."'AND type='공급')";
         }
      }
      else /*id set, regist- unset*/
      {
         if($bool3)
         {
            if($bool4)
            {
               $sql = "SELECT *FROM supply WHERE (supplyNumber='".$_GET["supplyNumber"]."' AND vaccineType='".$_GET["vaccineType"]."' AND hospitalName='".$_GET["hospitalName"]."'AND type='공급')";
            }
            else
            {
               $sql = "SELECT *FROM supply WHERE (supplyNumber='".$_GET["supplyNumber"]."' AND vaccineType='".$_GET["vaccineType"]."'AND type='공급')";
            }
         }
         else if($bool4)
         {
            $sql = "SELECT *FROM supply WHERE (supplyNumber='".$_GET["supplyNumber"]."'AND hospitalName='".$_GET["hospitalName"]."'AND type='공급')";
         }
         else
         {
            $sql = "SELECT *FROM supply WHERE (supplyNumber='".$_GET["supplyNumber"]."'AND type='공급')";
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
               $sql = "SELECT *FROM supply WHERE (supplyDate='".$_GET["supplyDate"]."' AND vaccineType='".$_GET["vaccineType"]."' AND hospitalName='".$_GET["hospitalName"]."'AND type='공급')";
            }
            else 
            {
               $sql = "SELECT *FROM supply WHERE (supplyDate='".$_GET["supplyDate"]."' AND vaccineType='".$_GET["vaccineType"]."'AND type='공급')";
            }
         }
         else if($bool4)
         {
            $sql = "SELECT *FROM supply WHERE (supplyDate='".$_GET["supplyDate"].'" AND hospitalName="'.$_GET["hospitalName"]."'AND type='공급')";
         }
         else
         {
            $sql = "SELECT *FROM supply WHERE (supplyDate='".$_GET["supplyDate"]."'AND type='공급')";
         }
      }
      else /*id set, regist- unset*/
      {
         if($bool3)
         {
            if($bool4)
            {
               $sql = "SELECT *FROM supply WHERE (vaccineType='".$_GET["vaccineType"]."' AND hospitalName='".$_GET["hospitalName"]."'AND type='공급')";
            }
            else
            {
               $sql = "SELECT *FROM supply WHERE (vaccineType='".$_GET["vaccineType"]."'AND type='공급')";
            }
         }
         else if($bool4)
         {
            $sql = "SELECT *FROM supply WHERE (hospitalName='".$_GET["hospitalName"]."'AND type='공급')";
         }
         else
         {
            $sql = "SELECT *FROM supply where type='공급'";
         }
      }
   }
   
   $ret = mysqli_query($con, $sql);
   if($ret){
      $count=mysqli_num_rows($ret);
   }
   else{
      echo "supply 데이터 조회 실패!!!"."<br>";
      echo "실패 원인 : ". mysqli_error($con);
      exit();
   }
                  
                        echo "<br><h1> 백신 공급내역 조회</h1>";
                        echo "<TABLE class='bluetop'>";
                        echo "<TR>";
                        echo "<TH>supplyNumber</TH><TH>supplyDate</TH><TH>vaccineType</TH><TH>amount</TH><TH>hospitalName</TH>";
                        echo "<TH>country</TH><TH>수정</TH>";
                        echo "</TR>";
                        
                        while($row=mysqli_fetch_array($ret)){
                            echo "<TR>";
                            echo "<TD>", $row['supplyNumber'], "</TD>";
                            echo "<TD>", $row['supplyDate'], "</TD>";
                            echo "<TD>", $row['vaccineType'], "</TD>";
                            echo "<TD>", $row['amount'], "</TD>";
                            echo "<TD>", $row['hospitalName'], "</TD>";
                            echo "<TD>", $row['country'], "</TD>";
                            echo "<TD>", "<a href='update_vaccin1_5.php?supplyNumber=", $row['supplyNumber'],"'>수정</a></TD>";
                            echo "</TR>";
                        }
                        
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