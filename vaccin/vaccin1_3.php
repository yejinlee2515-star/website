<?php 
    $dateString = date("Y-m-d");
    $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
   
    $sql = "SELECT * FROM `order` where type = '판매'";
    $sql1 = "SELECT * FROM supply where type = '공급'";
   
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
                        <?php
                        $p_stock=0;
                        $m_stock=0;
                        echo "<TABLE class='bluetop'>";
                        echo "<TR>";
                        echo "<TH>orderNumber</TH><TH>orderDate</TH><TH>orderQuantity</TH><TH>pharmacistName</TH><TH>country</TH>";
                        echo "<TH>수정</TH>";
                        echo "</TR>";
                        
                        while($row=mysqli_fetch_array($ret)){
                           if ($row['orderDate'] < date('Y-m-d') and ($row['pharmacistName']=='화이자')){
                              $p_stock = $p_stock + $row['orderQuantity'];
                           }
                           if ($row['orderDate'] < date('Y-m-d') and ($row['pharmacistName']=='모더나')){
                              $m_stock = $m_stock + $row['orderQuantity'];
                           }
                            echo "<TR>";
                            echo "<TD>", $row['orderNumber'], "</TD>";
                            echo "<TD>", $row['orderDate'], "</TD>";
                            echo "<TD>", $row['orderQuantity'], "</TD>";
                            echo "<TD>", $row['pharmacistName'], "</TD>";
                            echo "<TD>", $row['country'], "</TD>";
                            echo "<TD>", "<a href='update_vaccin1_3.php?orderNumber=", $row['orderNumber'], "'>수정</a></TD>";
                            echo "</TR>";
                        }
                        while($row1=mysqli_fetch_array($ret1)){
                           
                           if($row1['supplyDate']<date('Y-m-d')and($row1['vaccineType']=='화이자')){
                              $p_stock=$p_stock-$row1['amount'];
                           }
                           if($row1['supplyDate']<date('Y-m-d')and($row1['vaccineType']=='모더나')){
                              $m_stock=$m_stock-$row1['amount'];
                           }
                        }
                        echo"<h2>현재 화이자 재고량 : '".$p_stock."'</h2>";
                        echo"<h2>현재 모더나 재고량 : '".$m_stock."'</h2>";
                        echo "<br><h1> ▶백신 주문내역 조회</h1>";
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