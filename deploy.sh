#!/bin/bash
echo "current directory: $PWD"

cf login -a api.ng.bluemix.net -u liutao@us.ibm.com -p really78 -o liutao@us.ibm.com -s cm_dev
cf ic cp /Users/jerry/git/coolmenu_plugin wp:/var/www/html/wp-content/plugins/
echo "deployed to dev"