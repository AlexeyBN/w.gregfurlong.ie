<?php
/**
 * Created by PhpStorm.
 * User: HuuHien
 * Date: 5/16/2015
 * Time: 8:38 PM
 */

class Cron extends Controller {

    public function post_tweets()
    {
        $tweets = Tweets_Model::find('all', array(
            'is_posted' => false,
        ));

        foreach ($tweets as $tweet) {
            if (time() > $tweet->date) {
                $status = $tweet->post_to();

                if (isset($status->id) && $status->id > 0) {
                    $tweet->is_posted = true;
                    $tweet->save();
                }
            }
        }
    }

}