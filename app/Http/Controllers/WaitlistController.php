<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Waitlist;

class WaitlistController extends Controller
{
    /**
     * Store a newly created waitlister in database.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function joinWaitlist(Request $request)
    {
            // Validate requests
			$this->validate($request, [

			]);
            $request->validate([
                'waitlist_type' => 'required',
                'name' => 'required',
                'email' => 'email | required',
            ]);

            // Check if waitlister is Asset Lister
			if ($request->waitlist_type == 2) {
				$request->validate([
					'lister_desc' => 'required',
				]);
			}

            // Add data to database
            $waitlist = new Waitlist();
            $waitlist->waitlist_type = $request->input('waitlist_type');
            $waitlist->name = $request->input('name');
            $waitlist->email = $request->input('email');
			if($request->waitlist_type == 2) {
				$waitlist->lister_desc = $request->input('lister_desc');
			}
            $waitlist->save(); 	 	

            return response()->json(
                [
                    "data" => [
                        "message" => "Waitlister added",
                        "data" => $waitlist,
                    ],
                ],
                201
            );
    }
}
