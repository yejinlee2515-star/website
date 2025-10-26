<?php
   $con=mysqli_connect("localhost","root","1234", "covid19") or die("MySQL 접속 실패!!");

   $modernaReserve = $_POST["modernaReserve"];
   $pfizerReserve = $_POST["pfizerReserve"];
   
   $sql = "INSERT INTO hospital (hname, modernaReserve, pfizerReserve) VALUES( 'YNU' , $modernaReserve, $pfizerReserve)";

   $ret = mysqli_query($con, $sql);
   
   echo "<h1> 신규 백신 등록 결과 </h1>";
   if($ret){
      echo "데이터가 성공적으로 등록됨.";
   }
   else{
      echo "데이터 입력 실패!!!"."<br>";
      echo "실패 원인 :".mysqli_error($con);
   }
   
   mysqli_close($con);
   
   echo "<br> <a href='DGhospital2_2.php'>추가 등록하기</a>";
   echo "<a href='DGhospital.php'> / 초기 화면</a>";
   
?>