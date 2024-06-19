<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Rooms;

use App\Models\PropertyType;
use App\Models\User;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;

class RoomCreateAndUpdateLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('room.number')
                ->type('number')
                ->required()
                ->title(__('Room Number'))
                ->placeholder(__('Room Number')),

            Input::make('room.price')
                ->type('string')
                ->required()
                ->title(__('Price'))
                ->placeholder(__('Price')),

            Input::make('room.point_price')
                ->type('string')
                ->required()
                ->title(__('Point Price'))
                ->placeholder(__('Point Price')),

            Input::make('room.adults')
                ->type('number')
                ->required()
                ->title(__('Adults'))
                ->placeholder(__('Adults')),

            Input::make('room.Children')
                ->type('number')
                ->title(__('Children'))
                ->placeholder(__('Children')),

            Input::make('room.dicecount')
                ->type('string')
                ->title(__('Dicecount'))
                ->placeholder(__('Dicecount')),

            Input::make('room.display_price')
                ->type('string')
                ->required()
                ->title(__('Display Price'))
                ->placeholder(__('Display Price')),

            TextArea::make('room.user_choice')
                ->rows(5)
                ->title(__('User Choice')),

            CheckBox::make('room.open_point_or_cash')
                ->value('0')
                ->checked(false)
                ->placeholder('Open Point'),

            Input::make('room.images')
                ->type('file')
                ->title('One Image input '),
        ];
    }
}
