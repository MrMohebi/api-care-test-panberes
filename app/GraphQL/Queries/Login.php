<?php

namespace App\GraphQL\Queries;

use App\Models\User;

class Login
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args):User{
        $username = $args["username"];
        $password = $args["password"];
        $user =  User::where("username", $username)->first();
        if($user->password){
            if(password_verify($password, $user->password)){
                $token = self::randomStringLower(32);
                $user->token = $token;
                $user->save();
                unset($user->password);
                return $user;
            }
        }
        $emptyUser = new User;
        $emptyUser->token = "username or password is incorrect";
        return $emptyUser;
    }
    private static function randomStringLower(int $length = 10):string {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}



