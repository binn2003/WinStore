<?php
class Controller
{
    public function callModel($model)
    {
        if (file_exists("./app/models/" . $model . ".php")) {
            require_once "./app/models/" . $model . ".php";
            return new $model;
        }
    }

    public function callView($view, $data = [])
    {
        if (file_exists("./app/views/" . $view . ".php")) {
            require_once "./app/views/" . $view . ".php";
        } else {
            require_once "./app/views/Master.php";
        }
    }

    public function checkAdmin($isAdmin = false)
    {
        $admin = isset($_SESSION['admin']) ? $_SESSION['admin'] : [];
        if ($isAdmin) {
            return isset($admin["role"]) && $admin["role"] == 1 ? true : false;
        } else {
            // header("location: ./Admin/Login");
        }
    }

    public function checkUser($isUser = false)
    {
        $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
        if ($isUser) {
            return isset($user["activated"]) && $user["activated"] == 1 ? true : false;
        } else {
            header("location: ./");
        }
    }

    public function LoopCheckError($data, $dataForm)
    {
        if (empty($data)) return;
        $error = array();
        foreach ($data as &$field) {
            if (empty($dataForm[$field])) {
                $error[$field] = "Bắt buộc nhập trường này";
            }
        }
        return $error;
    }

    public function printFix($data)
    {
        if (!empty($data)) {
            echo '<pre>';
            print_r($data);
            echo '<pre/>';
        }
    }
}
