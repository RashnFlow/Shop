<?php

use yii\db\Migration;

/**
 * Class m220714_101056_create_category
 */
class m220714_101056_create_category_table extends Migration
{
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey()->comment('Уникальный идентификатор'),
            'parent_id' => $this->integer(10)->defaultValue(0)->notNull()->comment('Родительская категория'),
            'name' => $this->string(255)->notNull()->comment('Наименование категории'),
            'content' => $this->string(255)->null()->comment('Описание категории'),
            'keywords' => $this->string(255)->null()->comment('Мега-тег keywords'),
            'description' => $this->string(255)->null()->comment('Мега-тег description'),
            'image' => $this->string(255)->null()->comment('Имя файла изабражения')
        ]);
    }

    public function down()
    {
        $this->dropTable('category');
    }
}
