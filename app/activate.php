<?php

/** @var  \Herbert\Framework\Application $container */
/** @var  \Herbert\Framework\Http $http */
/** @var  \Herbert\Framework\Router $router */
/** @var  \Herbert\Framework\Enqueue $enqueue */
/** @var  \Herbert\Framework\Panel $panel */
/** @var  \Herbert\Framework\Shortcode $shortcode */
/** @var  \Herbert\Framework\Widget $widget */

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('na_feeds', function($table)
{
    $table->increments('id');
    $table->string('title');
    $table->string('type');
    $table->string('url');
    $table->string('status');
    $table->dateTime('created_at');
    $table->dateTime('updated_at');
    $table->dateTime('last_checked_at');
});