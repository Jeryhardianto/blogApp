<?php 
namespace App\Services\Impl;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl  implements UserService
{
 
    public function updateUser($request, $user)
    {
        // Update user
       return User::where('id', $user->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
    }
    public function updatePass($request, $user)
    {
        // Update password
        return User::where('id', $user->id)
        ->update([
            'password' => Hash::make($request->password)
        ]);
    }

   


}



?>