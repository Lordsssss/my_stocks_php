import mysql.connector
from mysql.connector import Error
from datetime import datetime
import json
# Initialize the connection as None
connection = None

def get_connection():
    global connection
    if connection is None or not connection.is_connected():
        try:
            connection = mysql.connector.connect(
                host='localhost',
                database='my_stocks',
                user='root',
                password='mysql',
            )
            if connection.is_connected():
                print("Connected to the database.")
        except Error as e:
            print(f"Error: {e}")
            connection = None
    return connection

def update_stock_price(symbol, price):
    try:
        conn = get_connection()
        if conn is None:
            print("Failed to connect to the database.")
            return

        cursor = conn.cursor()

        # Update the price for the given stock symbol
        update_query_stock = f"""
        UPDATE stocks
        SET current_price = {price}
        WHERE stock_symbol = '{symbol}';
        """
        update_query_stock_prices = f"""
        INSERT INTO stock_prices (stock_symbol, price, price_date)
        VALUES ('{symbol}', {price}, '{datetime.now()}');
        """
        cursor.execute(update_query_stock)
        cursor.execute(update_query_stock_prices)
        conn.commit()
        print(f"Price for stock symbol '{symbol}' updated to {price}.")

    except mysql.connector.Error as e:
        print(f"Error: {e}")

# Optional: Close the connection when done
def close_connection():
    global connection
    if connection is not None and connection.is_connected():
        connection.close()
        print("MySQL connection is closed.")

import websocket

def on_message(ws, message):

    # Step 2: Parse the JSON string into a Python dictionary
    data = json.loads(message)
    trade_info = data["data"][0]
    update_stock_price(trade_info["s"], trade_info["p"])
    print(f'Updated stocks : {trade_info["s"]} with the price : {trade_info["p"]}$')

def on_error(ws, error):
    print(error)

def on_close(ws):
    print("### closed ###")

def on_open(ws):
    ws.send('{"type":"subscribe","symbol":"AAPL"}')
    ws.send('{"type":"subscribe","symbol":"AMZN"}')
    ws.send('{"type":"subscribe","symbol":"GOOGL"}')

if __name__ == "__main__":
    websocket.enableTrace(True)
    ws = websocket.WebSocketApp("wss://ws.finnhub.io?token=cr6soa9r01qg9ve84gagcr6soa9r01qg9ve84gb0",
                              on_message = on_message,
                              on_error = on_error,
                              on_close = on_close)
    ws.on_open = on_open
    ws.run_forever()
    close_connection()

