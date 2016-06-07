<?php namespace NewsAggregator\Core\Services;

use Herbert\Framework\Models\Post;
use NewsAggregator\Controllers\AdminController;
use NewsAggregator\Models\Feed;

class RSSFeed implements FeedServiceInterface
{
    public $name = 'RSS Feed';

    public function fetch($url)
    {
        $feed = new \SimplePie();
        $options = (new AdminController)->getOptions();
        $feed->set_feed_url($url);
        $success = $feed->init();
        $items = $feed->get_items();
        $posts = [];
        foreach($items as $item) {
            $post = new Post;
            $post->post_title = $item->get_title();
            $post->post_content = $item->get_content() . Feed::getAppendCode($item->get_permalink());
            $post->post_status = $options['auto_publish'] == 1 ? 'publish' : 'draft';
            $post->save();
            $posts[] = $post;
        }

        return $posts;
    }


}