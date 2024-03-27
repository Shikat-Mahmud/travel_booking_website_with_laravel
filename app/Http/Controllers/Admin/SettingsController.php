<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;
use App\Models\ApplicationSetting;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    public function index()
    {
        if (auth()->user()->can('update-general-setting')) {
            $general = ApplicationSetting::latest()->first();
            return view('admin.main.settings.general_setting', compact('general'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to update general settings.');
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'business_name' => 'required',
            'business_address' => 'required',
            'business_number' => 'required',
            'business_email' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $general = ApplicationSetting::latest()->first();

            // Check and update logo
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $path = $file->store('setting', 'public');
                $general->logo = $path;
            }

            // Check and update favicon
            if ($request->hasFile('favicon')) {
                $file = $request->file('favicon');
                $path = $file->store('setting', 'public');
                $general->favicon = $path;
            }

            if ($request->hasFile('banner_image')) {
                $file = $request->file('banner_image');
                $path = $file->store('setting', 'public');
                $general->banner_image = $path;
            }

            // Update other fields
            $general->fill([
                'business_name' => $request->business_name,
                'business_address' => $request->business_address,
                'business_number' => $request->business_number,
                'business_email' => $request->business_email,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'business_whatsapp' => $request->business_whatsapp,
            ]);

            $general->save();

            DB::commit();
            return redirect()->route('general.setting')->with('success', 'Data updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('general.setting')->withInput()->with('error', $e->getMessage());
        }
    }

    public function emailSetting()
    {
        if (auth()->user()->can('update-email-setting')) {
            $general = ApplicationSetting::latest()->first();
            return view('admin.main.settings.email_setting', compact('general'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to update email settings.');
        }
    }

    public function emailUpdate(Request $request)
    {
        DB::beginTransaction();
        try {
            $general = ApplicationSetting::latest()->first();
            $general->mail_host = $request->mail_host;
            $general->mail_port = $request->mail_port;
            $general->mail_username = $request->mail_username;
            $general->mail_password = $request->mail_password;
            $general->mail_from_name = $request->mail_from_name;
            $general->mail_from_address = $request->mail_from_address;
            $general->mail_status = $request->mail_status;
            $general->mail_encryption = $request->mail_encryption;
            $general->save();

            $this->setEnv('MAIL_HOST', $request->mail_host);
            $this->setEnv('MAIL_PORT', $request->mail_port);
            $this->setEnv('MAIL_USERNAME', $request->mail_username);
            $this->setEnv('MAIL_PASSWORD', $request->mail_password);
            $this->setEnv('MAIL_FROM_ADDRESS', $request->mail_from_address);
            $this->setEnv('MAIL_FROM_NAME', $request->mail_from_name);
            $this->setEnv('MAIL_ENCRYPTION', $request->mail_encryption);

            \Artisan::call('config:clear');

            DB::commit();
            return redirect()->route('email.setting')->with('success', 'Setting saved Successfully.');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('email.setting')->with('error', 'Something went wrong');
        }
    }

    private function setEnv($key, $value)
    {
        $envFilePath = app()->environmentFilePath();
        $envContents = File::get($envFilePath);
        $newEnvContents = preg_replace(
            "/^$key=.*/m",
            "$key=$value",
            $envContents
        );

        File::put($envFilePath, $newEnvContents);
    }

    public function cacheClear()
    {
        if (auth()->user()->can('cache-clear')) {
            Artisan::call('cache:clear');
            return redirect()->route('admin.index')->with('success', 'Cache Clear Successfully.');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to clear cache.');
        }
    }
}