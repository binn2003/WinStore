<?php
class User extends Controller
{
    public $User;

    function __construct()
    {
        if (isset($_SESSION['admin'])) {
            if ($this->checkAdmin()) {
               header('location: ./Dashboard');
            }
         }else{
            header('location: ./LogoutAdmin');
         }
        $this->User = $this->callModel('UserModel');
    }

    function Show()
    {
        $this->callView(
            'MasterAdmin',
            [
                'Page' => 'ListUserPage',
                'ListUser' => $this->User->GetUser(),
            ]
        );
    }

    public function AddUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password1 = password_hash($password, PASSWORD_DEFAULT);
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $activated = $_POST['activated'];
            $img = $_FILES['img']['name'];

            $res = $this->User->AddUser($username, $password1, $full_name, $img, $email, $phone, $address, $activated);
            move_uploaded_file($_FILES['img']['tmp_name'], './public/images/uploads/users/' . $img);
            if ($res) {
                header('location: ../User');
            }
        } else {
            $this->callView('MasterAdmin', [
                'Page' => 'AddUserPage',
                'ListUser' => $this->User->GetUser(),
            ]);
        }
    }

    function ShowUpdate($id)
    {
        $res = $this->User->GetUserById($id);
        $this->callView(
            'MasterAdmin',
            [
                'Page' => 'UpdateUserPage',
                'GetUserId' => mysqli_fetch_assoc($res),
            ]
        );
    }

    public function UpdateUser()
    {
        $id = $_POST['idUser'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $activated = $_POST['activated'];
        $img = $_POST['img'];
        $up_img = $_FILES['up_img']['name'];

        if (empty($_FILES['up_img']['size'])) {
            $res = $this->User->UpdateUser($id, $username, $password, $full_name, $img, $email, $phone, $address, $activated);
        } else {
            $res = $this->User->UpdateUser($id, $username, $password, $full_name, $up_img, $email, $phone, $address, $activated);
        }
        move_uploaded_file($_FILES['up_img']['tmp_name'], './public/images/uploads/users/' . $up_img);
        if ($res) {
            header('location: ../User');
        }
    }

    public function DeleteUser($id)
    {
        $res = $this->User->DeleteUser($id);
        if ($res) {
            header('location: ../User');
        }
    }
}
