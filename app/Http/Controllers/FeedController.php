<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response            = [];
        $response['success'] = true;
        $response_code       = 200;

        if (Auth::check()) {
            try {
                $user   = Auth::user()->id;
                $follow = Follow::select('follow_user_id', 'follow_page_id')->where('follower_id', $user)->get()->toArray();

                $following_users = array_column($follow, 'follow_user_id'); // make an array of following users id
                $following_pages = array_column($follow, 'follow_page_id'); // make an array of following pages id

                $following_users = array_values(array_filter($following_users)); //remove null and reindex
                $following_pages = array_values(array_filter($following_pages)); //remove null and reindex

                $posts = Post::with(['publisherUser', 'publisherPage'])->where(function ($q) use ($following_users, $following_pages, $user) {
                    $q->whereIn('publisher_user_id', $following_users)
                        ->orWhereIn('publisher_page_id', $following_pages)
                        ->orWhere('publisher_user_id', $user);
                })->get();

                $response['info']    = "all post of for feed for the login user";
                $response['data']    = $posts;
                $response['success'] = false;
                $response_code       = 200;

                return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);

            } catch (\Throwable $th) {
                $response['info']    = $th->getMessage();
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
