<?php

namespace App\Orchid\Layouts\Point;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Password;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use PHPUnit\Metadata\Group;


class DonationFormLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */


    public function fields(): array
    {
        $user = \App\Models\User::find((Auth::user())->id);

        return [

            Select::make('user')
                ->empty('No select')
                ->fromQuery(User::whereIn('role', ['user', 'property-owner'])->where('id', '!=', $user->id), 'name')
                ->required()
                ->title(__('To'))
                ->value(old('user')),

            Input::make('point_count')
                ->type('number')
                ->required()
                ->placeholder('Enter Point Count')
                ->title('Point Count')
                ->value(old('point_count')),

            Password::make('password')
                ->required()
                ->placeholder('Enter Your Password')
                ->title(__('Password')),

        ];

    }
}
