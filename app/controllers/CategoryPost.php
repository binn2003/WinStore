<?php
class CategoryPost extends Controller
{
   public $CategoryPost;

   function __construct()
   {
      if (isset($_SESSION['admin'])) {
         if ($this->checkAdmin()) {
            header('location: ./Dashboard');
         }
      }else{
         header('location: ./LogoutAdmin');
      }
      $this->CategoryPost = $this->callModel('CategoryPostModel');
   }

   function Show()
   {
      $this->callView(
         'MasterAdmin',
         [
            'Page' => 'ListCategoryPostPage',
            'ListCategoryPost' => $this->CategoryPost->GetCategoryPostStaff(),
         ]
      );
   }

   public function AddCategoryPost()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $categoryPostName = $_POST['CategoryPostName'];
         $idStaff = $_SESSION['admin']['id'];
         $res = $this->CategoryPost->AddCategoryPost($categoryPostName, $idStaff);
         if ($res) {
            header('location: ../CategoryPost');
         }
      } else {
         $this->callView('MasterAdmin', ['Page' => 'AddCategoryPostPage']);
      }
   }

   function ShowUpdate($id)
   {
      $res = $this->CategoryPost->GetCategoryPostById($id);
      $this->callView(
         'MasterAdmin',
         [
            'Page' => 'UpdateCategoryPostPage',
            'GetCategoryPostId' => mysqli_fetch_assoc($res),
         ]
      );
   }

   public function UpdateCategoryPost()
   {
      $id = $_POST['id'];
      $categoryPostName = $_POST['CategoryPostName'];
      $idStaff = $_POST['idStaff'];
      $res = $this->CategoryPost->UpdateCategoryPost($id, $categoryPostName, $idStaff);
      if ($res) {
         header('location: ../CategoryPost');
      }
   }

   public function DeleteCategoryPost($id)
   {
      $res = $this->CategoryPost->DeleteCategoryPost($id);
      if ($res) {
         header('location: ../CategoryPost');
      }
   }
}
