<?php

namespace Twaambo\Silhouette;

use App\User;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

trait ManagesProfile
{
    public function viewUserProfile(Request $request)
    {
        $user = Auth::user();
        return view('silhouette::profile', ['user' => $user]) ;
    }

    /**
     * Validate and save.
     * @param Request $request
     */
    public function editCurrentUserProfile(Request $request)
    {
        $user = Auth::user();

        if ($request["name"]) {
            $this->validate($request, [
                'name' => 'max:255|required'
            ]);
            $user->name = $request["name"];
        }

        if ($request["password"]) {
            $this->validate($request, [
                'password' => 'min:8|required'
            ]);
            $user->password = bcrypt($request["password"]);
        }

        $user->save(); 

        Session::flash('message', "Profile Successfully Updated!");
        return redirect()->back();
    }
}
