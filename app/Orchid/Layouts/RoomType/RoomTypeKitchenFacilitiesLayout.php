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

class RoomTypeKitchenFacilitiesLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            \Orchid\Screen\Fields\Group::make([
                CheckBox::make('kitchenfacilities[]')
                    ->value('Refrigerator')
                    ->checked(false)
                    ->placeholder('Refrigerator'),

                CheckBox::make('kitchenfacilities[]')
                    ->value('Microwave')
                    ->checked(false)
                    ->placeholder('Microwave'),

                CheckBox::make('kitchenfacilities[]')
                    ->value('Electric kettle')
                    ->checked(false)
                    ->placeholder('Electric kettle'),
            ],),
            \Orchid\Screen\Fields\Group::make([
                CheckBox::make('kitchenfacilities[]')
                    ->value('Outdoor dining area')
                    ->checked(false)
                    ->placeholder('Outdoor dining area'),

                CheckBox::make('kitchenfacilities[]')
                    ->value('Stovetop')
                    ->checked(false)
                    ->placeholder('Stovetop'),

                CheckBox::make('kitchenfacilities[]')
                    ->value('Dining area')
                    ->checked(false)
                    ->placeholder('Dining area'),
            ],),

            \Orchid\Screen\Fields\Group::make([
                CheckBox::make('kitchenfacilities[]')
                    ->value('Oven')
                    ->checked(false)
                    ->placeholder('Oven'),

                CheckBox::make('kitchenfacilities[]')
                    ->value('Toaster')
                    ->checked(false)
                    ->placeholder('Toaster'),

                CheckBox::make('kitchenfacilities[]')
                    ->value('Dining table')
                    ->checked(false)
                    ->placeholder('Dining table'),
            ],),
            \Orchid\Screen\Fields\Group::make([
                CheckBox::make('kitchenfacilities[]')
                    ->value('Tea/Coffee maker')
                    ->checked(false)
                    ->placeholder('Tea/Coffee maker'),

                CheckBox::make('kitchenfacilities[]')
                    ->value('Kitchenware')
                    ->checked(false)
                    ->placeholder('Kitchenware'),

                CheckBox::make('kitchenfacilities[]')
                    ->value('Outdoor furniture')
                    ->checked(false)
                    ->placeholder('Outdoor furniture'),
            ],),




        ];
    }
}
