<?php


namespace App\Http\View\Composers;
use App\Models\Slider;
use Illuminate\View\View;

class SliderComposer
{
    protected $users;

    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $sliders = Slider::select('slider_id', 'name', 'thumb')->orderByDesc('slider_id')->get();

        $view->with('sliders', $sliders);
    }
}