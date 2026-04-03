<?php
session_start();

// remove todas as variáveis de sessão
session_unset();

// destrói a sessão
session_destroy();

// redireciona para login
header("Location: ../login.php");
exit;