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

class RoomsListLayout extends Table
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
            TD::make('id', __('Room Id'))->filter()->sort(),
            TD::make('number', __('Room Number'))->filter()->sort(),
            TD::make('roomType.name', __('Room Type')),
            TD::make('property.name', __('Property Name')),
            TD::make('price', __('Price'))->filter()->sort(),
            TD::make('dicecount', __('Discount (%)'))->filter()->sort(),
            TD::make('display_price', __('Total Price'))->filter()->sort(),
            TD::make('point_price', __('Point Price'))->filter()->sort()->defaultHidden(),
            TD::make('status', __('Availability'))->sort()->filter()->render(function (Rooms $rooms){
                return config('constants.RoomStatus')[$rooms->status];
            }),
            TD::make('created_at', __('Created'))
                ->usingComponent(DateTimeSplit::class)
                ->filter()
                ->sort()
                ->defaultHidden()
                ->align(TD::ALIGN_RIGHT),

            TD::make('updated_at', __('Last edit'))
                ->usingComponent(DateTimeSplit::class)
                ->filter()
                ->defaultHidden()
                ->align(TD::ALIGN_RIGHT),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Rooms $room) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([
                        Link::make(__('Edit'))
                            ->route('room-edit', $room->id),
                        Link::make(__('View'))
                            ->route('room-view', $room->id),
                        Button::make(__('Delete'))
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $room->id,
                            ]),

                    ])),
        ];
    }
}
