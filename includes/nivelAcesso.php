<?php

if($_SESSION['perfil'] != 'Administrador'){
    header('location:index.php?status=error3');
}