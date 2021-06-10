@echo off

set dbUser=root
set dbPassword=CONTRASEÑA
set baseDatos="infofarma"

set backupDir="C:\backups"
set mysqldump="C:\xampp\mysql\bin\mysqldump.exe"
set mysqlDataDir="C:\xampp\mysql\data"
set zip="C:\Program Files\7-Zip\7z.exe"


:: get date
for /F "tokens=2-4 delims=/ " %%i in ('date /t') do (
	set mm=%%j
	set dd=%%i
	set yy=%%k
)

set dirFecha=%yy%%mm%%dd%

:: switch to the "data" folder
pushd %mysqlDataDir%

:: itera sobre todas las carpetas de data para extraer todas las DB
::for /d %%f in (*) do (

	if not exist %backupDir%\ (
		mkdir %backupDir%\
	)

	::%mysqldump% --host="localhost" --user=%dbUser% --password=%dbPassword% --single-transaction --add-drop-table --databases %%f %backupDir%\%dirName%\%%f.sql
	%mysqldump% --host="localhost" --user=%dbUser% --password=%dbPassword% --databases %baseDatos% > %backupDir%\%baseDatos%.sql

	%zip% a -tgzip %backupDir%\%baseDatos%_%dirFecha%.sql.gz %backupDir%\%baseDatos%.sql

	del %backupDir%\%baseDatos%.sql

::)