<?php
class Usermetum extends ActiveRecord\Model{
    static $table_name = 'user_meta';
    static $belongs_to = array(
        array('user', 'foreign_key' => 'user_id', 'class_name' => 'Users_Model')
    );
}