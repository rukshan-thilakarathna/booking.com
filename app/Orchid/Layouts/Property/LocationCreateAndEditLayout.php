<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Property;

use App\Models\Cities;
use App\Models\Districts;
use App\Models\PropertyType;
use App\Models\User;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;

class LocationCreateAndEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Relation::make('property.main_location')
                ->fromModel(Districts::class, 'name_en')
                ->required()
                ->title(__('Distric')),

            Relation::make('property.sub_location')
                ->fromModel(Cities::class, 'name_en')
                ->required()
                ->title(__('City')),

            Input::make('property.address')
                ->type('text')
                ->title('Address'),

            Input::make('property.map')
                ->type('text')
                ->help("To add a location using Google Maps, start by finding your desired location on Google Maps. Once you've located it, click on the share icon. In the share menu, navigate to the 'Embed a map' section. Here, you'll see a link enclosed in quotation marks. Carefully copy only the part of the link that begins with 'https...' and is located between the quotation marks. It's important not to copy the entire link—only the portion between the quotation marks—otherwise, the location might not be embedded correctly.")
                ->title('Map Link'),
        ];
    }
}
