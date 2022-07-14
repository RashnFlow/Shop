<?php

use yii\db\Migration;

/**
 * Class m220714_101116_create_product
 */
class m220714_101116_create_product_table extends Migration
{
    public function up()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey()->comment('Уникальный идентификатор'),
            'category_id' => $this->integer(10)->notNull()->comment('Родительская категория'),
            'brand_id' => $this->integer(10)->notNull()->comment('Идентификатор бренда'),
            'name' => $this->string(255)->notNull()->comment('Наименование товара'),
            'content' => $this->text()->comment('Описание товара'),
            'price' => $this->decimal(10,2)->notNull()->defaultValue(0.00)->comment('Цена товара'),
            'keywords' => $this->string(255)->null()->comment('Мета-тег keywords'),
            'description' => $this->string(255)->null()->comment('Мета-тег description'),
            'image' => $this->string(255)->null()->comment('Имя файла изображения'),
            'hit' => $this->tinyInteger(1)->notNull()->defaultValue(0)->comment('Лидер продаж?'),
            'new' => $this->tinyInteger(1)->notNull()->defaultValue(0)->comment('Новый товар?'),
            'sale' => $this->tinyInteger(1)->notNull()->defaultValue(0)->comment('Распродажа?'),
        ]);

        $this->addForeignKey(
            'fk-category_id',
            'product',
            'category_id',
            'category',
            'id',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-category_id',
            'product'
        );

        $this->dropTable('product');
    }
}
