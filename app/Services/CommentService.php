<?php 
namespace App\Services;

interface CommentService
    {
        // Backend Route
        public function commentBlogByIdUser($slug);
        public function deleteCommnet($id);


        // Frontend Route
        public function commentBlog($slug);
        public function store($data);
       
    }

?>