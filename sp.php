<?php
    session_start();

    include("include.php");

    if(isset($_POST["stockCode"])) {
        if(trim($_POST["stockCode"]) == "") {
            header("Location:sp.php?error='No Stock Selected'#three");
            die();
        } else {
            header("Location: stockData.php?stock=" . $_POST["stocksearch"]);
            die();
        }
    }

    if(isset($_GET["error"])) {
        $error = $_GET["error"];
    }

    $stocknames = mysqli_query($conn, "SELECT Name FROM stocklist");
    $name = array();
    while($row = mysqli_fetch_array($stocknames)){
        $name[] = $row['Name'];
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
		<title>S&amp;P 500</title>
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
						<h1>S&amp;P 500</h1>
					</header>

				</div>
			</section>
        
        
		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
					<!--<header class="align-center">
                        <h2>S&amp;P 500</h2>
					</header>-->
                    <div class="align-center">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js" async>
                        {
                        "symbol": "CURRENCYCOM:US500",
                        "width": "100%",
                        "locale": "en",
                        "colorTheme": "light",
                        "isTransparent": false
                        }
                        </script>
                        </div>
                        <!-- TradingView Widget END -->
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                        {
                        "symbols": [
                            {
                            "description": "Apple",
                            "proName": "NASDAQ:AAPL"
                            },
                            {
                            "description": "Google",
                            "proName": "NASDAQ:GOOG"
                            },
                            {
                            "description": "Microsoft",
                            "proName": "NASDAQ:MSFT"
                            },
                            {
                            "description": "Facebook",
                            "proName": "NASDAQ:FB"
                            },
                            {
                            "description": "Tesla",
                            "proName": "NASDAQ:TSLA"
                            }
                        ],
                        "showSymbolLogo": true,
                        "colorTheme": "light",
                        "isTransparent": false,
                        "displayMode": "regular",
                        "width": "100%",
                        "locale": "en"
                        }
                        </script>
                        </div>
                        <!-- TradingView Widget END -->
                        <div class="box">
                            <div class="error">
                                <?php 
                                    if(isset($error)) {
                                        echo $error;   
                                    }
                                ?>
                            </div>   
                            <form method="post" action="sp.php" id="stockData">    
                                Enter a Company Name<br/>
                                <input type="text" id="autocomplete" name="stocksearch" placeholder="Search a company" oninput="onInput()"/>
                                <input type="hidden" name ="stockCode" id="stockCode" value=""/>
                                <br/><br/>
                                <button type="submit" class="button special">SEARCH</button>
                                <div id="answer"></div>
                                <br/><br/>
                                <!---- OR ---->
                                <br/>
                            </form>
                            <!--<button id="showTable" onclick="showTable()" class="button special">See full list of S&amp;P500</button>-->
                            </div> 

                            <!--<table id = "spIndex" style="display:none; text-align:center; width:50%; margin: 0 auto;">
                            <?php 
                                echo "<td><b>Ticker Symbol</b></td><td><b>Company Name</b></td><td><b>Industry</b></td>";


                                //for($i=0; $i<count($companyNamesArray); $i++) 
                                while($array=mysqli_fetch_row($stocks)){
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
                var jsArray = <?php echo '["' . implode('", "', $name) . '"]' ?>;
                $('#autocomplete').autocomplete({
                    source: function(request, response) {
                        var results = $.ui.autocomplete.filter(jsArray, request.term);
                        response(results.slice(0, 5));
                    },
                    select: function (event, ui) {
                            document.getElementById("stockCode").value= ui.item.value;
                            //window.location.href='stockData.php?stock='+ui.item.id;
                            
                        }  
                    
                  });
                
                function showTable() {
                    var x = document.getElementById("spIndex");
                    if (x.style.display == "none") {
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }   
                }
                
                function onInput() {
                    var x = document.getElementById("spIndex");
                        x.style.display = "block";
                        x.style.display = "none";   
                }
 
 
 
  
            </script>

	</body>
</html>