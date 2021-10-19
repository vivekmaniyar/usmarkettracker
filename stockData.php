<?php
    session_start();
    include("include.php");
    extract($_SESSION);
    $apiKey = $_SESSION["apiKey"]; 
    $answer="";
    require_once 'database.php';

    if(isset($_GET["stock"])) {
        
           $stockCode= $_GET["stock"];

            $stockname = $stockCode;
            $result = mysqli_query($conn, "SELECT Symbol FROM stocklist WHERE Name='$stockname'");
            $array = mysqli_fetch_row($result);

            if (empty($array)) {
                header("Location: sp.php?error='No stock found'#three");
                die();
            }

            $url = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=" . $array[0] . "&interval=1min&apikey=" . $apiKey;


            $obj = json_decode(file_get_contents($url), true);

            date_default_timezone_set('US/Eastern');
                                     
            $currentDate = date("Y-m-d");
                                     
            if(isset($obj)) {
                $answer = $obj["Meta Data"]["3. Last Refreshed"];
            }
        
        } else {
            header("Location: sp.php");
            die();
    }

    /**if(isset($_SESSION["stockCode"])) {
        $index = array_search($_SESSION["stockCode"],$_SESSION["companyNamesArray"]);
       
        $url = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=" . $companySymbolsArray[$index] . "&interval=1min&apikey=" . $apiKey;
        
        
        $obj = json_decode(file_get_contents($url), true);
        
        
    } else {
        header("Location: sp.php");
        die();
    }
    **/



?>

<html>
	<head>
		<title><?php echo $_GET["stock"];?></title>
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
						<h1><?php echo $stockCode;?></h1>
                        <h3><?php echo "Price: $ " . $obj["Time Series (Daily)"][$answer]["4. close"]; ?></h3>
					</header>

				</div>
			</section>
        
        
		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
					<div class="align-center">
                        <div class="box">
                            <h2>Search historical stock data</h2>
                            <form method="post" action="stockData.php?stock=<?php echo $stockCode; ?>#result" id="stockData">    
                                Select a Date<br/>
                                <input id="date" type="date" name="date">
                                <br/><br/>
                                <button type="submit" class="button special">SEARCH</button>
                                <br/><br/>
                            </form>
                            <div id="result" class="align-center" onclick="getDateResult()">
                                <?php
                                    if (isset($_POST["date"])) {
                                        $date = $_POST["date"];
                                        if(array_key_exists($_POST['date'], $obj["Time Series (Daily)"])) {
                                            $open = $obj["Time Series (Daily)"][$_POST['date']]["1. open"];
                                            $high = $obj["Time Series (Daily)"][$_POST['date']]["2. high"];
                                            $low = $obj["Time Series (Daily)"][$_POST['date']]["3. low"];
                                            $close = $obj["Time Series (Daily)"][$_POST['date']]["4. close"];
                                            $volume = $obj["Time Series (Daily)"][$_POST['date']]["5. volume"];

                                            if(isset($obj)) {
                                            echo "<table class='align-center'><tr><td><h2>" . $stockCode . "</h2>";
                                            echo "<td><h2>" . $date . "</h2></td></tr>";
                                            echo "<tr><td><b></b></td>"; //blank
                                            echo "<td></td></tr>"; //blank
                                            echo "<tr><td><b>Open</b></td>";
                                            echo "<td>$ ". $open . "</td></tr>";
                                            echo "<tr><td><b>High</b></td>";
                                            echo "<td>$ ". $high . "</td></tr>";
                                            echo "<tr><td><b>Low</b></td>";
                                            echo "<td>$ ". $low . "</td></tr>";
                                            echo "<tr><td><b>Close</b></td>";
                                            echo "<td>$ ". $close . "</td></tr>";
                                            echo "<tr><td><b>Volume</b></td>";
                                            echo "<td>$ ". $volume . "</td></tr>";

                                            }  
                                        } else {
                                            echo "<p class='error'>No data available on specified date.</p>";
                                        }


                                    }

                                ?>      
                            </div>
                                <a href='sp.php'><button>Search another stock</button></a> 
                                <br/><br/>
                               
                        </div>
                        <div id="loadAfter">
                        </div>
                    </div>    
                </div> 
            </section>
        
            <!-- footer -->
            <!--<div class="wrapper align-center">
                <p class="copyright text-muted">
                Copyright &copy; Vivek Maniyar 2021
                <br/>
                Design: <a href="http://templated.co">Templated</a>                  
                </p>
            </div>-->

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
            <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
            <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
            <script type ="text/javascript">
                
            </script>
        </body>
</html>