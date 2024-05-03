<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Property;

use App\Models\User;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class SocialMediaEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('facebook_link')
                ->type('url')
                ->title('Facebook Link')
                ->placeholder('https://example.com')
                ->help('Enter your facebook profile link.'),

            Input::make('tiktok_link')
                ->type('url')
                ->title('Tiktok Link')
                ->placeholder('https://example.com')
                ->help('Enter your tiktok profile link.'),

            Input::make('linkedin_link')
                ->type('url')
                ->title('Linkedin Link')
                ->placeholder('https://example.com')
                ->help('Enter your Linkedin profile link.'),

            Input::make('instagram_link')
                ->type('url')
                ->title('Instagram Link')
                ->placeholder('https://example.com')
                ->help('Enter your Instagram profile link.'),

            Input::make('twitter_link')
                ->type('url')
                ->title('Twitter Link')
                ->placeholder('https://example.com')
                ->help('Enter your Instagram profile link.'),
        ];
    }
}
