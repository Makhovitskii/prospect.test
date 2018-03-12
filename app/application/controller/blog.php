<?php

class Blog extends Controller
{
    public function index()
    {
        $blogPosts = $this->model->getBlogPosts();

        $abs = 1;
        require APP . 'view/_templates/header.php';
        require APP . 'view/blog/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function post($posID)
    {
        $blogPost = $this->model->getBlogPost($posID);
        $similar = $this->model->getSimilarBlogPosts($posID);

        $abs = 1;
        require APP . 'view/_templates/header.php';
        require APP . 'view/blog/post.php';
        require APP . 'view/_templates/footer.php';
    }
}