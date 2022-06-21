<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class PageController extends Controller {
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
                'page_name' => 'required|string',
            );

            $validator = Validator::make($data, $rule);
            if ($validator->fails()) {
                $response['success'] = false;
                $response['errors']  = $validator->errors();
                $response_code       = 422;
                return response()->json($response, $response_code, [], JSON_PRETTY_PRINT);
            } else {
                try {
                    $page = Page::create([
                        'page_name'   => $request->page_name,
                        'user_id'     => $user,
                        'profile_img' => $request->profile_img,
                        'cover_img'   => $request->cover_img,
                    ]);

                    $response['info']    = "Page Created Successfull";
                    $response['data']    = $page;
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
