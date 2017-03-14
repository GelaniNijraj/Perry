<?php

/**
 * Created by Nijraj Gelani.
 * Date: 3/6/17
 * Time: 11:00 AM
 */
use Illuminate\Database\Capsule\Manager as Capsule;

class Category extends Base {
    public static $table = "category";
    public static $primary_key = "id";

    public function getPostsCount(){
        return Capsule::table("post")->where("category", "=", $this->id)->count();
    }
}