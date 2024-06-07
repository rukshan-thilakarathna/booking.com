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

class RoomTypeEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('roomtype.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('property Name'))
                ->placeholder(__('Name')),

            Input::make('roomtype.room_size')
                ->type('number')
                ->required()
                ->title(__('Room Size'))
                ->placeholder(__('Room Size')),

            Upload::make('image')
                ->title('Upload images'),

            TextArea::make('roomtype.description')
                ->title(' Description')
                ->rows(6),

            CheckBox::make('smoking')
                ->value(2)
                ->title('Smoking')
                ->checked(false)
                ->placeholder('ok'),
        ];
    }
}