<?php

namespace App\Orchid\Layouts\Point;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use PHPUnit\Metadata\Group;


class PointCountLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */

    public function fields(): array
    {
        return [
            \Orchid\Screen\Fields\Group::make([
                Input::make('points.point_count')
                    ->readonly()
                    ->placeholder(0)
                    ->style('border: none; font-size: 35px; background: white; color: black;font-weight: bold;')
                    ->title('Point Count'),
                Input::make('points.wallet')
                    ->readonly()
                    ->placeholder(0)
                    ->style('border: none; font-size: 35px; background: white; color: black;font-weight: bold;')
                    ->title('Point Value (USD)'),

                 Input::make('points.locked_points')
                     ->readonly()
                     ->placeholder(0)
                     ->style('border: none; font-size: 35px; background: white; color: black;font-weight: bold;')
                     ->title('Pending selling Points'),

                Input::make('points.pending_wallet')
                    ->readonly()
                    ->placeholder(0)
                    ->style('border: none; font-size: 35px; background: white; color: black;font-weight: bold;')
                    ->title('pending amount (USD)'),

            ],),



        ];

    }
}
