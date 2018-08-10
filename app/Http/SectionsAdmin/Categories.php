<?php

namespace App\Http\SectionsAdmin;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

/**
 * Class Categories
 *
 * @property \App\Category $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Categories extends Section implements Initializable
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
            return \App\Category::count();
        });
    }

    public function onDisplay()
    {
        return AdminDisplay::table()
           ->setHtmlAttribute('class', 'table-primary')
           ->setColumns(
               AdminColumn::text('id', '#')->setWidth('30px'),
               AdminColumn::link('name', 'Name'),
               AdminColumn::image('image', 'Image'),
               AdminColumn::text('meta_description', 'Meta description'),
               AdminColumn::text('meta_title', 'Meta title')
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
                AdminFormElement::wysiwyg('description', 'Description'),
                AdminFormElement::image('image', 'Image')->required(),
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
