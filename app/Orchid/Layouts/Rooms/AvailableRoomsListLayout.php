<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Rooms;

use App\Models\Reviews;
use App\Models\Rooms;
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

class AvailableRoomsListLayout extends Table
{

    /**
     * @var string
     */

    public $target = 'rooms';

    /**
     * @return TD[]
     */

    public function columns(): array
    {
        return [
            TD::make('id', __('Room Id')),
            TD::make('number', __('Room Number')),
            TD::make('roomType.name', __('Room Type')),
            TD::make('property.name', __('Property Name')),
            TD::make('price', __('Price')),
            TD::make('dicecount', __('Discount (%)')),
            TD::make('display_price', __('Total Price')),
            TD::make('point_price', __('Point Price'))->defaultHidden(),
            TD::make('status', __('Availability'))->render(function (Rooms $rooms){
                return config('constants.RoomStatus')[$rooms->status];
            }),
            TD::make('created_at', __('Created'))
                ->usingComponent(DateTimeSplit::class)

                ->defaultHidden()
                ->align(TD::ALIGN_RIGHT),

            TD::make('updated_at', __('Last edit'))
                ->usingComponent(DateTimeSplit::class)

                ->defaultHidden()
                ->align(TD::ALIGN_RIGHT),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Rooms $room) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([
                        ModalToggle::make('Place new booking')
                            ->modal('Place new booking')
                            ->method('CreateBooking',[
                                'roomId'=>$room->id
                            ]),

                    ])),
        ];
    }
}
