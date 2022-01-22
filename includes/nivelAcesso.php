<?php

if($_SESSION['perfil'] != 'Administrator'){
    header('location:index.php?status=error3');
}