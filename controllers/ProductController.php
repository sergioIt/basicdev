<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 30.12.15
 * Time: 17:56
 */

namespace app\controllers;

use yii\rest\ActiveController;

class ProductController extends ActiveController
{
    public $modelClass = 'app\models\Product';
}