<?php

namespace Twmbx\Silhouette;

use App\Http\Controllers\Controller;
use Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Validation\Rule;

trait ManagesProfile
{
    public function viewUserProfile(Request $request)
    {
        $user = Auth::user();
        return view('silhouette::profile', ['user' => $user]);
    }

    /**
     * Validate and save.
     * @param Request $request
     */
    public function editUserProfile(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'min:6|string|confirmed|nullable'
        ]);

        if ( $request["name"] ) {
            $user->name = $request["name"];
        }

        if ( $request["email"] ) {
            $user->email = $request["email"];
        }

        if ( $request["password"] ) {
            $user->password = bcrypt($request["password"]);
        }

        if( $user->isDirty() ) {
            $user->save();
            Session::flash('message', "Profile Successfully Updated!");
        } else {
            Session::flash('message', "No changes made to profile.");
        }

        return redirect()->back();
    }
}
