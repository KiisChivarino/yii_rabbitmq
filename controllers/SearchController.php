<?php

namespace app\controllers;

use app\models\SearchServiceJob;
use app\services\HighestPriorityService;
use app\services\LowPriorityService;
use app\services\MiddlePriorityService;
use yii\rest\Controller;
use Yii;

class SearchController extends Controller
{

    public function actionIndex(){
        $queue1Id = Yii::$app->queue1->push(
            new SearchServiceJob([
                'searchService' => new HighestPriorityService(),
            ])
        );

        $queue2Id = Yii::$app->queue2->push(
            new SearchServiceJob([
                'searchService' => new MiddlePriorityService(),
            ])
        );

        $queue3Id = Yii::$app->queue3->push(
            new SearchServiceJob([
                'searchService' => new LowPriorityService(),
            ])
        );

        return "$queue1Id, $queue2Id, $queue3Id";
    }
}