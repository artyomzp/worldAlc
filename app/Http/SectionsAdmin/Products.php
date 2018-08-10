<?php

namespace App\Http\SectionsAdmin;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminColumnEditable;
use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

/**
 * Class Products
 *
 * @property \App\Product $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Products extends Section implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return \App\Product::count();
        });
    }
    public function onDisplay()
    {
        // remove if unused
        return AdminDisplay::datatablesAsync()->with('category', 'manufacture')
           ->setHtmlAttribute('class', 'table-primary')
           ->setColumns(
               AdminColumn::text('id', '#')->setWidth('30px'),
               AdminColumn::link('name', 'Name'),
               AdminColumn::image('image', 'Image'),
               AdminColumnEditable::text('price', 'Price'),
               AdminColumnEditable::select('category_id')->setWidth('250px')
                        ->setModelForOptions(new \App\Category)
                        ->setLabel('Категория')
                        ->setDisplay('name')
                        ->setTitle('Выберите категорию:'),
               AdminColumn::text('counrty.name', 'Country'),
               AdminColumn::text('manufacture.name', 'Man ID'),
               AdminColumnEditable::checkbox('recommended')->setLabel('Recommended')->setWidth('30px')
        )->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $tabs = AdminDisplay::tabbed();
        $tabs -> setTabs(function ($id){
            $tabs = [];

            $tabs[] = AdminDisplay::tab(AdminForm::elements([
                AdminFormElement::text('name', 'Name')->required(),
                AdminFormElement::text('price', 'Price')->required(),
                AdminFormElement::text('salePrice', 'Sale Price')->mutateValue(function($value){
                    return ($value=='')?null:$value;
                }),
                AdminFormElement::wysiwyg('description', 'Description'),
                AdminFormElement::image('image', 'Image')->required(),
                AdminFormElement::checkbox('recommended', 'Recomended'),
                AdminFormElement::checkbox('inStock', 'In Stock'),
                AdminFormElement::select('category_id', 'Category', \App\Category::class)
                ->setDisplay(function($category){
                    return $category->name;
                }),
                AdminFormElement::select('country_id', 'Country')
                    ->setModelForOptions(\App\Country::class)
                    ->setDisplay(function($country){
                     return $country->name;       
                    }),
                AdminFormElement::select('manufacture_id', 'Manufacture')
                    ->setModelForOptions(\App\Manufacture::class)
                    ->setDisplay(function($manufacture){
                    return $manufacture->name;
                }),
            ]))->setLabel('Main Info');

            $tabs[] = AdminDisplay::tab(AdminForm::elements([
                AdminFormElement::textarea('meta_description', 'Description'),
                AdminFormElement::text('meta_title', 'Title'),
                AdminFormElement::text('slug', 'Slug'),
            ]))->setLabel('SEO Info');

            return $tabs;
        });
        return AdminForm::panel()->setElements([$tabs]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
