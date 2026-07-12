<?php

namespace App\Http\Controllers;

use App\SystemSetting;
use Illuminate\Http\Request;

class SystemSettingController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | SETTINGS PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {

        $setting = SystemSetting::first();

        if (!$setting) {

            $setting = SystemSetting::create([

                'office_name' => 'National Telecommunications Commission',

                'office_address' => '',

                'office_logo' => null,

                'prepared_by' => '',

                'prepared_position' => '',

                'checked_by' => '',

                'checked_position' => '',

                'approved_by' => '',

                'approved_position' => ''

            ]);

        }

        return view(

            'settings.index',

            compact('setting')

        );

    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE SETTINGS
    |--------------------------------------------------------------------------
    */

    public function update(Request $request)
    {

        $setting = SystemSetting::first();

        $request->validate([

            'office_name' => 'required|max:255',

            'office_address' => 'nullable|max:255',

            'office_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'prepared_by' => 'nullable|max:255',

            'prepared_position' => 'nullable|max:255',

            'checked_by' => 'nullable|max:255',

            'checked_position' => 'nullable|max:255',

            'approved_by' => 'nullable|max:255',

            'approved_position' => 'nullable|max:255',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Upload Logo
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('office_logo')) {

            if (

                $setting->office_logo &&

                file_exists(

                    public_path(

                        'storage/' .

                        $setting->office_logo

                    )

                )

            ) {

                @unlink(

                    public_path(

                        'storage/' .

                        $setting->office_logo

                    )

                );

            }

            $path =

                $request

                ->file('office_logo')

                ->store(

                    'settings',

                    'public'

                );

            $setting->office_logo = $path;

        }


        /*
        |--------------------------------------------------------------------------
        | Save
        |--------------------------------------------------------------------------
        */

        $setting->office_name = $request->office_name;

        $setting->office_address = $request->office_address;

        $setting->prepared_by = $request->prepared_by;

        $setting->prepared_position = $request->prepared_position;

        $setting->checked_by = $request->checked_by;

        $setting->checked_position = $request->checked_position;

        $setting->approved_by = $request->approved_by;

        $setting->approved_position = $request->approved_position;

        $setting->save();
        return redirect()
            ->back()
            ->with(
                'success',
                'System settings updated successfully.'

            ); 
    }

}