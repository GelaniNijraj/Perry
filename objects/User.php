<?php
/**
 * Created by Nijraj Gelani.
 * Date: 2/24/17
 * Time: 7:45 PM
 */

use Illuminate\Database\Capsule\Manager as Capsule;


class User extends Base {
    public static $table = "user";
    public static $primary_key = "id";
    private static $activeUser;

    public function getBlogs(){
        $data = Capsule::table("blog")->where("user", "=", $this->id)->get();
        $blogs = array();
        foreach ($data as $blog){
            $b = new Blog(null);
            $b->load($blog);
            array_push($blogs, $b);
        }
        return $blogs;
    }

    public function owns($id){
        return Capsule::table("blog")->where([
            ["user", "=", $this->id],
            ["id", "=", $id]
        ])->exists();
    }

    public static function verifyLogin(string $username, string $password){
        $result = Capsule::table('user')->where([
            ["email", "=", $username]
        ])->get()->first();
        if($result != null) {
            if(password_verify($password, $result->password))
                return $result->id;
            else
                return null;
        }else
            return null;
    }

    public static function getCurrentUser(){
        // Return the user instance if exists or else create a new one
        return User::$activeUser ?? new User($_SESSION['id']);
    }

    public static function isLoggedIn(){
        return isset($_SESSION['id']);
    }
}