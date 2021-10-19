<?php
session_start();

?>

<!DOCTYPE HTML>
<!--
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>US Market Tracker</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
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
						<h1>US Market Tracker</h1>
					</header>
                        <h3>Get all market related data at one place</h3>
                        <br/><br/>
					<div class="flex ">
						<div>
							<span><img src="images/money.png" class="homeIcon"/></span>
                            <a href="forex.php"><h3>Forex Converter</h3></a>
							<p>Real Time Exchange Rates</p>
						</div>

						<div>
							<span><img src="images/sp.png" class="homeIcon"/></span>
                            <a href="sp.php"><h3>S&amp;P Index</h3></a>
							<p>Current and Historical data</p>
						</div>

                        <div>
							<span><img src="images/cryptocurrency2.png" class="homeIcon"/></span>
                            <a href="crypto.php"><h3>Cryptocurrency Price</h3></a>
							<p>Prices of Cryptocurrencies</p>
						</div>

					</div>

				</div>
			</section>

            <!--<div class="inner">-->
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container" id="news">
                <div class="tradingview-widget-container__widget"></div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js" async>
                {
                "colorTheme": "light",
                "isTransparent": true,
                "displayMode": "compact",
                "width": "100%",
                "height": "450",
                "locale": "en"
                }
                </script>
                </div>
                <!-- TradingView Widget END -->
                <!--<section id="about" class="wrapper align-center">
                    <header>
                        <h2 id="content">About US Market Tracker</h2>
                    </header>
                        <p>US Market Tracker is a financial data website providing users access to forex, cryptocurrency and stock data.</p>
                        <p>This website is powered by Alpha Vantage's API, which provides current and historical financial data through JSON.</p>   
                        <p>Languages used: HTML, PHP, Javascript</p>
                        <br/><br/>
                        <p>Created by Vivek Maniyar</p>
                </section>-->
            <!--</div>-->
        
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
	</body>
</html>