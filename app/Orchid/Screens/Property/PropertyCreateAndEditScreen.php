<?php

namespace App\Orchid\Screens\Property;

use App\Models\Properties;
use App\Models\PropertyFacilities;
use App\Orchid\Layouts\Property\ContactCreateAndEditLayout;
use App\Orchid\Layouts\Property\PropertyCreateAndEditLayout;
use App\Orchid\Layouts\Property\LocationCreateAndEditLayout;
use App\Orchid\Layouts\Property\PropertyAddUserLayout;
use App\Orchid\Layouts\Property\PropertyFacilitiesLayout;
use App\Orchid\Layouts\Property\SocialMediaCreateAndEditLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class PropertyCreateAndEditScreen extends Screen
{
    public $property;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */

     public function query(Properties $property): iterable
     {
         // Convert the facilities attribute to an array of IDs
         $numbers_array = explode(", ", $property->facilities);

         // Retrieve the corresponding PropertyFacilities records
         $fe = PropertyFacilities::whereIn('id', $numbers_array)->get();

         // Attach the facilities to the property relations
         $property->setRelation('facilities_item', $fe);

         // Debugging line (remove in production)
         // dd($property->relations);

         // Return the property with its associated relations


         return [
             'property' => $property,
         ];
     }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return  $this->property->exists ? 'Edit Property' :  'Create New Property';
    }

    public function description(): ?string
    {
        return 'Welcome to your Orchid application.';
    }

    public function permission(): ?iterable
    {
        return [
            'property.edite.permissions',
            'property.admin_create.permissions',
            'property.create.permissions'
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
            Button::make(__('Save'))
                ->icon('bs.check-circle')
                ->method('save'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        $user = \App\Models\User::find((Auth::user())->id);
        return [

            \Orchid\Support\Facades\Layout::block(PropertyAddUserLayout::class)
                ->title(__('Property Owner Information'))
                ->canSee($user->hasAnyAccess(['property.admin_create.permissions'])),

            \Orchid\Support\Facades\Layout::block(PropertyCreateAndEditLayout::class)
            ->title(__('Property Information')),

            \Orchid\Support\Facades\Layout::block(ContactCreateAndEditLayout::class)
                ->title(__('Property owner contact details')),

            \Orchid\Support\Facades\Layout::block(LocationCreateAndEditLayout::class)
                ->title(__('Property location details')),

            \Orchid\Support\Facades\Layout::block(PropertyFacilitiesLayout::class)
                ->title(__('Property Facilities')),

            // \Orchid\Support\Facades\Layout::block(SocialMediaCreateAndEditLayout::class)
            //     ->title(__('Social Media Information')),
        ];
    }

    public function save(Request $request , $property = null)
    {


        if ($this->property->exists && $property != null){
            $request->validate([
                'property.type'     => 'required',
                'property.name'    => 'required|string|max:40',
                'property.email'   => 'required|email',
                'property.contact_number' => 'required|string|regex:/^0[1-9]\d{8}$/',
                
            ]);



            $facilities_list = '';
            $facilities = $request->input('property.facilities_item');

            if (!empty($facilities)) {
                // Ensure each facility item is converted to a string using htmlspecialchars
                $sanitized_facilities = array_map('htmlspecialchars', $facilities);
                $facilities_list = implode(', ', $sanitized_facilities);
            }


            if($request->hasfile('image')) {
                $image = $this->store($request);
            }

            $propertyq = Properties::find($property);

            $propertyData = [
                'user_id' => $request->input('property.user_id', Auth::id()),
                'name' => $request->input('property.name'),
                'main_location' => $request->input('property.main_location'),
                'sub_location' => $request->input('property.sub_location'),
                'ocation' => $request->input('property.map'),
                'address' => $request->input('property.address'),
                'type' => $request->input('property.type'),
                'email' => $request->input('property.email'),
                'review_id' => $request->input('property.review_id', 0),
                'description' => $request->input('property.description'),
                'facilities' => $facilities_list,
                'image' => $image ?? $propertyq->image,
                'contact_number' => $request->input('property.contact_number'),
                'whatsapp_numner' => $request->input('property.whatsapp_number'),
                'facebook_link' => $request->input('property.facebook_link'),
                'tiktok_link' => $request->input('property.tiktok_link'),
                'linkedin_link' => $request->input('property.linkedin_link'),
                'twitter_link' => $request->input('property.twitter_link'),
                'added_user' => Auth::id(),
            ];

            $propertyq->update($propertyData);
        }else{
            $request->validate([
                'property.type'     => 'required',
                'property.name'    => 'required|string|max:40',
                'property.email'   => 'required|email|unique:properties,email',
                'property.contact_number' => 'required|string|regex:/^0[1-9]\d{8}$/',
                
            ]);

           

            $facilities_list = '';
            $facilities = $request->input('property.facilities_item');

            if (!empty($facilities)) {
                // Ensure each facility item is converted to a string using htmlspecialchars
                $sanitized_facilities = array_map('htmlspecialchars', $facilities);
                $facilities_list = implode(', ', $sanitized_facilities);
            }

            if($request->hasfile('image')) {
                $image = $this->store($request);
            }

            $property = new Properties();
            $property->user_id = $request->property['user_id'] ??  Auth::user()->id;
            $property->name = $request->property['name'];
            $property->main_location = $request->property['main_location'];
            $property->sub_location = $request->property['sub_location'];
            $property->address = $request->property['address'];
            $property->location = $request->property['map'];
            $property->type = $request->property['type'];
            $property->email = $request->property['email'];
            $property->review_id = $request->property['review_id'] ?? 0;
            $property->description = $request->property['description'];
            $property->facilities = $facilities_list;
            $property->image = $image ?? "";
            $property->contact_number = $request->property['contact_number'];
            $property->whatsapp_numner = $request->property['whatsapp_numner'];
            $property->facebook_link = $request->property['facebook_link'];
            $property->tiktok_link = $request->property['tiktok_link'];
            $property->linkedin_link = $request->property['linkedin_link'];
            $property->twitter_link = $request->property['instagram_link'];
            $property->status = $request->property['status'] ?? 2;
            $property->added_user = Auth::user()->id;

            $property->save();
        }


        Toast::info(__($request->property['name'].'  was saved.'));

        return redirect()->route('properties');





    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'mimes:jpg,jpeg,png,bmp|max:20000'
        ]);

        if($request->hasfile('image'))
        {

            $gb_image_name = '';
            foreach($request->file('image') as $file)
            {
                $name =time() . random_int(1, 100) . '.' . $file->extension();
                $file->move(public_path('Property/Images'), $name);
                $gb_image_name .= $name . ',';
            }
        }

        return $gb_image_name;
    }
}
