<?php

/**
 * Created by Nijraj Gelani.
 * Date: 3/2/17
 * Time: 12:03 AM
 */
use Illuminate\Database\Capsule\Manager as Capsule;


class Base{
    public static $table;
    public static $primary_key;
    private $data = array();

    function __construct($id = null){
        if($id != null){
            $data = Capsule::table($this::$table)->where($this::$primary_key, "=", $id)->first();
            if($data != null){
                $this->id = $id;
                $this->data = array();
                foreach ($data as $key => $value)
                    $this->data[$key] = $value;
            }else{
                $this->data = null;
            }
        }
    }

    public function save(){
        if(!isset($this->data[$this::$primary_key])){
            $this->id = Capsule::table($this::$table)->insertGetId($this->data);
            return $this->id != null && $this->id != 0;
        }else{
            return Capsule::table($this::$table)->where($this::$primary_key, "=", $this->data[$this::$primary_key])->update($this->data);
        }
    }

    function __get($name){
        if(isset($this->data[$name]))
            return $this->data[$name];
        return null;
    }

    function __set($name, $value){
        $this->data[$name] = $value;
    }

    function load($data){
        foreach ($data as $key => $value)
            $this->data[$key] = $value;
    }

    public static function exists($id){
        return Capsule::table(Base::$table)->where(Base::$primary_key, "=", $id)->exists();
    }

    public static function cexists($col, $val){
        return Capsule::table(static::$table)->where($col, "=", $val)->exists();
    }

    public static function get($col, $val){
        $data = Capsule::table(static::$table)->where($col, "=", $val)->first();
        if($data != null){
            $obj = new static();
            $obj->load($data);
            return $obj;
        }
        return null;
    }
}