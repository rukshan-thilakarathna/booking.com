<?php

namespace App\Orchid\Screens\Property;

use App\Models\Properties;
use App\Models\Rooms;
use App\Models\RoomType;
use App\View\Components\ManageImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use function Symfony\Component\Translation\t;

class ImagesListScreen extends Screen
{
    public $properties;
    public $dbname;
    public $data;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query($id , $dbname = 'Properties'): iterable
    {
        $this->dbname = $dbname;
        $path ="";
        if ($dbname == 'Properties') {
            $id = Properties::find($id);
            $imageString = rtrim($id->image, ',');
            $path = 'Images';

        }elseif ($dbname == 'Rooms') {
            $id = Rooms::find($id);
            $imageString = rtrim($id->image, ',');
            $path = 'Rooms';
        }elseif ($dbname == 'RoomType') {
            $id = RoomType::find($id);
            $imageString = rtrim($id->images, ',');
            $path = 'RoomType';
        }


        $this->data = $id;

        // Remove any trailing commaProperties


        // Convert the string to an array
        $imageArray = explode(',', $imageString);

        $this->properties = $id->id;


        return [
            'ImageArray' => $imageArray,
            'propertyId' => $id->id,
            'path' => $path
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->dbname.' Images';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Upload more images')
                ->modal('upload')
                ->method('upload', [
                    'id' => $this->properties,
                    'name' => $this->dbname,
                ]),
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
            \Orchid\Support\Facades\Layout::component(ManageImage::class),
            Layout::modal('upload',Layout::rows([

                Input::make('image')
                    ->type('file')
                    ->title('Multiple Images')
                    ->multiple(),

            ]))->applyButton('Upload'),
        ];
    }



    public function upload(Request $request)
    {


            if($request->hasfile('image')) {
                $image = $this->store($request,$request->get('name'));
            }


        if ($request->get('name') == 'Properties') {
            $propertyq = Properties::find($request->get('id'));
            if ($propertyq->image == null || $propertyq->image == '') {
                $propertyData = [
                    'image' => $image,
                ];
            }else{
                $propertyData = [
                    'image' => $propertyq->image.','.$image,
                ];
            }

        }elseif ($request->get('name') == 'Rooms') {
            $propertyq = Rooms::find($request->get('id'));
            if ($propertyq->image == null || $propertyq->image == '') {
                $propertyData = [
                    'image' => $image,
                ];
            }else{
                $propertyData = [
                    'image' => $propertyq->image.','.$image,
                ];
            }


        }elseif ($request->get('name') == 'RoomType') {
            $propertyq = RoomType::find($request->get('id'));
            if ($propertyq->images == null || $propertyq->images == '') {
                $propertyData = [
                    'images' => $image,
                ];
            }else{
                $propertyData = [
                    'images' => $propertyq->images.','.$image,
                ];
            }

        }

            $propertyq->update($propertyData);

        Toast::info(__('Images have been uploaded.'));

    }

    public function store(Request $request ,$path)
    {
        $request->validate([
            'images.*' => 'mimes:jpg,jpeg,png,bmp|max:20000'
        ]);

        if($request->hasfile('image'))
        {
            $gb_image_name = '';
            foreach($request->file('image') as $file)
            {
                $path = $path=='Properties'?'Images':$path;
                $name =time() . random_int(1, 100) . '.' . $file->extension();
                $file->move(public_path('Property/'.$path), $name);
                $gb_image_name .= $name . ',';
            }
        }

        return rtrim($gb_image_name, ',');
    }
//
//172370251576.jpg,
//172370251517.jpg,
//172370251592.jpg,
//172370268381.jpg,
//172370268344.jpg,
//172370268366.jpg,
//172370270911.jpg,
//172370270947.jpg,
//172370270983.jpg,
//172370270989.jpg,
//172370281746.jpg,
//172370281747.jpg,
//172370281719.jpg,
//172370281740.jpg,
//172370281738.jpg,
}
