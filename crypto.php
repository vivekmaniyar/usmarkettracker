<?php
    session_start();

    include("include.php");

    if(isset($_POST["cryptoCode"])) {
        if(trim($_POST["cryptoCode"]) == "") {
            header("Location:crypto.php?error='No cryptocurrency Selected'#three");
            die();
        } else {
            header("Location: cryptoData.php?crypto=" . $_POST["cryptosearch"] . "#three");
            die();
        }
    }

    if(isset($_GET["error"])) {
        $error = $_GET["error"];
    }

    $cryptonames = mysqli_query($conn, "SELECT Name FROM cryptolist");
    $cname = array();
    while($row = mysqli_fetch_array($cryptonames)){
        $cname[] = $row['Name'];
    }
?>

<!DOCTYPE HTML>
<!--
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Cryptocurrency</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script> 
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<nav id="nav">
						<a href="index.php">Home</a>
						<a href="forex.php">Forex</a>
						<a href="sp.php">S&amp;P500</a>
                        <a href="crypto.php">Cryptocurrency</a>
                        <a href="index.php#news">News</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
        
       <!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header>
						<h1>Cryptocurrency</h1>
					</header>

				</div>
			</section>
        
        
		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
                    <div class="align-center">
                    <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinMarquee.js"></script><div id="coinmarketcap-widget-marquee" coins="1,1027,1839,2010,74" currency="USD" theme="light" transparent="false" show-symbol-logo="true"></div>

                        <div class="box">
                            <div class="error">
                                <?php 
                                    if(isset($error)) {
                                        echo $error;   
                                    }
                                ?>
                            </div>
                                
                            <form method="post" action="crypto.php" id="cryptoData">    
                                Enter a Cryptocurrency Name<br/>
                                <input type="text" id="autocomplete" name="cryptosearch" placeholder="Search a cryptocurrency" oninput="onInput()"/>
                                <input type="hidden" name ="cryptoCode" id="cryptoCode" value=""/>
                                <br/><br/>
                                <button type="submit" class="button special">SEARCH</button>
                                <div id="answer"></div>
                               <!-- -- OR ---->
                                <br/>
                            </form>
                            <!--<button id="showTable" onclick="showTable()" class="button special">See full list of cryptocurrencies</button>-->
                            </div> 

                            <!--<table id = "cryptoIndex" style="display:none; text-align:center; width:50%; margin: 0 auto;">
                            <?php 
                                echo "<td><b>Symbol</b></td><td><b>Cryptocurrency Name</b></td><td><b>Release</b></td>";


                                //for($i=0; $i<count($cryptoNamesArray); $i++) 
                                while($array=mysqli_fetch_row($cryptos)){
                                    echo "<tr>";
                                    echo "<td>" . $array[0] . "</td>";
                                    echo "<td>" . $array[1] . "</td>";
                                    echo "<td>" . $array[2] . "</td>";
                                    echo "</tr>";
                                } 
                            ?>
                            </table> -->  
                        
                    </div>    
                </div>  
            </section>
        
            <!-- footer -->
            <div class="wrapper align-center">
                <p class="copyright text-muted">
                Copyright &copy; Vivek Maniyar 2021
                <br/>
                Design: <a href="http://templated.co">Templated</a>                  
                </p>
            </div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
            <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
            <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
            <script type="text/javascript">
                var jsArray = <?php echo '["' . implode('", "', $cname) . '"]' ?>;
                $('#autocomplete').autocomplete({
                    source: function(request, response) {
                        var results = $.ui.autocomplete.filter(jsArray, request.term);
                        response(results.slice(0, 5));
                    },
                    select: function (event, ui) {
                            document.getElementById("cryptoCode").value= ui.item.value;
                            
                        }  
                    
                  });
                
                function showTable() {
                    var x = document.getElementById("cryptoIndex");
                    if (x.style.display == "none") {
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }   
                }
                
                function onInput() {
                    var x = document.getElementById("cryptoIndex");
                        x.style.display = "block";
                        x.style.display = "none";   
                }
 
 
 
  
            </script>

	</body>
</html>