<?php
session_start();
if(isset($_SESSION['username']))
{
    echo "welcome home page ".$_SESSION['username'];

}
