@echo off
REM ==================================================
REM  2-push-to-github.bat
REM  Double-click ONCE to upload this project to GitHub.
REM  First create an EMPTY repo: https://github.com/new  (name: school-website)
REM ==================================================
cd /d "%~dp0"
git init
git add .
git commit -m "First version of the school website"
git branch -M main
git remote remove origin 2>nul
git remote add origin https://github.com/shehbazkhan436/school-website.git
git push -u origin main
echo.
echo Done. Open https://github.com/shehbazkhan436/school-website
pause
