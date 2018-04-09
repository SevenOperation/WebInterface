#!/bin/python
import smtplib
import MySQLdb
import sys

sender = sys.argv[0]
mail_domain = sys.argv[1]
data = open("layout_mail.html",'r')
server = smtplib.SMTP("127.0.0.1",25,"mail_domain",10)
server.set_debuglevel(1)
db = MySQLdb.connect(host='127.0.0.1',db='users')
cnx = db.cursor()
daten = cnx.execute('select email from user where newsletter=1')
for row in cnx.fetchall():
	server.sendmail(sender,row[0],data.read())
server.quit()
