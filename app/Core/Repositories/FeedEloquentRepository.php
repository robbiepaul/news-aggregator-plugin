<?php namespace NewsAggregator\Core\Repositories;

use Carbon\Carbon;
use NewsAggregator\Models\Feed;

class FeedEloquentRepository implements RepositoryInterface
{
    /**
     * Retrieve a single feed by ID
     * @param $id
     * @return Feed
     */
    public function getById($id)
    {
        return Feed::find($id);
    }

    /**
     * Pass the model as the only argument and return boolean if saved.
     * @param $model
     * @return boolean
     */
    public function save($model)
    {
        return $model->save();
    }

    /**
     * Return all feeds as array
     * @return array
     */
    public function getAll()
    {
        $feeds = Feed::all();

        return $feeds->toArray();
    }

    public function create($data)
    {
        $feed = Feed::create($data);
        return $feed;
    }

    public function checked($model)
    {
        $model->last_checked_at = new Carbon;
        return $model->save();
    }
}