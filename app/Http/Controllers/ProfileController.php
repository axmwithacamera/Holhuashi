<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    
    public function getProfile($user_name)
    {
        $user = User::where('user_name', $user_name)->first();

                if (!$user){
                    abort(404);
                }
                return view ('profile.index')
                ->with('user', $user);

                $statuses = $user->statuses()->notReply()
				->orderBy('created_at', 'desc')
				->paginate(10);

		return view('profile.index')
			->with('user', $user )
			->with('statuses', $statuses )
			->with('authUserIsFriend', Auth::user()->isFriendsWith($user) );
                
    }

    

    public function getEdit()
    {
        return view ('profile.edit');
    }

    public function postEdit(Request $request)
    {
        $this->validate($request, [
            'user_name' => 'max:50',
            'full_name' => 'max:50',

        ]);

        Auth::user()->update([
            'user_name' => $request->input('user_name'),
            'full_name' => $request->input('full_name'),
        ]);
        return redirect()
        ->route('profile.edit')
        ->withSuccess('Your profile has been updated successfully');
        
    }
}
