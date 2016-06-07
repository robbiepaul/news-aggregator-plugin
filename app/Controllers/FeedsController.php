<?php namespace NewsAggregator\Controllers;

use Herbert\Framework\Http;
use Herbert\Framework\Notifier;
use NewsAggregator\Core\FeedServiceProvider;
use NewsAggregator\Core\Repositories\FeedEloquentRepository;
use NewsAggregator\Models\Feed;

class FeedsController
{
    public function __construct()
    {
        $this->feedRepository = new FeedEloquentRepository;
        $this->feedServiceProvider = new FeedServiceProvider;
    }

    public function showAll()
    {
        $feeds = $this->feedRepository->getAll();
        return view('@NewsAggregator/feeds/all.twig', compact('feeds') );
    }

    public function create()
    {
        $services = $this->feedServiceProvider->all();
        return view('@NewsAggregator/feeds/create.twig', compact('services'));
    }

    public function store(Http $http)
    {
        $data = $http->only(['type', 'title', 'url']);
        $data['status'] = 'Active';
        $feed = $this->feedRepository->create($data);
        Notifier::success('Feed has been added successfully', true);
        return redirect_response( panel_url('NewsAggregator::feeds') );
    }

    public function showSubmissionForm()
    {
        return 'TODO: submission form html';
    }

    public function check($id)
    {
        $feed = $this->feedRepository->getById($id);
        $results = $this->feedServiceProvider->check($feed);
        Notifier::success('Successfully added '.count($results).' posts', true);
        $this->feedRepository->checked($feed);
        return redirect_response( panel_url('NewsAggregator::feeds') );

    }

}