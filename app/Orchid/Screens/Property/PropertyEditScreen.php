<?php

namespace App\Orchid\Screens\Property;

use App\Orchid\Layouts\Property\ContactEditLayout;
use App\Orchid\Layouts\Property\PropertyEditLayout;
use App\Orchid\Layouts\Property\SocialMediaEditLayout;
use App\Orchid\Layouts\User\UserEditLayout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Support\Color;

class PropertyEditScreen extends Screen
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
        return [
            \Orchid\Support\Facades\Layout::block(PropertyEditLayout::class)
            ->title(__('Property Information'))
            ->description(__('Update your account\'s profile information and email address.')),

            \Orchid\Support\Facades\Layout::block(ContactEditLayout::class)
                ->title(__('Contact Information'))
                ->description(__('Update your account\'s profile information and email address.')),

            \Orchid\Support\Facades\Layout::block(SocialMediaEditLayout::class)
                ->title(__('Social Media Information'))
                ->description(__('Update your account\'s profile information and email address.')),

        ];
    }
}
