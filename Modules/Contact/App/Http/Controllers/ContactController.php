<?php

namespace Modules\Contact\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Modules\Contact\App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;

class ContactController extends Controller
{
    public function indexContact(){
        $indexData = Contact::all();
        return view('contact::contact.index', compact('indexData'));
    }

    public function createContact(){
        return view('contact::contact.create');
    }

    public function storeContact(Request $request): RedirectResponse
    {
        try {
            $currentRowCount = Contact::count();
            if ($currentRowCount >= 3) {
                throw new \Exception('Cannot create more than 3 contacts.');
            }

            $request->validate([
                'location' => 'required|string|max:100',
                'address'  => 'required|string|max:100',
                'email'    => 'required|string|max:50',
                'phone'    => 'required|string|min:9|max:15',
            ]);

            $inputs = $request->all();

            $data = new Contact();
            $data->fill($inputs);
            $data->save();

            return redirect()->route('index.contact')->with('success', 'Contact created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    
    public function editContact($id=null){
        $indexData['indexData'] = Contact::find($id);
        if (!$indexData['indexData']) {
            return redirect()->back();
        }     
        return view('contact::contact.edit', $indexData);
    }
    


    public function updateContact(Request $request, $id): RedirectResponse
    {
        try {
            $request->validate([
                'location' => 'required|string|max:100',
                'address'  => 'required|string|max:100',
                'email'    => 'required|string|max:50',
                'phone'    => 'required|string|min:9|max:15',
            ]);

            $data = Contact::findOrFail($id);

            $data->location = $request->input('location');
            $data->address = $request->input('address');
            $data->email = $request->input('email');
            $data->phone = $request->input('phone');
            $data->save();

                    return redirect()->route('index.contact')->with('success', 'Product Updated successfully.');
            } catch (\Exception $e) {
                    return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function deleteContact($id=null){
        $destroyData = Contact::find($id);
        $destroyData->delete();
        return redirect()->route('index.contact')->with('success', 'Contact Delete successfully.');
    }
}
