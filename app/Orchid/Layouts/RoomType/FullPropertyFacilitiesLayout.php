<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\RoomType;

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

class FullPropertyFacilitiesLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('roomtype.bedroom_count')
                ->type('number')
                ->required()
                ->title(__('Number of Bedroom'))
                ->placeholder(__('Number of Bedroom')),

            Input::make('roomtype.wshroom_count')
                ->type('number')
                ->required()
                ->title(__('Number of Washroom'))
                ->placeholder(__('Number of Washroom')),

            Input::make('roomtype.kitchen_count')
                ->type('number')
                ->required()
                ->title(__('Number of Kitchen'))
                ->placeholder(__('Number of Kitchen')),

        ];
    }
}
