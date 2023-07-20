<?php
class Comment extends Controller
{
    public $CommentModel;

    function __construct()
    {
        if (isset($_SESSION['admin'])) {
            if ($this->checkAdmin()) {
                header('location: ./Dashboard');
            }
        } else {
            header('location: ./LogoutAdmin');
        }
        $this->CommentModel = $this->callModel('CommentModel');
    }

    public function Show()
    {
        $this->callView(
            'MasterAdmin',
            [
                'Page' => 'ListCommentPage',
                'ListComment' => $this->CommentModel->CommentStatistical(),
            ]
        );
    }

    public function DetailComment($id)
    {
        $this->callView(
            'MasterAdmin',
            [
                'Page' => 'DetailCommentPage',
                'DetailComment' => $this->CommentModel->CommentSelectByProduct($id),
            ]
        );
    }

    public function DeleteComment($id)
   {
      $res = $this->CommentModel->DeleteComment($id);
      if ($res) {
         header('location: ../Comment');
      }
   }
}
