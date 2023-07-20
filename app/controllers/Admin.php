<?php
class Admin extends Controller
{
    public $staffModel;
    public $accModel;

    function __construct()
    {
        if ($this->checkAdmin()) {
            header('location: ./Dashboard');
        }
        if (isset($_SESSION['admin'])) {
            header('location: ./Dashboard');
        }
        $this->staffModel = $this->callModel('StaffModel');
        $this->accModel = $this->callModel('AccModel');
    }
    function Show()
    {
        $this->callView('Master', [
            'Page' => 'LoginAdminPage',
        ]);
    }
    function Login()
    {
        $array_data = ['username', 'password'];
        $error = $this->LoopCheckError($array_data, $_POST);
        if (empty($error)) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $res = $this->accModel->findDataStaff('username', $username, "*");
            $res = !empty($res) ? $res->fetch_assoc() : '';
            if (!empty($res['password'])) {
                $check_pass = password_verify($password, $res['password']);
                if (!empty($check_pass)) {
                    $dataNew = [
                        'id' => $res['id'],
                        'username' => $res['username'],
                        'role' => $res['role'],
                        'name' => $res['full_name'],
                        'avatar' => $res['img'],
                    ];
                    $_SESSION['admin'] = $dataNew;
                    if ($dataNew['role'] == 1) {
                        header('location: ../DashBoard');
                    } else {
                        header('location: ../Dashboard');
                    }
                    return;
                } else {
                    $error = 'Sai tài khoản hoặc mật khẩu';
                }
            } else {
                $error = 'Sai tài khoản hoặc mật khẩu';
            }
        }

        $this->callView('Master', [
            'Page' => 'LoginAdminPage',
        ]);
    }

}