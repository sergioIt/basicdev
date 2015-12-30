<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 30.12.15
 * Time: 17:27
 */

namespace app\models;

use Yii;
use yii\helpers;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

    /**
     * Определяет поля, выводимые по умолчанию
     * @return array
     */
    public function fields()
    {
        return [
            'id',
            'title',
        ];
    }

    /**
     * Определяем дополнительные поля
     * выводтся по запросу ?expand=products
     * @return array
     */
    public function extraFields()
    {
        return ['products' =>
            function () {
                $products = [];
                $productsObj = Product::findAll(['category_id' => $this->id]);
                if (!empty($productsObj)) {

                    // собираем массив товаров, который сможет переварить встроенный парсер
                    foreach ($productsObj as $productObj) {
                        $product = [];
                        $product['id'] = $productObj->id;
                        $product['title'] = $productObj->title;
                        $products[] = $product;
                    }

                }
                return $products;
            }

        ];
    }
}