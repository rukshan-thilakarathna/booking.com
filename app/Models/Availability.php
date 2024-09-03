<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'room_number',
        'adults',
        'children',
        '1', '2', '3', '4', '5', '6', '7', '8', '9', '10',
        '11', '12', '13', '14', '15', '16', '17', '18', '19',
        '20', '21', '22', '23', '24', '25', '26', '27', '28',
        '29', '30', '31'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    public function ChackAvailability($chackIn,$chackOut,$property_id,$adults=0,$children=0)
    {
        $curentDate = strtotime(date("Y-m-d"));
        if ($curentDate <= $chackIn && $curentDate <= $chackOut && $chackIn <= $chackOut) {

            $dates = $this->getDate($chackIn,$chackOut);
            $rooms = Availability::whereIn('property_id',$property_id)->select('room_number');

            if ($adults != 0){
                $rooms = $rooms->where('adults',$adults );
            }

            if ($children != 0){
                $rooms = $rooms->where('children',$children );
            }


            foreach ($dates['DateList'] as $key => $date){
                if ($date < 10){
                    $date = str_replace("0","",$date);
                }
                $rooms = $rooms->whereNot($date,'LIKE','%['.$dates['YearMonthDateList'][$key].']%' );
            }


                return $rooms->get();


        } else {
            return false;
        }
    }

    public function getDate($chackIn,$chackOut)
    {
        $FullDateList = [];
        $DateList = [];
        $YearMonthDateList = [];
        for ($currentTimestamp = $chackIn; $currentTimestamp <= $chackOut; $currentTimestamp = strtotime("+1 day", $currentTimestamp)) {
            $FullDateList[] = date("Y-m-d", $currentTimestamp);
            $DateList[] = date("d", $currentTimestamp);
            $YearMonthDateList[] = date("Y-m", $currentTimestamp);
        }
        return [
            'FullDateList'=>$FullDateList,
            'DateList'=>$DateList,
            'YearMonthDateList'=>$YearMonthDateList,
        ];
    }


    // You can add relationships and custom methods here if needed
}
