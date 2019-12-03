<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2019 Power Kernel
 */

namespace app\controllers;

use app\models\GarageSearch;
use Yii;
use yii\rest\ActiveController;
use yii\web\Response;

/**
 * Class GarageController
 * @package app\controllers
 */
class GarageController extends ActiveController
{
    /**
     * inheritDoc
     * @var string
     */
    public $modelClass = 'app\models\Garage';

    /**
     * inheritDoc
     * @var array
     */
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'garages',
    ];

    /**
     * @inheritDoc
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ]
        ];
        return $behaviors;
    }

    /**
     * search
     * @return array|\yii\data\ActiveDataProvider
     */
    public function actionSearch()
    {
        $searchModel = new GarageSearch();
        return $searchModel->search(Yii::$app->request->queryParams);
    }
}