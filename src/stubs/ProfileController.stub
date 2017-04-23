<?php

namespace App\Http\Controllers\Auth;

use Twaambo\Silhouette\ManagesProfile;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    use ManagesProfile;

    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('auth');
    }

}
