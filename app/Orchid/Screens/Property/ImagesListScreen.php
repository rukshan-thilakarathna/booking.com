<?php

namespace App\Orchid\Screens\Property;

use App\Models\Properties;
use App\View\Components\ManageImage;
use Orchid\Screen\Screen;

class ImagesListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Properties $id): iterable
    {
        // Assuming $id contains the string of filenames
        $imageString = "171921273323.jpg,171921273363.jpg,171921273374.jpg,171921273375.jpg,171921273357.jpg,";

        // Remove any trailing comma
        $imageString = rtrim($id->image, ',');

        // Convert the string to an array
        $imageArray = explode(',', $imageString);



        return [
            'ImageArray' => $imageArray
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Images';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
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
        ];
    }
}
