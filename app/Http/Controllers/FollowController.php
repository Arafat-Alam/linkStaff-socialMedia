<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $personId)
    {
        $response            = [];
        $response['success'] = true;
        $response_code       = 200;

        if (Auth::check()) {
            $data = $request->all();
            $user = Auth::user()->id;

            if ($personId){
                if ($personId == $user){
                    $response['info']    = "You can not follow yourself";
                    $response['success'] = false;
                    $response_code       = 200;
                    return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
                }

                $follow_user = User::find($personId);

                if ($follow_user){
                    try {
                        $follow = Follow::create([
                            'follow_user_id' => $personId,
                            'follower_id'    => $user,
                            'follow_type'    => 'follow_person'
                        ]);

                        $response['info']    = "You have followed ".$follow_user->first_name.' '.$follow_user->last_name;
                        $response['success'] = true;
                        $response_code       = 200;

                        return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
                    } catch (\Throwable $th){
                        $response['info']    = $th->getMessage();
                        $response['success'] = false;
                        $response_code       = 200;
                        return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
                    }
                } else {
                    $response['info']    = "Person not found!!";
                    $response['success'] = false;
                    $response_code       = 200;
                    return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
                }
            } else {
                $response['info']    = "Person not found!!";
                $response['success'] = false;
                $response_code       = 200;
                return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
            }
        } else {
            $response['info']    = "User is not authenticated";
            $response['success'] = false;
            $response_code       = 401;

            return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function followPage(Request $request, $pageId)
    {
        $response            = [];
        $response['success'] = true;
        $response_code       = 200;

        if (Auth::check()) {
            $data = $request->all();
            $user = Auth::user()->id;

            if ($pageId){
                $follow_page = Page::find($pageId);
                if ($follow_page){
                    // check if user own the page
                    if ($follow_page->user_id == $user){
                        $response['info']    = "You can not follow your own page";
                        $response['success'] = false;
                        $response_code       = 200;
                        return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
                    }
                    try {
                        $follow = Follow::create([
                            'follow_page_id' => $pageId,
                            'follower_id'    => $user,
                            'follow_type'    => 'follow_page'
                        ]);

                        $response['info']    = "You have followed ".$follow_page->page_name;
                        $response['success'] = true;
                        $response_code       = 200;

                        return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
                    } catch (\Throwable $th){
                        $response['info']    = $th->getMessage();
                        $response['success'] = false;
                        $response_code       = 200;
                        return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
                    }
                } else {
                    $response['info']    = "Page not found!!";
                    $response['success'] = false;
                    $response_code       = 200;
                    return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
                }
            } else {
                $response['info']    = "Page not found!!";
                $response['success'] = false;
                $response_code       = 200;
                return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
            }
        } else {
            $response['info']    = "User is not authenticated";
            $response['success'] = false;
            $response_code       = 401;

            return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
