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
use \App\OrderItem;
/**
 * Class Orders
 *
 * @property \App\Order $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Orders extends Section implements Initializable
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
               AdminColumn::text('email', 'Email'),
               AdminColumn::text('totalSum', 'Total'),
               AdminColumn::text('status', 'Status'),
               AdminColumn::datetime('created_at', 'Date')->setFormat('d.m.Y h.i')
           )->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $table = AdminDisplay::table();
        $table->setModelClass(OrderItem::class);
        $table->with('product');
        $table->setApply(function($query) use ($id){
            $query->where('order_id', '=', $id);
        });

        $table->setColumns(
                AdminColumn::text('product.name', 'Product'),
                AdminColumn::text('product_id', 'product'),
                AdminColumn::text('qty', 'Qty'),
                AdminColumn::text('price', 'Price')
            );
        return $table;
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
