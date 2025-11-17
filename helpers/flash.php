<?php

function setFlash($type, $message)
{
    $_SESSION['flash_' . $type] = $message;
}
