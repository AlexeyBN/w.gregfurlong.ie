<?php
class Tweets_Model extends ActiveRecord\Model{
    static $table_name = 'tweets';
    static $belongs_to = array(
        array('user', 'foreign_key' => 'user_id', 'class_name' => 'Users_Model'),
    );

}