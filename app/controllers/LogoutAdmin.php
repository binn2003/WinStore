<?php
class LogoutAdmin extends Controller
{

    function __construct()
    {
        //model
        unset($_SESSION['admin']);
        header('location: ./Admin/Login');
    }
}