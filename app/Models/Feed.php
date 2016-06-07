<?php namespace NewsAggregator\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Feed extends Eloquent {

    protected $table = 'na_feeds';

    protected $guarded = ['id'];

    public $timestamps = true;

    public $dates = ['created_at', 'updated_at', 'last_checked_at'];

    public static function getAppendCode($url)
    {
        return '<p><a href="'.$url.'" target="_blank" class="external">View original post: '.$url.'</a></p>';
    }
}