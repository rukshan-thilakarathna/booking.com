<?php

namespace App\Orchid\Screens\Property;

use App\Models\Properties;
use App\Orchid\Layouts\Property\ContactEditLayout;
use App\Orchid\Layouts\Property\PropertyEditLayout;
use App\Orchid\Layouts\Property\LocationEditLayout;
use App\Orchid\Layouts\Property\PropertyUserEditLayout;
use App\Orchid\Layouts\Property\SocialMediaEditLayout;
use App\Orchid\Layouts\User\UserEditLayout;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Toast;

class PropertyCreateScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Create New Property';
    }

    public function description(): ?string
    {
        return 'Welcome to your Orchid application.';
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

            \Orchid\Support\Facades\Layout::block(PropertyUserEditLayout::class)
                ->title(__('Property Owner Information'))
                ->canSee($user->hasAnyAccess(['property.admin_create.permissions']))
                ->description(__('Update your account\'s profile information and email address.')),

            \Orchid\Support\Facades\Layout::block(PropertyEditLayout::class)
            ->title(__('Property Information'))
            ->description(__('Update your account\'s profile information and email address.')),

            \Orchid\Support\Facades\Layout::block(ContactEditLayout::class)
                ->title(__('Contact Information'))
                ->description(__('Update your account\'s profile information and email address.')),

            \Orchid\Support\Facades\Layout::block(LocationEditLayout::class)
                ->title(__('Location Information'))
                ->description(__('Update your account\'s profile information and email address.')),

            \Orchid\Support\Facades\Layout::block(SocialMediaEditLayout::class)
                ->title(__('Social Media Information'))
                ->description(__('Update your account\'s profile information and email address.')),
        ];

    }

    public function save(Request $request)
    {
        $request->validate([
            'type'     => 'required',
            'name'    => 'required|string',
            'email'   => 'required|email|unique:properties,email',
            'contact_number' => 'required|string|regex:/^0[1-9]\d{8}$/',
        ]);

        $property = new Properties();
        $property->user_id = $request->user_id ??  Auth::user()->id;
        $property->name = $request->name;
        $property->type = $request->type;
        $property->email = $request->email;
        $property->review_id = $request->review_id ?? 0;
        $property->description = $request->description;
        $property->image = $request->image;
        $property->contact_number = $request->contact_number;
        $property->whatsapp_numner = $request->whatsapp_numner;
        $property->facebook_link = $request->facebook_link;
        $property->tiktok_link = $request->tiktok_link;
        $property->linkedin_link = $request->linkedin_link;
        $property->twitter_link = $request->instagram_link;
        $property->status = $request->status ?? 2;
        $property->added_user = Auth::user()->id;
        $property->save();

        Toast::info(__($request->name.'  was saved.'));

        return redirect()->route('properties');





    }
}
