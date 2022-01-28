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
            $request->validate([
                'waitlist_type' => 'required | min:5',
                'name' => 'required',
                'email' => 'email | required',
            ]);

            // Check if waitlister is Asset Lister
            if($request->waitlist_type == 2) {
                $request->validate([
                    'lister_desc' => 'required',
                ]);
            }
            
            // Add data to database
            $waitlist = new Waitlist;
            $waitlist->waitlist_type = $request->waitlist_type;
            $waitlist->name = $request->name;
            $waitlist->email = $request->email;
            $waitlist->lister_desc = $request->lister_desc;
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
