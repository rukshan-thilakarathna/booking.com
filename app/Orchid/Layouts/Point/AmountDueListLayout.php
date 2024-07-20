<?php

namespace App\Orchid\Layouts\Point;

use App\Models\Point_transactions;
use App\Models\Properties;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class AmountDueListLayout extends Table
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
     * @throws \ReflectionException
     */
    protected function columns(): iterable
    {

        return [
            TD::make('id', __('User Id')),
            TD::make('name', __('User Name')),
            TD::make('mobile_number', __('Mobile Number')),
            TD::make('email', __('Email')),
            TD::make('Amount_due', __('Amount (USD)')),
            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (User $user) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([
                        Button::make(__('Paid'))
                            ->method('Paid', [
                                'id' => $user->id,
                            ]),
                    ])),


        ];
    }
}
