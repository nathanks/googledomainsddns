# Google DDNS updater #

Schedule this script to update the IP address associated with your domain using the Google DDNS service.

## Requirements ##

* cURL extension enabled. 
* cacert.pem file exists on system.  If not, download at http://curl.haxx.se/docs/caextract.html
* DDNS enabled for your domain on Google Domains.  This is done using synthetic records.  More information at https://support.google.com/domains/answer/6069273?hl=en

## How to Use ##

* Change the username, password and domain in the top of the file
* Make sure cacert.pem exists and change location in the PHP if not at c:\cacert.pem
* schedule PHP script using crontab or task scheduler