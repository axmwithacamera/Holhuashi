<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Status;


use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postStatus(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|max:1000',
        ]);

        Auth::user()->statuses()->create([
            'body' => $request->input('status'),
        ]);

        return redirect()
        ->route('home')
        ->withSuccess('status updated successfully!');
        
    }

    public function postReply(Request $request, $statusId) 
	{

		$this->validate( $request, [
			'reply-'.$statusId => 'required|max:1000',
		], [
			'required' => 'Please enter your text here',
			'max' => 'Limit of 1000 chars applies!',
		]);

		$status = Status::notReply()->find($statusId);


		if ( ! $status ) {
			return redirect()->back()->with('info', 'Invalid status, reply cancelled'); 
		}

		if ( ! Auth::user()->isFriendsWith($status->user) && Auth::user()->id !== $status->user_id ) {
			return redirect()->route('home')->with('info', 'Sorry! You are not friends with this user'); 
		}

		$reply = $request->input('reply-'.$statusId);

		Auth::user()->statuses()->create([
			'body' => $reply,
			'parent_id' => $statusId,
		]);


		return redirect()->back()
			->with('info', 'Your reply has been posted.');	

		$reply = Status::create([
				'body' => $reply,
			])->user()->associate(Auth::user());

		$status->replies()->save($reply);

	}	







	public function getLike($statusId)
            {

            $status = Status::find($statusId);

                        if ( ! $status ) {
                        return redirect()->route('home'); 
                        
                                }

                        if (!Auth::user()->isFriendsWith($status->user)){
                            return redirect()->route('home');
                        }
						if (Auth::user()->hasLikedStatus($status)){
							return redirect()->back();
						}

						$like = $status->likes()->create([]);
						Auth::user()->likes()->save($like);
						return redirect()->back();
            }
    


            public function likes(){


                return $this->hasMany('App\Models\Status', 'user_id');
            }



            public function hasLikedStatus($statusId)
            {

                return $status
                ->likes
                ->where();
                
            
                    
            }
		}