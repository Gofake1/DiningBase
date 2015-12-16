# TODO: loop through all days
# TODO: loop through all categories in each day's menu

from bs4 import BeautifulSoup
import mechanize
import mysql.connector

# Get data from HTML
def getNutritionData():
    # Find nutrition data table
    soup = BeautifulSoup(br.response().read(), 'html.parser')
    nutritionDataTable = soup.find('form', {'name': 'menuAdd'}).find('table')

    # Get desired table rows using bgcolor (lol)
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
        print '\t'.join(values)

        # Insert to MySQL
        #add_food = 'INSERT INTO Food '
        #cursor.execute(add_food)

# Cycle thorugh categories
def getCategories():
    br.select_form(name='dropdowns')
    print '* APPETIZERS / SOUPS *'
    br.form['typesList'] = ['4']
    br.submit()
    br.select_form(name='dropdowns')
    print '* DESSERTS *'
    br.form['typesList'] = ['14']
    br.submit()
    br.select_form(name='dropdowns')
    print '* *'
    br.form['typesList'] = ['']
    br.submit()
    br.select_form(name='dropdowns')
    print '* *'
    br.form['typesList'] = ['']
    br.submit()
    br.select_form(name='dropdowns')
    print '* *'
    br.form['typesList'] = ['']
    br.submit()
    br.select_form(name='dropdowns')
    print '* *'
    br.form['typesList'] = ['']
    br.submit()
    br.select_form(name='dropdowns')
    print '* *'
    br.form['typesList'] = ['']
    br.submit()
    br.select_form(name='dropdowns')
    print '* *'
    br.form['typesList'] = ['']
    br.submit()
    br.select_form(name='dropdowns')

# Cycle through meal periods
def getPeriods():
    br.select_form(name='dropdowns')
    print '** BREAKFAST **'
    br.form['periodsList'] = ['2'] # Breakfast
    br.submit()
    getNutritionData()
    br.select_form(name='dropdowns')
    print '** LUNCH **'
    br.form['periodsList'] = ['4'] # Lunch
    br.submit()
    getNutritionData()
    br.select_form(name='dropdowns')
    print '** DINNER **'
    br.form['periodsList'] = ['6'] # Dinner
    br.submit()
    getNutritionData()

# Cycle through calendar
def getDays():
    pass

# Init
url = 'http://nas.nd.edu'
br = mechanize.Browser()
br.open(url)
br.select_form(name='loginform')
br['j_username'] = 'dwu4'
br['j_password'] = 'rare_memes00'
br.submit()

#cnx = mysql.connector.connect(host='localhost', user='smike', password='balloon', database='smike')
#cursor = cnx.cursor()

# Open main calendar
#br.open(url+'/index.cfm')

# Find forms for menus each day
#calendar = br.response()
#soup = BeautifulSoup(calendar.text, 'html.parser')
#menusPerDay = soup.find_all('form', id='viewMenu')
br.open(url+'/menus.cfm')

# Get the NDH menu
br.select_form(name='dropdowns')
print '*** NORTH ***'
if br.form['unitList'] == ['45']: # Legends
    br.form['unitList'] = ['46'] # NDH
    br.submit()
getPeriods()

# Get the SDH menu
br.select_form(name='dropdowns')
print '*** SOUTH ***'
if br.form['unitList'] == ['46']:
    br.form['unitList'] = ['47'] # SDH
    br.submit()
    getPeriods()

getDays()

#cnx.close()