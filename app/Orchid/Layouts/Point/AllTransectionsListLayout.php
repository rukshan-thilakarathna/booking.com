<?php

namespace App\Orchid\Layouts\Point;

use App\Models\Point_transactions;
use App\Models\Properties;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class AllTransectionsListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'transections';

   protected $title = ' Transection List';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     * @throws \ReflectionException
     */
    protected function columns(): iterable
    {
        $user = \App\Models\User::find((Auth::user())->id);
        $UserId = $user->id;
        return [

            TD::make('id', __('Transection Code'))
                ->sort()
                ->filter(),

            TD::make('FromUser.name', __('From'))
                ->filter(),

            TD::make('ToUser.name', __('To'))
                ->filter(),

            TD::make('point_count', __('Point Count'))
                ->render(function (Point_transactions $transactions){
                    $user = \App\Models\User::find((Auth::user())->id);
                    return $transactions->from == $user->id ? "- ".$transactions->point_count : "+ ".$transactions->point_count ;
                })
                ->sort()
                ->filter(),

            TD::make('amount', __('Amount'))
                ->render(function (Point_transactions $transactions){
                return $transactions->amount == 0 ? "00.00" : $transactions->amount ;
                })
                ->sort()
                ->filter(),

            TD::make('discount_amount', __('Discount Amount'))
                ->render(function (Point_transactions $transactions){
                    return $transactions->discount_amount == 0 ? "00.00" : $transactions->discount_amount ;
                })
                ->sort()
                ->filter(),

            TD::make('discount_percentage', __('Discount Percentage'))
                ->render(function (Point_transactions $transactions){
                    return $transactions->discount_percentage == 0 ? "0%" : $transactions->discount_amount.'%' ;
                })
                ->sort()
                ->filter(),


            TD::make('status', __('Status'))
                ->render(function (Point_transactions $transactions){
                    if ($transactions->status == 2){
                        return "Pending";
                    }else{
                        return $transactions->status == 1 ? "Successful" : "Unsuccessful" ;
                    }

                })
                ->sort()
                ->filter(),

            TD::make('selling_status', __('Transactions Status'))
                ->render(function (Point_transactions $transactions ){
                    $user = \App\Models\User::find((Auth::user())->id);
                    if ($transactions->selling_status == 2){
                        return "Selling";
                    }else{
                        if ($transactions->to == $user->id){
                            return $transactions->selling_status == 1 ? "Buy" : "Donation" ;
                        }else{
                            return $transactions->selling_status == 1 ? "Sold out" : "Donation" ;
                        }

                    }

                }),

            TD::make('created_at', __('Created At'))
                ->usingComponent(DateTimeSplit::class)
                ->sort()
                ->filter(),

            TD::make('updated_at', __('Updateda'))
                ->usingComponent(DateTimeSplit::class)
                ->sort()
                ->filter()
                ->defaultHidden(),
        ];
    }
}
