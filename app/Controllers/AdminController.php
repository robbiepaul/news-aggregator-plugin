<?php namespace NewsAggregator\Controllers;

use Herbert\Framework\Http;
use Herbert\Framework\Notifier;

class AdminController {

    public $optionName = 'news_aggregator_settings';

    public function configure()
    {
        return view('@NewsAggregator/admin/configure.twig', ['fd' => $this->getOptions() ] );
    }

    public function save(Http $http)
    {
        $inputs = [];
        $inputs['auto_publish'] = $http->get('auto_publish', 0);
        $inputs['allow_submissions'] = $http->get('allow_submissions', 0);

        update_option($this->optionName, $inputs);
        Notifier::success('Settings have been saved', true);
        return redirect_response( panel_url('NewsAggregator::configure') );
    }

    public function getOptions()
    {
        return get_option($this->optionName);
    }


}