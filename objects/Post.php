<?php

/**
 * Created by Nijraj Gelani.
 * Date: 2/26/17
 * Time: 1:07 AM
 */

use Illuminate\Database\Capsule\Manager as Capsule;

class Post extends Base {
    public static $table = "post";
    public static $primary_key = "id";

    public static function fallbackCategory($category){
        $categories = Blog::getCurrentBlog()->getCategories();
        $i = 0;
        while (($fallbackTo = $categories[$i++]->id) == $category);
        // Replace oldies with new category
        Capsule::table(static::$table)->where("blog", "=", Blog::getCurrentBlog()->id)->update(["category" => $fallbackTo]);
    }

    public static function deleteByBlog($blog){
        Capsule::table(static::$table)->where("blog", "=", $blog)->delete();
    }
}
