<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\FileUploadTrait;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
class SettingController extends Controller
{
    use FileUploadTrait;

    public function edit(Request $request)
    {
        if($request->isMethod('post')){
           return $this->update($request);
        }else{
            $cmsInfo = [
                'moduleTitle'=>__("Site Setting"),
                'subModuleTitle'=>__('Site Setting'),
                'subTitle'=>__('xx')
            ];

            $dynamic_route ="settings.update";
            $isEdit = true;
            $setting =new Setting();
            $settings = $setting->getSetting();
            return view('settings.edit_view', compact('cmsInfo', 'dynamic_route', 'isEdit','settings'));
        }
    }

    private function update(Request $request)
    {

        $settings = Setting::find($request->id);
        //dd($settings);
        $settingedit = $settings->update([
            'title' => $request->title,
            'logo_path' => $request->logo_path,
            'admin_name' => $request->admin_name,
            'admin_phone' => $request->admin_phone,
            'company_address' => $request->company_address,
            'favicon_path' => $request->favicon_path,
            'footer' => $request->footer,

        ]);

        if(!empty($request['logo_path'])) {
//            $request['logo_path'] = $this->uploadFile($request['logo_path'], 'storage/setting/');
            $logol = $this->uploadFile($request['logo_path'], 'storage/setting/');
            $settings->update(['logo_path'=>$logol]);
            Cache::put('logo_path', $logol);
        }
        if(!empty($request['favicon_path'])) {
//            $request['logo_path'] = $this->uploadFile($request['logo_path'], 'storage/setting/');
            $fav = $this->uploadFile($request['favicon_path'], 'storage/setting/');
            $settings->update(['favicon_path'=>$fav]);
            Cache::put('favicon_path', $fav);
        }
        Cache::put('title', $request->title);

        Cache::put('footer', $request->footer);

        if($settingedit){
            flash(__('Successfully Updated'),'info');
        }
        return back();
    }


    public function destroy($id)
    {
        //
    }
}
