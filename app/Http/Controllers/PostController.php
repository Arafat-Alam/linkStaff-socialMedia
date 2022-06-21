<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $response            = [];
        $response['success'] = true;
        $response_code       = 200;

        if (Auth::check()) {
            $data = $request->all();
            $user = Auth::user()->id;

            $rule = array(
                'post_content' => 'required|string',
            );

            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                $response['success'] = false;
                $response['errors']  = $validator->errors();
                $response_code       = 422;
                return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
            } else {
                try {
                    $post = Post::create([
                        'publisher_user_id' => $user,
                        'post_content'      => $request->post_content,
                        'post_type'         => 'persons_post',
                    ]);

                    $response['info']    = "Post Created Successfull";
                    $response['data']    = $post;
                    $response['success'] = true;
                    $response_code       = 200;

                    return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);

                } catch (\Throwable $th) {
                    $response['info']    = $th->getMessage();
                    $response['success'] = false;
                    $response_code       = 200;

                    return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
                }

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
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
     */
    public function pagePostStore(Request $request, $pageId) {

        $response            = [];
        $response['success'] = true;
        $response_code       = 200;

        if (Auth::check()) {
            $data = $request->all();
            $user = Auth::user()->id;

            $rule = array(
                'post_content' => 'required|string',
            );

            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                $response['success'] = false;
                $response['errors']  = $validator->errors();
                $response_code       = 422;
                return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
            } else {
                try {
                    if ($pageId) {
                        // check if the page is belongs to the logged in user
                        $page = Page::where(['user_id' => $user, 'id' => $pageId])->first();

                        if ($page) {
                            $post = Post::create([
                                'publisher_user_id' => $user,
                                'publisher_page_id' => $pageId,
                                'post_content'      => $request->post_content,
                                'post_type'         => $request->post_type,
                            ]);

                            $response['info']    = "Post Created Successfull";
                            $response['data']    = $post;
                            $response['success'] = true;
                            $response_code       = 200;

                            return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
                        }

                        $response['info']    = "Page Does not belongs to the user";
                        $response['success'] = false;
                        $response_code       = 200;
                    }

                    return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
                } catch (\Throwable $th) {
                    $response['info']    = $th->getMessage();
                    $response['success'] = false;
                    $response_code       = 200;

                    return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
                }

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
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
