<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Property;

use App\Models\PropertyType;
use App\Models\User;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;

class PropertyEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
               Input::make('name')
                   ->type('text')
                   ->max(255)
                   ->required()
                   ->title(__('Property Name'))
                   ->placeholder(__('Name')),

               Select::make('type')
                   ->fromModel(PropertyType::class, 'name')
                   ->title(__('Property Type'))
                   ->required(),

               TextArea::make('description')
                   ->title('Example Description')
                   ->rows(6),

                Upload::make('image')
                    ->title('Upload images'),
        ];
    }
}
