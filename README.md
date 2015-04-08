# README #

# Google DDNS updater #

Schedule this script to update the Google DDNS service.  Use crontab to schedule this script.

## Requirements ##

* cURL extension enabled. 
* cacert.pem file exists on system.  If not, download at http://curl.haxx.se/docs/caextract.html

## How to Use ##

* Change the username, password and domain in the top of the file
* Make sure cacert.pem exists and change location in the PHP if not at c:\cacert.pem
* schedule PHP script using crontab or task scheduler