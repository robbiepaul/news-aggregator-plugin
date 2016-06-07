<?php namespace NewsAggregator;

/** @var \Herbert\Framework\Panel $panel */

$panel->add([
    'type'   => 'panel',
    'as'     => 'mainPanel',
    'title'  => 'News Aggregator',
    'slug'   => 'news-aggregator',
    'icon'   => 'dashicons-networking',
    'uses'   => function()
    {
        return '';
    }
]);
$panel->add([
    'type'   => 'sub-panel',
    'parent' => 'mainPanel',
    'as'     => 'feeds',
    'title'  => 'Feeds',
    'slug'   => 'news-aggregator',
    'uses'   => __NAMESPACE__ . '\Controllers\FeedsController@showAll'
]);
$panel->add([
    'type'   => 'sub-panel',
    'parent' => 'mainPanel',
    'as'     => 'add-feed',
    'title'  => 'Add new Feed',
    'slug'   => 'news-aggregator-add-new-feed',
    'uses'   => __NAMESPACE__ . '\Controllers\FeedsController@create',
    'post'   => __NAMESPACE__.'\Controllers\FeedsController@store',
]);
$panel->add([
    'type'   => 'sub-panel',
    'parent' => 'mainPanel',
    'as'     => 'configure',
    'title'  => 'Configure',
    'slug'   => 'news-aggregator-configure',
    'uses'   => __NAMESPACE__ . '\Controllers\AdminController@configure',
    'post'   => __NAMESPACE__.'\Controllers\AdminController@save',
]);