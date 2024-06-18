<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\RoomType;

use App\Models\PropertyType;
use App\Models\RoomType;
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
                    ->value('Air conditioning')
                   ->checked(false)
                    ->placeholder('Air conditioning'),

                CheckBox::make('roomfacilities[]')
                    ->value('Private pool')
                    ->checked(false)
                    ->placeholder('Private pool'),

                CheckBox::make('roomfacilities[]')
                    ->value('Private bathroom')
                    ->checked(false)
                    ->placeholder('Private bathroom'),
            ],),
            \Orchid\Screen\Fields\Group::make([

                CheckBox::make('roomfacilities[]')
                    ->value('Kitchen/kitchenette')
                    ->checked(false)
                    ->placeholder('Kitchen/kitchenette'),

                CheckBox::make('roomfacilities[]')
                    ->value('Balcony')
                    ->checked(false)
                    ->placeholder('Balcony'),

                CheckBox::make('roomfacilities[]')
                    ->value('Shower')
                    ->checked(false)
                    ->placeholder('Shower'),
            ],),

            \Orchid\Screen\Fields\Group::make([
                CheckBox::make('roomfacilities[]')
                    ->value('Refrigerator')
                    ->checked(false)
                    ->placeholder('Refrigerator'),

                CheckBox::make('roomfacilities[]')
                    ->value('TV')
                    ->checked(false)
                    ->placeholder('TV'),

                CheckBox::make('roomfacilities[]')
                    ->value('Toilet')
                    ->checked(false)
                    ->placeholder('Toilet'),
            ],),
            \Orchid\Screen\Fields\Group::make([
                CheckBox::make('roomfacilities[]')
                    ->value('Hot tub')
                    ->checked(false)
                    ->placeholder('Hot tub'),

                CheckBox::make('roomfacilities[]')
                    ->value('Terrace')
                    ->checked(false)
                    ->placeholder('Terrace'),

                CheckBox::make('roomfacilities[]')
                    ->value('Towels')
                    ->checked(false)
                    ->placeholder('Towels'),
            ],),

            \Orchid\Screen\Fields\Group::make([
                CheckBox::make('roomfacilities[]')
                    ->value('Toilet paper')
                    ->checked(false)
                    ->placeholder('Toilet paper'),

                CheckBox::make('roomfacilities[]')
                    ->value('Flat-screen TV')
                    ->checked(false)
                    ->placeholder('Flat-screen TV'),

                CheckBox::make('roomfacilities[]')
                    ->value('Bath')
                    ->checked(false)
                    ->placeholder('Bath'),
            ],),
            \Orchid\Screen\Fields\Group::make([
                CheckBox::make('roomfacilities[]')
                    ->value('Heating')
                    ->checked(false)
                    ->placeholder('Heating'),

                CheckBox::make('roomfacilities[]')
                    ->value('Coffee/tea maker')
                    ->checked(false)
                    ->placeholder('Coffee/tea maker'),

                CheckBox::make('roomfacilities[]')
                    ->value('View')
                    ->checked(false)
                    ->placeholder('View'),
            ],),

            \Orchid\Screen\Fields\Group::make([
                CheckBox::make('roomfacilities[]')
                    ->value('Hairdryer')
                    ->checked(false)
                    ->placeholder('Hairdryer'),

                CheckBox::make('roomfacilities[]')
                    ->value('Washing machine')
                    ->checked(false)
                    ->placeholder('Washing machine'),

                CheckBox::make('roomfacilities[]')
                    ->value('Coffee machine')
                    ->checked(false)
                    ->placeholder('Coffee machine'),
            ],),
            \Orchid\Screen\Fields\Group::make([

                CheckBox::make('roomfacilities[]')
                    ->value('Spa bath')
                    ->checked(false)
                    ->placeholder('Spa bath'),

                CheckBox::make('roomfacilities[]')
                    ->value('Kitchen')
                    ->checked(false)
                    ->placeholder('Kitchen'),

                CheckBox::make('roomfacilities[]')
                    ->value('Socket near the bed')
                    ->checked(false)
                    ->placeholder('Socket near the bed'),
            ],),

                CheckBox::make('roomfacilities[]')
                    ->value('Sofa')
                    ->checked(false)
                    ->placeholder('Sofa'),






        ];
    }
}
