<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\RoomType;

use App\Models\Reviews;
use App\Models\RoomType;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class RoomTypeListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'room_types';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('name', __('Name'))
            ->filter()
            ->sort(),


            TD::make('created_at', __('Created'))
                ->usingComponent(DateTimeSplit::class)
                ->filter()
                ->sort()
                ->align(TD::ALIGN_RIGHT),

            TD::make('updated_at', __('Last edit'))
                ->usingComponent(DateTimeSplit::class)
                ->filter()
                ->align(TD::ALIGN_RIGHT),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('200px')
                ->render(fn (RoomType $roomType) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        ModalToggle::make('Room Type View')
                            ->modal('Room Type View')
                            ->asyncParameters([
                                'roomtype'=>3
                            ]),
                    ])),

        ];
    }
}
