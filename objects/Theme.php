<?php

/**
 * Created by Nijraj Gelani.
 * Date: 3/20/17
 * Time: 7:55 PM
 */

use Illuminate\Database\Capsule\Manager as Capsule;

class Theme extends Base {
    public static $table = "theme";
    public static $primary_key = "id";

    public static function all(){
        $data = Capsule::table("theme")->get();
        $themes = array();
        foreach ($data as $d){
            $t = new Theme();
            $t->load($d);
            $themes[] = $t;
        }
        return $themes;
    }
}
