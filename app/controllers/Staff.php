<?php
class Staff extends Controller
{
    public $Staff;

    function __construct()
    {
        if (isset($_SESSION['admin'])) {
            if ($this->checkAdmin(true)) {
               header('location: ./Dashboard');
            }
         }else{
            header('location: ./LogoutAdmin');
         }
        $this->Staff = $this->callModel('StaffModel');
    }

    function Show()
    {
        $this->callView(
            'MasterAdmin',
            [
                'Page' => 'ListStaffPage',
                'ListStaff' => $this->Staff->GetStaff(),
            ]
        );
    }

    public function AddStaff()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password1 = password_hash($password, PASSWORD_DEFAULT);
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $cmnd = $_POST['cmnd'];
            $role = $_POST['role'];
            $img = $_FILES['img']['name'];

            $res = $this->Staff->AddStaff($username, $password1, $full_name, $img, $email, $phone, $address, $cmnd, $role);
            move_uploaded_file($_FILES['img']['tmp_name'], './public/images/uploads/users/' . $img);
            if ($res) {
                header('location: ../Staff');
            }
        } else {
            $this->callView('MasterAdmin', [
                'Page' => 'AddStaffPage',
                'ListStaff' => $this->Staff->GetStaff(),
            ]);
        }
    }

    function ShowUpdate($id)
    {
        $res = $this->Staff->GetStaffById($id);
        $this->callView(
            'MasterAdmin',
            [
                'Page' => 'UpdateStaffPage',
                'GetStaffId' => mysqli_fetch_assoc($res),
            ]
        );
    }

    public function UpdateStaff()
    {
        $id = $_POST['idStaff'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $cmnd = $_POST['cmnd'];
        $role = $_POST['role'];
        $img = $_POST['img'];
        $up_img = $_FILES['up_img']['name'];

        if (empty($_FILES['up_img']['size'])) {
            $res = $this->Staff->UpdateStaff($id, $username, $password, $full_name, $img, $email, $phone, $address, $cmnd, $role);
        } else {
            $res = $this->Staff->UpdateStaff($id, $username, $password, $full_name, $up_img, $email, $phone, $address, $cmnd, $role);
        }
        move_uploaded_file($_FILES['up_img']['tmp_name'], './public/images/uploads/users/' . $up_img);
        if ($res) {
            header('location: ../Staff');
        }
    }

    public function DeleteStaff($id)
    {
        $res = $this->Staff->DeleteStaff($id);
        if ($res) {
            header('location: ../Staff');
        }
    }
}
