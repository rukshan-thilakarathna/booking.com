<?php

namespace App\Orchid\Layouts\WishList;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class WishListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'data';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', __('Property Id')),
            TD::make('name', __('Property Name')),
            TD::make('email', __('Property Email')),
            TD::make('contact_number', __('Property Contact Number')),
        ];
    }
}
