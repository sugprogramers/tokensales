#!/bin/sh
scriptname=$0
username=$1
password=$2
database=$3
#agregar parametros fecha para ver desde que migration correr

if [ "$username" = "" ] | [ "$password" = '' ] | [ "$database" = '' ]
then
	echo "usage: $0 <username> <password> <database>"
	exit 1;
fi

for i in $(ls 200*.sql);
do
	echo "running $i"
	psql --host 127.0.0.1 --port 5432 --username $username $database -f $i	
done
