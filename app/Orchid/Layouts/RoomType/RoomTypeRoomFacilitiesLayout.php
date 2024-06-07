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

class RoomTypeRoomFacilitiesLayout extends Rows
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
                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Air conditioning'),

                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Private pool'),
                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Private bathroom'),
            ],),
            \Orchid\Screen\Fields\Group::make([

                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Kitchen/kitchenette'),
                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Balcony'),

                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Shower'),
            ],),

            \Orchid\Screen\Fields\Group::make([
                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Refrigerator'),

                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('TV'),
                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Toilet'),
            ],),
            \Orchid\Screen\Fields\Group::make([
                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Hot tub'),
                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Terrace'),

                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Towels'),
            ],),

            \Orchid\Screen\Fields\Group::make([
                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Toilet paper'),

                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Flat-screen TV'),
                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Bath'),
            ],),
            \Orchid\Screen\Fields\Group::make([
                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Heating'),

                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Coffee/tea maker'),

                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('View'),
            ],),

            \Orchid\Screen\Fields\Group::make([
                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Hairdryer'),

                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Washing machine'),
                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Coffee machine'),
            ],),
            \Orchid\Screen\Fields\Group::make([

                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Spa bath'),

                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Kitchen'),
                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Socket near the bed'),
            ],),

                CheckBox::make('roomfacilities[]')
                    ->value(0)
                    ->checked(false)
                    ->placeholder('Sofa'),






        ];
    }
}
