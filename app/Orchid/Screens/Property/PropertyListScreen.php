<?php
namespace App\Orchid\Screens\Property;

use App\Models\Properties;
use App\Models\RoomType;
use App\Orchid\Layouts\Property\PropertiesListLayout;
use App\Orchid\Layouts\RoomType\FullPropertyFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeBathRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeEditLayout;
use App\Orchid\Layouts\RoomType\RoomTypeKitchenFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeViewFacilitiesLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Menu;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Modal;
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
        // Get the authenticated user
        $user = \App\Models\User::find(auth()->user()->id);

        // Retrieve properties with eager loading and filters
        $properties = Properties::with('propertyType', 'propertyOwner', 'district', 'city')
            ->filters()
            ->orderBy('id', 'desc');

        // If the user is a property owner, filter properties by their user_id
        if ($user->role === 'property-owner') {
            $properties->where('user_id', $user->id);
        }

        // Paginate the properties
        $properties = $properties->paginate(12);

        return [
            'properties' => $properties,
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

            Link::make(__('Manage Room Types'))
                ->canSee($user->hasAnyAccess(['create.room.type.permissions']))
                ->href(route('room-types')),

            Link::make(__('Create New Property'))
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

                 Input::make('property.facebook_link')
                     ->type('text')
                     ->title(__('Facebook Link')),

                 Input::make('property.tiktok_link')
                     ->type('text')
                     ->title(__('Tiktok Link')),

                 Input::make('property.linkedin_link')
                     ->type('text')
                     ->title(__('Linkedin Link')),

                 Input::make('property.instagram_link')
                     ->type('text')
                     ->title(__('Instagram Link')),

                 Input::make('property.twitter_link')
                     ->type('text')
                     ->title(__('Twitter Link')),

             ]))->withoutApplyButton(true)->async('asyncGetProperty'),

            Layout::modal('Open For Booking',Layout::rows([
                Select::make('open_for_booking')
                    ->options(config('constants.OpenForBooking'))
            ])),

            Layout::modal('Create Room Type',
                [Layout::block(RoomTypeEditLayout::class)
                    ->title(__(' Information'))
                    ->vertical()
                    ->description(__('Update your account\'s profile information and email address.')),


                Layout::block(RoomTypeRoomFacilitiesLayout::class)
                    ->title(__('Room Facilities'))
                    ->vertical()
                    ->description(__('Update your account\'s profile information and email address.')),

                Layout::block(RoomTypeBathRoomFacilitiesLayout::class)
                    ->title(__('BathRoom Facilities'))
                    ->vertical()
                    ->description(__('Update your account\'s profile information and email address.')),

                Layout::block(RoomTypeViewFacilitiesLayout::class)
                    ->title(__('View Facilities'))
                    ->vertical()
                    ->description(__('Update your account\'s profile information and email address.')),

                Layout::block(RoomTypeKitchenFacilitiesLayout::class)
                    ->title(__('Kitchen Facilities'))
                    ->vertical()
                    ->description(__('Update your account\'s profile information and email address.')),]
            )->size(Modal::SIZE_LG),

            Layout::modal('Create Full Property Room Type',
                [Layout::block(RoomTypeEditLayout::class)
                    ->title(__(' Information'))
                    ->vertical()
                    ->description(__('Update your account\'s profile information and email address.')),

                    Layout::block(FullPropertyFacilitiesLayout::class)
                        ->title(__(' Full Property Facilities'))
                        ->vertical()
                        ->description(__('Update your account\'s profile information and email address.')),

                    Layout::block(RoomTypeRoomFacilitiesLayout::class)
                        ->title(__('Room Facilities'))
                        ->vertical()
                        ->description(__('Update your account\'s profile information and email address.')),

                    Layout::block(RoomTypeBathRoomFacilitiesLayout::class)
                        ->title(__('BathRoom Facilities'))
                        ->vertical()
                        ->description(__('Update your account\'s profile information and email address.')),

                    Layout::block(RoomTypeViewFacilitiesLayout::class)
                        ->title(__('View Facilities'))
                        ->vertical()
                        ->description(__('Update your account\'s profile information and email address.')),

                    Layout::block(RoomTypeKitchenFacilitiesLayout::class)
                        ->title(__('Kitchen Facilities'))
                        ->vertical()
                        ->description(__('Update your account\'s profile information and email address.')),]
            )->size(Modal::SIZE_LG),
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

    public function OpenForBooking( Request $request)
    {
        $property = Properties::find($request->get('id'));
        $property->open_for_booking = $request->get('open_for_booking');
        $property->save();
        Toast::info('Send successfully');
    }

    public function CreateRoomType( Request $request)
    {

        $validatedData = $request->validate([
            'roomtype.name' => 'nullable|string|max:255',
        ]);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $bathroom_facilities_list = '';
        $bathroom_facilities = $request->input('bathroomfacilities');

        if (!empty($bathroom_facilities)) {
            // Ensure each facility item is converted to a string using htmlspecialchars
            $bathroom_sanitized_facilities = array_map('htmlspecialchars', $bathroom_facilities);
            $bathroom_facilities_list = implode(', ', $bathroom_sanitized_facilities);
        }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $room_facilities_list = '';
        $room_facilities = $request->input('roomfacilities');

        if (!empty($room_facilities)) {
            // Ensure each facility item is converted to a string using htmlspecialchars
            $room_sanitized_facilities = array_map('htmlspecialchars', $room_facilities);
            $room_facilities_list = implode(', ', $room_sanitized_facilities);
        }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $kitchen_facilities_list = '';
        $kitchen_facilities = $request->input('kitchenfacilities');

        if (!empty($kitchen_facilities)) {
            // Ensure each facility item is converted to a string using htmlspecialchars
            $kitchen_sanitized_facilities = array_map('htmlspecialchars', $kitchen_facilities);
            $kitchen_facilities_list = implode(', ', $kitchen_sanitized_facilities);
        }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $view_facilities_list = '';
        $view_facilities = $request->input('viewfacilities');

        if (!empty($view_facilities)) {
            // Ensure each facility item is converted to a string using htmlspecialchars
            $view_sanitized_facilities = array_map('htmlspecialchars', $view_facilities);
            $view_facilities_list = implode(', ', $view_sanitized_facilities);
        }

        $image =$this->store($request);


        // Create a new RoomType instance
        $roomtype = new RoomType();

        // Assign validated data to the RoomType instance
        $roomtype->name = $request['roomtype.name'];
        $roomtype->images = $image;
        $roomtype->user_id = Auth::user()->id;
        $roomtype->room_size = $request['roomtype.room_size'];
        $roomtype->bathroom_facilities = $bathroom_facilities_list;
        $roomtype->bedroom_count = $request['roomtype.bedroom_count'] ?? 1;
        $roomtype->washroom_count = $request['roomtype.wshroom_count'] ?? 1;
        $roomtype->kitchen_count = $request['roomtype.kitchen_count'] ?? 0;
        $roomtype->kitchen_facilities = $kitchen_facilities_list;
        $roomtype->disription = $request['roomtype.disription'];
        $roomtype->property_type = $request->get('id');
        $roomtype->room_facilities = $room_facilities_list ;
        $roomtype->view_facilities = $view_facilities_list;
        $roomtype->smoking = $request['roomtype.smoking'] ?? 0;
        $roomtype->status = $request['roomtype.status'] ?? 1;

        // Save the RoomType instance to the database
        $roomtype->save();

    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|mimes:jpg,jpeg,png,bmp|max:20000'
        ]);

        if($request->hasfile('images'))
        {

            $gb_image_name = '';
            foreach($request->file('images') as $file)
            {
                $name =time() . random_int(1, 100) . '.' . $file->extension();
                $file->move(public_path('Property/RoomType'), $name);
                $gb_image_name .= $name . ',';
            }
        }

        return $gb_image_name;
    }


}
