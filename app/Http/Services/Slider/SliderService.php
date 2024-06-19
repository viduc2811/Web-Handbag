<?php
namespace App\Http\Services\Slider;


use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderService
{
    public function insert($request)
    {
        try {
            $request->except('_token');
            Slider::create([
                'name' => $request->name,
                'url' => $request->url,
                'thumb' => $request->thumb,
                'sort_by' => $request->sort_by,
                'active' => $request->active,
            ]);
            
            Session::flash('success', 'Thêm Slider mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Slider LỖI');
            Log::info($err->getMessage());

            return false;
        }

        return true;
     }
     public function get()
    {
        return Slider::orderByDesc('slider_id')->paginate(15);
    }
    public function update($request, $slider)
    {
        try {
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success', 'Cập nhật Slider thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật slider Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }
    public function destroy($request)
    {
        $slider = Slider::where('slider_id', $request->input('menu_id'))->first();
        if ($slider) {
            $path = str_replace('storage', 'public', $slider->thumb);
            Storage::delete($path);
            $slider->delete();
            return true;
        }

        return false;
    }
    public function show()
    {
        return Slider::where('active', 1)->orderByDesc('sort_by')->get();
    }
}