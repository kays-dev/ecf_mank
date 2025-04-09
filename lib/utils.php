<?php

function isConnected()
{
    if (isset($_SESSION['user_id'])) {
        return true;
    } else {
        header('Location: ?action=401');
    }
}