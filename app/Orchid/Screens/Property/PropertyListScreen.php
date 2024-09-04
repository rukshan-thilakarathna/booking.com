<?php
namespace App\Orchid\Screens\Property;

use App\Mail\smsMail;
use App\Models\Properties;
use App\Models\Rooms;
use App\Models\RoomType;
use App\Models\User;
use App\Notifications\PropertyNotification;
use App\Orchid\Layouts\Property\PropertiesListLayout;
use App\Orchid\Layouts\Rooms\RoomCreateAndUpdateLayout;
use App\Orchid\Layouts\RoomType\FullPropertyFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeBathRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeEditLayout;
use App\Orchid\Layouts\RoomType\RoomTypeKitchenFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeViewFacilitiesLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Screen;
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
        if(Auth::user()->role == 'user'){

            return 'Until you verified your account with your identity card images, you cannot book any property so click on verify now button.';

        }elseif(Auth::user()->role == 'property-owner'){

            return "To get started with managing your property on Barterbed.com, you'll first need to create a property listing. Once your property is set up, the next step is to create room types for that property. To do this, simply click on the action button next to the relevant property and select the option to create a room type. After your room types are created, you can then proceed to add individual rooms under each room type. To add rooms, navigate to the 'Manage Room Types' section, find the relevant room type, and click on the action button. From there, you'll be able to create and manage the rooms associated with each room type.";

        }else{

            return 'A comprehensive list of all registered users, including their profiles and privileges.';

        }

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

            Link::make(__('List property'))
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
                    ->vertical(),


                Layout::block(RoomTypeRoomFacilitiesLayout::class)
                    ->title(__('Room Facilities'))
                    ->vertical(),

                Layout::block(RoomTypeBathRoomFacilitiesLayout::class)
                    ->title(__('BathRoom Facilities'))
                    ->vertical(),

                Layout::block(RoomTypeViewFacilitiesLayout::class)
                    ->title(__('View Facilities'))
                    ->vertical(),

                Layout::block(RoomTypeKitchenFacilitiesLayout::class)
                    ->title(__('Kitchen Facilities'))
                    ->vertical(),]
            )->size(Modal::SIZE_LG),

            Layout::modal('Create Full Property Room Type',
                [Layout::block(RoomTypeEditLayout::class)
                    ->title(__(' Information'))
                    ->vertical(),

                    Layout::block(FullPropertyFacilitiesLayout::class)
                        ->title(__(' Full Property Facilities'))
                        ->vertical(),

                    Layout::block(RoomTypeRoomFacilitiesLayout::class)
                        ->title(__('Room Facilities'))
                        ->vertical(),

                    Layout::block(RoomTypeBathRoomFacilitiesLayout::class)
                        ->title(__('BathRoom Facilities'))
                        ->vertical(),

                    Layout::block(RoomTypeViewFacilitiesLayout::class)
                        ->title(__('View Facilities'))
                        ->vertical(),

                    Layout::block(RoomTypeKitchenFacilitiesLayout::class)
                        ->title(__('Kitchen Facilities'))
                        ->vertical(),]
            )->size(Modal::SIZE_LG),

            Layout::modal('Create Room',
                [Layout::block(RoomCreateAndUpdateLayout::class)
                    ->title(__(' Information'))
                    ->vertical()]
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
        $property = Properties::with('propertyOwner')->findOrFail($request->get('id')); // Find the property by ID
        $property->status = 1; // Set the status to 1
        $property->save();

         $user = User::find($property->user_id);
         $user->notify(new PropertyNotification('Property approved',$property->name.' is activated'));

        $data = [
            'subject' => 'Property approved',
            'message' => $property->name.' is activated',
        ];
        Mail::to($property->propertyOwner->email)->send(new smsMail($data));

        Toast::info(__('Property Has Actve'));
    }

    public function hold(Request $request): void
    {
        $property = Properties::findOrFail($request->get('id')); // Find the property by ID
        $property->status = 3; // Set the status to 1
        $property->save();

        $user = User::find($property->user_id);
        $user->notify(new PropertyNotification('Property Hold',$property->name.' is hold'));

        $data = [
            'subject' => 'Property Hold',
            'message' => $property->name.' is hold',
        ];
        Mail::to($property->propertyOwner->email)->send(new smsMail($data));

        Toast::info(__('Property has suspended'));
    }

    public function promotion_bar_01(Request $request): void
    {
        $property = Properties::findOrFail($request->get('id')); // Find the property by ID
        $property->promotion_bar_01 = 1; // Set the status to 1
        $property->save();

        Toast::info(__('Property has promoted'));
    }

    public function promotion_bar_02(Request $request): void
    {
        $property = Properties::findOrFail($request->get('id')); // Find the property by ID
        $property->promotion_bar_02 = 1; // Set the status to 1
        $property->save();

        Toast::info(__('Property has promoted'));
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
        $bathroom_facilities = $request->input('roomtype.bathroomfacilities_item');

        if (!empty($bathroom_facilities)) {
            // Ensure each facility item is converted to a string using htmlspecialchars
            $bathroom_sanitized_facilities = array_map('htmlspecialchars', $bathroom_facilities);
            $bathroom_facilities_list = implode(', ', $bathroom_sanitized_facilities);
        }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $room_facilities_list = '';
        $room_facilities = $request->input('roomtype.roomfacilities_item');

        if (!empty($room_facilities)) {
            // Ensure each facility item is converted to a string using htmlspecialchars
            $room_sanitized_facilities = array_map('htmlspecialchars', $room_facilities);
            $room_facilities_list = implode(', ', $room_sanitized_facilities);
        }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $kitchen_facilities_list = '';
        $kitchen_facilities = $request->input('roomtype.kitchenfacilities_item');

        if (!empty($kitchen_facilities)) {
            // Ensure each facility item is converted to a string using htmlspecialchars
            $kitchen_sanitized_facilities = array_map('htmlspecialchars', $kitchen_facilities);
            $kitchen_facilities_list = implode(', ', $kitchen_sanitized_facilities);
        }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $view_facilities_list = '';
        $view_facilities = $request->input('roomtype.viewfacilities_item');

        if (!empty($view_facilities)) {
            // Ensure each facility item is converted to a string using htmlspecialchars
            $view_sanitized_facilities = array_map('htmlspecialchars', $view_facilities);
            $view_facilities_list = implode(', ', $view_sanitized_facilities);
        }

        // $image =$this->store($request);


        // Create a new RoomType instance
        $roomtype = new RoomType();

        // Assign validated data to the RoomType instance
        $roomtype->name = $request['roomtype.name'];
        // $roomtype->images = $image;
        $roomtype->user_id = Auth::user()->id;
        $roomtype->room_size = $request['roomtype.room_size'];
        $roomtype->bathroom_facilities = $bathroom_facilities_list;
        $roomtype->bedroom_count = $request['roomtype.bedroom_count'] ?? 1;
        $roomtype->washroom_count = $request['roomtype.wshroom_count'] ?? 1;
        $roomtype->kitchen_count = $request['roomtype.kitchen_count'] ?? 0;
        $roomtype->kitchen_facilities = $kitchen_facilities_list;
        $roomtype->disription = $request['roomtype.disription'];
        $roomtype->property_type = $request->get('id');
        $roomtype->property_id = $request->get('property_id');
        $roomtype->room_facilities = $room_facilities_list ;
        $roomtype->view_facilities = $view_facilities_list;
        $roomtype->smoking = $request['roomtype.smoking'] ?? 0;
        $roomtype->status = $request['roomtype.status'] ?? 1;

        // Save the RoomType instance to the database
        $roomtype->save();
        Toast::info(__('Room Type was Created'));
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

    public function deleteimage(Request $request)
    {
        $image = $request->get('image');
        $path = $request->get('path');

        if ($path == 'Images') {
            $data = Properties::findOrFail($request->get('id'));
            $imageString = rtrim($data->image, ',');
        }elseif ($path == 'Rooms') {
            $data = Rooms::findOrFail($request->get('id'));
            $imageString = rtrim($data->image, ',');
        }elseif ($path == 'RoomType') {
            $data = RoomType::findOrFail($request->get('id'));
            $imageString = rtrim($data->images, ',');
        }


        // Convert the string to an array
        $imageArray = explode(',', $imageString);

        // Filter out the image that needs to be removed
        $filteredImages = array_filter($imageArray, function($imageArray) use ($image) {
            return $imageArray !== $image;
        });

        // Optional: Re-index the array
        $filteredImages = array_values($filteredImages);



        $filteredImages = $imagesString = implode(',', array_values($filteredImages)); ;

        if ($path == 'Images') {
            $data->image = $filteredImages;
        }elseif ($path == 'Rooms') {
            $data->image = $filteredImages;
        }elseif ($path == 'RoomType') {
            $data->images = $filteredImages;
        }
        $data->save();

        Toast::info(__('Image deleted'));
    }


}
