<?php
class Post extends Controller
{
    public $Post;
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
        $this->Post = $this->callModel('PostModel');
        $this->CategoryPost = $this->callModel('CategoryPostModel');
    }

    function Show()
    {
        $this->callView(
            'MasterAdmin',
            [
                'Page' => 'ListPostPage',
                'ListPost' => $this->Post->GetPostCategoryStaff(),
                'ListCategoryPost' => $this->CategoryPost->GetCategoryPost(),
            ]
        );
    }

    public function AddPost()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $id_category_post = $_POST['id_category_post'];
            $post_date = $_POST['post_date'];
            $view = $_POST['view'];
            $status = $_POST['status'];
            $describe_short = $_POST['describe_short'];
            $content = $_POST['content'];
            $id_staff = $_SESSION['admin']['id'];
            $img = $_FILES['img']['name'];

            $res = $this->Post->AddPost($title, $describe_short, $content, $img, $status, $view, $post_date, $id_category_post, $id_staff);
            move_uploaded_file($_FILES['img']['tmp_name'], './public/images/uploads/news/' . $img);
            if ($res) {
                header('location: ../Post');
            }
        } else {
            $this->callView('MasterAdmin', [
                'Page' => 'AddPostPage',
                'ListPost' => $this->Post->GetPost(),
                'ListCategoryPost' => $this->CategoryPost->GetCategoryPost(),
            ]);
        }
    }

    function ShowUpdate($id)
    {
        $res = $this->Post->GetPostById($id);
        $this->callView(
            'MasterAdmin',
            [
                'Page' => 'UpdatePostPage',
                'GetPostId' => mysqli_fetch_assoc($res),
                'ListCategoryPost' => $this->CategoryPost->GetCategoryPost(),
            ]
        );
    }

    public function UpdatePost()
    {
        $id = $_POST['idPost'];
        $title = $_POST['title'];
        $id_category_post = $_POST['id_category_post'];
        $post_date = $_POST['post_date'];
        $view = $_POST['view'];
        $status = $_POST['status'];
        $describe_short = $_POST['describe_short'];
        $content = $_POST['content'];
        $id_staff = $_POST['id_staff'];
        $img = $_POST['img'];
        $up_img = $_FILES['up_img']['name'];

        if (empty($_FILES['up_img']['size'])) {
            $res = $this->Post->UpdatePost($id, $title, $describe_short, $content, $img, $status, $view, $post_date, $id_category_post, $id_staff);
        } else {
            $res = $this->Post->UpdatePost($id, $title, $describe_short, $content, $up_img, $status, $view, $post_date, $id_category_post, $id_staff);
        }
        move_uploaded_file($_FILES['up_img']['tmp_name'], './public/images/uploads/news/' . $up_img);
        if ($res) {
            header('location: ../Post');
        }
    }

    public function DeletePost($id)
    {
        $res = $this->Post->DeletePost($id);
        if ($res) {
            header('location: ../Post');
        }
    }
}
