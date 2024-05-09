<?php
namespace App\Orchid\Screens\Property;

use App\Models\Properties;
use App\Orchid\Layouts\Property\PropertiesListLayout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class PropertyListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'properties' => Properties::filters()->orderBy('id', 'desc')->paginate(12),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Property Management';
    }


    public function description(): ?string
    {
        return 'Welcome to your Orchid application.';
    }


    public function permission(): ?iterable
    {
        return [
            'property.view.permissions'
        ];
    }


    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

            Link::make(__('Create New'))
                ->icon('bs.plus-circle')
                ->href(route('property.create')),

        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */

    public function layout(): iterable
    {
        return [
           PropertiesListLayout::class
        ];
    }
}
