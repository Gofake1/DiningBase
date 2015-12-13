# TODO: loop through all days
# TODO: choose dining halls
# TODO: loop through all categories in each day's menu
# Right now the script only retrieves data for today's Legends' appetizers 

from bs4 import BeautifulSoup
import requests
from requests.auth import HTTPBasicAuth
import mechanize
import mysql.connector

mech = mechanize.Browser()
url = 'http://nas.nd.edu'
auth = HTTPBasicAuth('dwu4', 'rare_memes00')
halls = ['North', 'South']
#cnx = mysql.connector.connect(host='localhost', user='smike', password='balloon', database='smike')
#cursor = cnx.cursor()

# Get main calendar
calendar = requests.get(url, auth=auth)

# Find forms for menus each day
soup = BeautifulSoup(calendar.text, 'html.parser')
menusPerDay = soup.find_all('form', id='viewMenu')

# Get a menu for NDH
someMenu = requests.post(url+'/menus.cfm', auth=auth)

# Find nutrition data table
soup = BeautifulSoup(someMenu.text, 'html.parser')
nutritionDataTable = soup.find('form', {'name': 'menuAdd'}).find('table')

# Get desired table rows
nutritionData = nutritionDataTable.find_all('tr', bgcolor='#e4eee5')

# Display
for row in nutritionData:
    cells = row.find_all('td')
    values = []
    for cell in cells:
        values.append(cell.get_text())
    del values[12] # Remove report problem
    del values[3] # Remove quantity
    del values[1] # Remove allergens
    values[0] = values[0].rstrip() # Remove newlines from name
    print '\t '.join(values)

    # Insert to MySQL
    #add_food = 'INSERT INTO Food '
    #cursor.execute(add_food)

cnx.close()