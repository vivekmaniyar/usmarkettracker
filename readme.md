usmarkettracker ReadMe

[usmarkettracker]

Created by [Vivek Maniyar]()



**Version 1.0**

usmarkettracker is a website that provides its users with current and historical data for S&P500 stocks, Cryptocurrencies and specific currencies. It also provide users the current news which can affect the market. The site was built using HTML, PHP, and Javascript. usmarkettracker uses Alpha Vantage's API in order to retrieve current and historical financial data and uses coinmarketcap widget to display cryptocurrency data.

_**Scope of usmarkettracker:**_
1. Forex Converter - provides real time currency exchange rate for the following currencies:
    * US dollar
    * Canadian Dollar
    * Korean Won
    * Euro
    * British Pound Sterling
    * Japanese Yen
    * Swiss franc
    * Australian Dollar
    * Indian Rupee

        A calculator is also provided that allows a user to input a base currency amount and compute for the corresponding amount in a converted currency.

2. Standard & Poor's 500 Index - provides current and historical stock prices and trade volumes per company in the current S&P 500 Index

3. Cryptocurrencies - provides current and historical cryptocurrency prices and trade volumes per cryptocurrency

4. News - Provides news which can affect price of stocks or cryptocurrency

_**Methodology:**_

  The website was built using HTML, PHP, and Javascript. 
  
  1. Source of Data:
  
      The financial data is taken from [Alpha Vantage's API](https://www.alphavantage.co/documentation/). 

      The API provides data in the form of JSON objects, which is then parsed into a PHP array for processing. 

      To access Alpha Vantage's API, a call to their URL must be made with the appropriate stock ticker code/forex code that you want to look up. 
    
  2. Retrieving Stock Names and Symbols
  
      There are 500 companies on the S&P500 index, which is the scope of the stock data provided by usmarkettracker.

      The list of those 500 company names and their symbols are retrieved from [Wikipedia Page](https://en.wikipedia.org/wiki/List_of_S%26P_500_companies) of the S&P500.

      The information is stored into MySQL database on the remote server and then retrieved using PHP script which connects database with this project.
    
  3. Forex Currency Conversion
     
      A call to Alpha Vantage API with corresponding currency pair codes is made to retrieve the current conversion rate.

  4. Retrieving Cryptocurrency Data

      To create a list of Cryptocurrency with their Rank, unique ID and symbol, [Coinmarketcap's API](https://pro.coinmarketcap.com/) was used.

      The information retrieved from coinmarketcap was first stored into the excel sheet and then imported into the MySQL database for the use.

      The unique ID provided into this list is inputted into the [Coinmarketcap's Widget](https://coinmarketcap.com/widget/ticker/) to display the data of the cryptocurrency.

  5. Retrieving News

      To provide news to the user, [Tradingview's Widget](https://www.tradingview.com/widget/timeline/) is used.

      This widget provides all the news to the user so that they can keep track of what is happening in the market.
    
_**Limitations:**_ 

  The current version of usmarkettracker has the following limitiations, which will be addressed in succeeding versions:
    
  1. Alpha Vantage API
  
        The usmarkettracker website is reliant on the Alpha Vantage API for information. The primary function of the website is to display the data in a user-friendly format.
        To access and output the data from the API, the required format was hard coded into the website. 
        
        For example, the JSON data provided by the API is in a set structure. usmarkettracker receives the array and outputs the data in the order that the array is given. If Alpha Vantage changes its format structure, the usmarkettracker website will not work. 
        
        Possible Solution: modify website code to parse the data received from the API and arrange it according to our own structure.
        
  2. List update
  
        The list of S&P 500 companies and cryptocurrencies is not updated automatically so the developer has to update the list manually after the certain period of time.
        
        Possible Solution: Automation of list update.
        
  3. Functionality and Relevance
  
     More functionality can be added in succeeding versions to process data and provide investors with useful analyses and forecasts. 
  
      Future additions:
        * Create graph of price movement per stock
        * Add more currencies for forex conversion

     
        
    
