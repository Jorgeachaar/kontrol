@echo off

git add --all
git commit -m "Subido del bat"
git status
echo Continuar para commitear cambios
pause
git push
echo algun dia este bat levantara el serve

pause
exit