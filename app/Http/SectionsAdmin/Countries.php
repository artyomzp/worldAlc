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
 * Class Countries
 *
 * @property \App\Country $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Countries extends Section implements Initializable
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
               AdminColumn::link('name', 'Name')
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
            ]))->setLabel('Main Info');
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
