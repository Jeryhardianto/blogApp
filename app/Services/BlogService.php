<?php 
namespace App\Services;

interface BlogService
    {
        // Backend Page
        public function getBlogByIduser($id);
        public function saveBlog($data);
        public function updateBlog($data);

        // Frontend page
        public function getAll();
        public function getBySlug($slug);
        public function waktuPostBlog($slug);
     
    }

?>