<?php
   $con=mysqli_connect("localhost", "root", "1234", "governmentdb") or die("MySQL 접속 실패!!");
   $sql = "select * from hospital";
   
   $ret = mysqli_query($con, $sql);
   if($ret){
      $count=mysqli_num_rows($ret);
      if($count==0){
         echo $GET['idnum']."아이디의 회원이 없음!!!"."<br>";
         echo "<br> <a href='moderna.html'> <--초기화면</a>";
         exit();
      }
   }
   else{
      echo "userTBL 데이터 조회 실패!!!"."<br>";
      echo "실패 원인 : ". mysqli_error($con);
      echo "<br> <a href='moderna.html'> <--초기화면</a>";
      exit();
   }
   
   $row = mysqli_fetch_array($ret);
   $idnum= $row["hospitalAddress"];
   $date= $row["hospitalNormalBed"];
?>
<HTML>
   <HEAD>
      <META http-equiv="content-type" content="text.html; charset=utf-8">
   </HEAD>
   <BODY>
      <h1>update vaccin data</h1>
      <FORM METHOD="POST" ACTION="update_result.php">
         주소: <INPUT TYPE="text" NAME="idnum" VALUE=<?php echo $idnum?>> <br>
         침대수: <INPUT TYPE="text" NAME="date" VALUE=<?php echo $date ?> > <br> <br> <br>
         <INPUT TYPE="submit" VALUE="정보 수정">
      </FORM>
   </BODY>
</HTML>