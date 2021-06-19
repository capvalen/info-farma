cd C:\xampp\mysql\bin
mysqldump -u root -p --password=*123456* --databases consultorio >"E:\mega_ORL\Backups/ORL_backup %date:~-4,4%-%date:~-7,2%-%date:~-10,2%-%time:~0,2%_%time:~3,2%_%time:~6,2%.sql"
