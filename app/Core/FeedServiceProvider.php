<?php namespace NewsAggregator\Core;

use NewsAggregator\Models\Feed;

class FeedServiceProvider
{
    protected $feedServices = [
        'rss' => 'NewsAggregator\\Core\\Services\\RSSFeed'
    ];

    public function get($type)
    {
        return (new $this->feedServices[$type]);
    }

    public function all()
    {
        $services = [];
        foreach($this->feedServices as $type => $classname) {
            $class = $this->get($type);
            $services[$type] = $class->name;
        }
        return $services;
    }

    public function check(Feed $feed)
    {
        $service = $this->get($feed->type);
        $results = $service->fetch($feed->url);
        return $results;
    }
}