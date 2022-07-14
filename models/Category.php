<?php


namespace app\models;


class Category extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    /**
     * Возвращает товары категории
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }

    /**
     * Возвращает родительскую категорию
     */
    public function getParent() {
        return $this->hasOne(self::class, ['id' => 'parent_id']);
    }

    /**
     * Возвращает дочерние категории
     */
    public function getChildren() {
        return $this->hasMany(self::class, ['parent_id' => 'id']);
    }
}