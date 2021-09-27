#!/usr/bin/env python3
import urllib.request
import json.decoder


def main():
    symbol = input ("Please enter a stock symbol, or enter quit.")
    symbol = symbol.capitalize()
    while symbol != "QUIT":
        url = 'https://www.alphavantage.co/query?function=OVERVIEW&symbols='+symbol+'&apikey=IP5RUHISZVF89ZGH'
        r = urllib.request.urlopen(url)
        data = r.json.decoder()
        print (data)
        print ("Stock Quotes not recieved successfully  :C ")



main()