<?php namespace NewsAggregator\Core\Services;


interface FeedServiceInterface
{
    public function fetch($url);
}