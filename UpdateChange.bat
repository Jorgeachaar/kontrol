@echo off

git status
echo Continuar para commitear cambios
git add --all
git commit -m "Subido del bat"
pause
git push
echo algun dia este bat levantara el serve

pause
exit