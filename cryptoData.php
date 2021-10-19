<?php
    session_start();
    include("include.php");
    extract($_SESSION);
    $apiKey = $_SESSION["apiKey"]; 
    $answer="";

    if(isset($_GET["crypto"])) {
        
           $cryptoCode= $_GET["crypto"];
        
            //$index = array_search($cryptoCode,$_SESSION["cryptoNamesArray"]);

            $cryptoname = $cryptoCode;
            $result = mysqli_query($conn, "SELECT ID FROM cryptolist WHERE Name='$cryptoname'");
            $array = mysqli_fetch_row($result);

            if (empty($array)) {
                header("Location: crypto.php?error='No cryptocurrency found'#three");
                die();
            }

        
        } else {
            header("Location: crypto.php");
            die();
    }

?>

<html>
	<head>
		<title><?php echo $_GET["crypto"];?></title>
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
						<h1><?php echo $cryptoCode;?></h1>
					</header>

				</div>
			</section>
        
        
		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
                    <div class="align-center">
                    <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/currency.js">
                    </script>
                    <div class="coinmarketcap-currency-widget" data-currencyid="<?php echo $array[0]; ?>" data-base="USD" data-secondary="" data-ticker="true" data-rank="true" data-marketcap="true" data-volume="true" data-statsticker="true" data-stats="USD"></div>
                    <br/><br/>
                    <a href='crypto.php'><button>Search another cryptocurrency</button></a>
                        <div id="loadAfter">
                        </div>
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
            <script type ="text/javascript">
                
            </script>
            
        </body>
</html>