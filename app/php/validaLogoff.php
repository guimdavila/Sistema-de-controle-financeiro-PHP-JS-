<?php

    $_SESSION['logado'] = 0;
    session_destroy();
    session_unset();

    header('location: ../');
?>