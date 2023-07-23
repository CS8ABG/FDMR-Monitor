<?php
    $host = $_GET['host'];
    exec('nc -vzu ' . escapeshellarg($host) . ' 62031 2>&1', $output, $return_var);
    if ($return_var === 0) {
        echo 'Online';
    } else {
        echo 'Offline';
    }
?>