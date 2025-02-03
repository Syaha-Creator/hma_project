<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first() ?? new Setting();
        return view('settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'background_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'navigation_menu' => 'nullable|string',
        ]);

        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }

        if ($request->hasFile('background_image')) {
            $file = $request->file('background_image');
            $filename = time() . '_background.' . $file->getClientOriginalExtension();
            $file->storeAs('public/settings', $filename);
            $setting->background_image = 'settings/' . $filename;
        }

        if ($request->hasFile('logo_image')) {
            $file = $request->file('logo_image');
            $filename = time() . '_logo.' . $file->getClientOriginalExtension();
            $file->storeAs('public/settings', $filename);
            $setting->logo_image = 'settings/' . $filename;
        }

        if ($request->navigation_menu) {
            $setting->navigation_menu = json_decode($request->navigation_menu, true);
        }

        $setting->save();

        return redirect()->route('settings.index')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
