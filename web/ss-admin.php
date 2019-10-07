<?php
    if (isset($_SESSION['id'])) {
        if ($_SESSION['position'] != 1) {
            header( "location: ./admin.php" );
        }
    } else {
        header( "location: ./index.php" );
    }