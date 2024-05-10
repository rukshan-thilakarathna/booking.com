<?php
namespace App\Orchid\Screens\Property;

use App\Models\Properties;
use App\Orchid\Layouts\Property\PropertiesListLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

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
            'properties' => Properties::with('propertyType','propertyOwner','district','city')->filters()->orderBy('id', 'desc')->paginate(12),
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
        $user = \App\Models\User::find((Auth::user())->id);
        return [
            Link::make(__('Create New'))
                ->icon('bs.plus-circle')
                ->canSee($user->hasAnyAccess(['property.create.permissions']) || $user->hasAnyAccess(['property.admin_create.permissions']))
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
           PropertiesListLayout::class,
             Layout::modal('View Property',Layout::rows([
                 Input::make('property.propertyType.name')
                     ->type('text')
                     ->title(__('Property Type')),

                 Input::make('property.propertyOwner.name')
                     ->type('text')
                     ->title(__('Property Owner Name')),

                 Input::make('property.email')
                     ->type('text')
                     ->title(__('Email')),

                 Input::make('property.address')
                     ->type('text')
                     ->title(__('Address')),

                 Input::make('property.name')
                     ->type('text')
                     ->title(__('Name')),

                 Input::make('property.description')
                     ->type('text')
                     ->title(__('Description')),

                 Input::make('property.contact_number')
                     ->type('text')
                     ->title(__('Contact Number')),

                 Input::make('property.whatsapp_numner')
                     ->type('text')
                     ->title(__('Whatsapp Numner')),

                 Input::make('property.district.name_en')
                     ->type('text')
                     ->title(__('district')),

                 Input::make('property.city.name_en')
                     ->type('text')
                     ->title(__('City')),

             ]))->withoutApplyButton(true)->async('asyncGetProperty')
        ];
    }

    public function asyncGetProperty(Properties $property): iterable
    {

        return [
            'property' => $property,
        ];
    }

    public function remove(Request $request): void
    {
        Properties::findOrFail($request->get('id'))->delete();

        Toast::info(__('Property was removed'));
    }


    public function suspend(Request $request): void
    {
        $property = Properties::findOrFail($request->get('id')); // Find the property by ID
        $property->status = 4; // Set the status to 1
        $property->save();

        Toast::info(__('Property was suspended'));
    }

    public function actve(Request $request): void
    {
        $property = Properties::findOrFail($request->get('id')); // Find the property by ID
        $property->status = 1; // Set the status to 1
        $property->save();

        Toast::info(__('Property was Actve'));
    }

    public function hold(Request $request): void
    {
        $property = Properties::findOrFail($request->get('id')); // Find the property by ID
        $property->status = 3; // Set the status to 1
        $property->save();

        Toast::info(__('Property was suspended'));
    }


}
