<?php

namespace App\Http\Controllers;

use App\Mail\FormSubmit as FormSubmitMail;
use App\Model\FormSubmit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormSubmitController extends Controller
{
    public function index(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'location' => 'nullable|string',
        ];
        if (isset($request['phone'])) {
            $rules['phone'] = 'required|digits:11';
        } else if ($request['email']) {
            $rules['email'] = 'required|email';
        } else {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $validatedData = $request->validate($rules);

        FormSubmit::create(array(
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'] ?? '',
            'email' => $validatedData['email'] ?? '',
            'message' => $validatedData['message'] ?? '',
            'location' => $validatedData['location'] ?? '',
        ));

        Mail::to(config('mail.from.address'))->send(new FormSubmitMail($validatedData));
        //Mail::to('pup.pomidorkin@yandex.ru')->send(new FormSubmitMail($validatedData));

        return response()->json(['message' => 'Messages has send to managers!'], 200);
    }
}
