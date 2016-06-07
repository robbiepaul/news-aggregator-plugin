<?php namespace NewsAggregator;

/** @var \Herbert\Framework\Shortcode $shortcode */

$shortcode->add(
    'content_submission_form',
    __NAMESPACE__ . '\Controllers\FeedsController@showSubmissionForm'
);