<?php

namespace App\GraphQL\Queries;

use App\Models\User;

class Login
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args):string{
        $username = $args["username"];
        $password = $args["password"];
        $user =  User::where("username", $username)->first();
        if($user->password){
            if(password_verify($password, $user->password)){
                $token = self::randomStringLower(32);
                $user->token = $token;
                $user->save();
                return $token;
            }
            return "username is incorrect";
        }
        return "username or password is incorrect";
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



