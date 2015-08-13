<?php
class Users_Model extends ActiveRecord\Model{
    static $table_name = 'users';
    static $belongs_to = array(array('usermeta'));
}