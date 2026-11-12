@echo off
REM ==================================================
REM  1-setup-database.bat
REM  Double-click to create the school_website database.
REM  XAMPP MySQL must be running (green in XAMPP Control Panel).
REM ==================================================
cd /d "%~dp0"
"C:\xampp\mysql\bin\mysql.exe" -u root < database\school.sql
if errorlevel 1 (
    echo.
    echo Something went wrong. Is MySQL started in XAMPP?
) else (
    echo.
    echo Database created! Open http://localhost/school-website/public/
)
pause
