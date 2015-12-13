# loop through all days
# TODO: choose dining halls
# TODO: loop through all categories in each day's menu
# Right now the script only retrieves data for today's Legends' appetizers 

from bs4 import BeautifulSoup
import requests
from requests.auth import HTTPBasicAuth

url = 'http://nas.nd.edu'
auth = HTTPBasicAuth('dwu4', 'rare_memes00')

# Get main calendar
calendar = requests.get(url, auth=auth)

# Find forms for menus each day
soup = BeautifulSoup(calendar.text, 'html.parser')
menusPerDay = soup.find_all('form', id='viewMenu')

#dropdownform
with requests.Session() as session:
        response = session.get(url)
        soup = BeautifulSoup(response.content)

        data = {
        'unitList' : '46'
        }

        response = session.post(url, data=data)
        soup = BeautifulSoup(response.content, 'html.parser')

	print session.get(url)

# Get a menu
#someMenu = requests.post(url+'/menus.cfm', auth=auth)

# Find nutrition data table
#soup = BeautifulSoup(response, 'html.parser')
nutritionDataTable = soup.find('form', {'name': 'menuAdd'}).find('table')

# Get desired table rows
nutritionData = nutritionDataTable.find_all('tr')

# Display
for row in nutritionData:
    cells = row.find_all('td')
    values = []
    for cell in cells:
        values.append(cell.get_text())
    print values

