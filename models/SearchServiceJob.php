<?php

namespace app\models;

class SearchServiceJob extends \yii\base\BaseObject implements \yii\queue\JobInterface
{

    public $searchService;

    /**
     * @inheritDoc
     */
    public function execute($queue)
    {
        return $this->searchService->handle();
    }
}