<?php 
namespace App\Services;

use App\Services\Impl\UserServiceImpl;

interface UserService
{
        public function updateUser($request, $user);
        public function updatePass($request, $user);
       
}

?>