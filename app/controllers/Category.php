<?php
class Category extends Controller
{
   public $Categories;

   function __construct()
   {
      if (isset($_SESSION['admin'])) {
         if ($this->checkAdmin()) {
            header('location: ./Dashboard');
         }
      } else {
         header('location: ./LogoutAdmin');
      }
      $this->Categories = $this->callModel('CategoryModel');
   }

   function Show()
   {
      $this->callView(
         'MasterAdmin',
         [
            'Page' => 'ListCategoryPage',
            'ListCategory' => $this->Categories->GetCategoryStaff(),
         ]
      );
   }

   public function AddCategory()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $categoryName = $_POST['CategoryName'];
         $idStaff = $_SESSION['admin']['id'];
         $res = $this->Categories->AddCategory($categoryName, $idStaff);
         if ($res) {
            header('location: ../Category');
         }
      } else {
         $this->callView('MasterAdmin', ['Page' => 'AddCategoryPage']);
      }
   }

   function ShowUpdate($id)
   {
      $res = $this->Categories->GetCategoryById($id);
      $this->callView(
         'MasterAdmin',
         [
            'Page' => 'UpdateCategoryPage',
            'GetCategoryId' => mysqli_fetch_assoc($res),
         ]
      );
   }

   public function UpdateCategory()
   {
      $id = $_POST['id'];
      $categoryName = $_POST['CategoryName'];
      $idStaff = $_POST['idStaff'];
      $res = $this->Categories->UpdateCategory($id, $categoryName, $idStaff);
      if ($res) {
         header('location: ../Category');
      }
   }

   public function DeleteCategory($id)
   {
      $res = $this->Categories->DeleteCategory($id);
      if ($res) {
         header('location: ../Category');
      }
   }

   // public function DeleteCategoryAll($id)
   // {
   //    $id = $_POST['maDanhMuc[]'];
   //    $res = $this->Categories->DeleteCategory($id);
   //    if ($res) {
   //       header('location: ../Category');
   //    }
   // }

}
