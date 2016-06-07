<?php namespace NewsAggregator;

/** @var \Herbert\Framework\Router $router */

$router->get([
    'as'   => 'checkFeed',
    'uri'  => '/feed/{id}/check',
    'uses' => __NAMESPACE__ . '\Controllers\FeedsController@check'
]);