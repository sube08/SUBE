#!/bin/sh

#Backup database MySQL
RUTA="/home/soporte/backups"
mysqldump --defaults-file=$RUTA/.bk.cnf bd_sb_sube> $RUTA/BK_bd_sb_sube-`date +%Y%m%d`.sql
find $RUTA/BK_* -mtime +3 -type f -exec rm {} \;
