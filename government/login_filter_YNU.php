<?php
    #정부 로그인 필터
    $userID=$_POST['userID'];
    $userPW=$_POST['userPW'];

    $con=mysqli_connect("localhost", "root", "1234", "covid19") or die("MySQL 접속 실패 !!");
    $sql = "SELECT * from administrator_hospital";
    $ret = mysqli_query($con, $sql);

    while($row = mysqli_fetch_array($ret)){
        if ($row['id']==$userID and $row['password']==$userPW){
            header('Location: YNUhospital.php');
        }
    }
    
    /*echo "<!DOCTYPE HTML>\n";
        echo "<!--\n";
        echo "	Halcyonic by HTML5 UP\n";
        echo "	html5up.net | @ajlkn\n";
        echo "	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)\n";
        echo "-->\n";*/
        echo "<html>\n";
        echo "	<head>\n";
        echo "		<title>Halcyonic by HTML5 UP</title>\n";
        echo "		<meta charset=\"utf-8\" />\n";
        echo "		<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=no\" />\n";
        echo "		<link rel=\"stylesheet\" href=\"assets/css/main.css\" />\n";
        echo "	</head>\n";
        echo "	<body>\n";
        echo "		<div id=\"page-wrapper\">\n";
        echo "\n";
        /*echo "			<!-- Header -->\n";*/
        echo "				<section id=\"header\">\n";
        echo "					<div class=\"container\">\n";
        echo "						<div class=\"row\">\n";
        echo "							<div class=\"col-12\">\n";
        echo "\n";
        /*echo "								<!-- Logo -->\n";*/
        echo "									<h1><a href=\"\" id=\"logo\"><span style=\"color:#1a255c\">YU Medical Center</a></h1>\n";
        echo "\n";
        echo "\n";
        echo "							</div>\n";
        echo "						</div>\n";
        echo "					</div>\n";
        echo "				</section>\n";
        echo "\n";
        /*echo "			<!-- Features -->\n";*/
        echo "				<section id=\"content\">\n";
        echo "					<div class=\"container\">\n";
        echo "						<div class=\"row\">\n";
        echo "							<div class=\"col-4 col-6-medium col-12-small\">\n";
        echo "\n";
        echo "\n";
        echo "							</div>\n";
        echo "							<div class=\"col-4 col-6-medium col-12-small\">\n";
        echo "\n";
        echo "								<h1><span style=\"color:#1a255c\">인증 실패!!</h1>\n";
        echo "                              <FORM ACTION=\"login_YNU.html\">\n";
        echo "									<input type=\"submit\" value=\"돌아가기\">\n";
        echo "								</FORM>\n";
        echo "\n";
        echo "							</div>\n";
        echo "							\n";
        echo "							\n";
        echo "							\n";
        echo "							\n";
        echo "							\n";
        echo "						</div>\n";
        echo "					</div>\n";
        echo "				</section>\n";
        echo "\n";
        echo "\n";
        echo "		</div>\n";
        echo "\n";
        /*echo "		<!-- Scripts -->\n";*/
        echo "			<script src=\"assets/js/jquery.min.js\"></script>\n";
        echo "			<script src=\"assets/js/browser.min.js\"></script>\n";
        echo "			<script src=\"assets/js/breakpoints.min.js\"></script>\n";
        echo "			<script src=\"assets/js/util.js\"></script>\n";
        echo "			<script src=\"assets/js/main.js\"></script>\n";
        echo "\n";
        echo "	</body>\n";
        echo "</html>\n";
?>