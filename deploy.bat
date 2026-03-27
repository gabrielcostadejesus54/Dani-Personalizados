@echo off

echo ==========================
echo   DEPLOY DO PROJETO
echo ==========================

set origem=G:\Meu Drive\Projetos de Clientes\Dani-Personalizados
set destino=C:\xampp\htdocs\Dani-Personalizados

robocopy "%origem%" "%destino%" /MIR

echo ==========================
echo   DEPLOY FINALIZADO
echo ==========================

pause