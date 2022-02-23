<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Get(
     *      path="/{{ version }}/users",
     *      operationId="getUserList",
     *      tags={"User"},
     *      summary="Get list of User",
     *      description="Returns list of User",
     *      security={{"passport": {}}},
     *      @OA\Parameter(
     *          ref="#/components/parameters/page"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="data",
     *                      type="array",
     *                      @OA\Items(
     *                          ref="#/components/schemas/User"
     *                      )
     *                  ),
     *                  @OA\Property(
     *                      property="links",
     *                      type="object",
     *                      @OA\Property(property="first", type="string", example=L5_SWAGGER_CONST_USER_PAGE),
     *                      @OA\Property(property="last", type="string", example=L5_SWAGGER_CONST_USER_PAGE),
     *                      @OA\Property(property="prev", type="integer", example="null"),
     *                      @OA\Property(property="next", type="integer", example="null"),
     *                  ),
     *                  @OA\Property(
     *                      property="meta",
     *                      type="object",
     *                      @OA\Property(property="currentPage", type="integer", example="1"),
     *                      @OA\Property(property="from", type="integer", example="1"),
     *                      @OA\Property(property="lastPage", type="integer", example="1"),
     *                      @OA\Property(
     *                          property="links",
     *                          type="array",
     *                          @OA\Items(
     *                              type="object"
     *                          ),
     *                          example={
     *                              {
     *                                  "url": null,
     *                                  "label": "&laquo; Previous",
     *                                  "active": false
     *                              },
     *                              {
     *                                  "url": L5_SWAGGER_CONST_USER_PAGE,
     *                                  "label": "1",
     *                                  "active": true
     *                              },
     *                              {
     *                                  "url": null,
     *                                  "label": "Next &raquo;",
     *                                  "active": false
     *                              }
     *                          }
     *                      ),
     *                      @OA\Property(property="path", type="string", example=L5_SWAGGER_CONST_USER_PATH),
     *                      @OA\Property(property="perPage", type="integer", example="10"),
     *                      @OA\Property(property="to", type="integer", example="1"),
     *                      @OA\Property(property="total", type="integer", example="1"),
     *                  ),
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          ref="#/components/responses/401"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          ref="#/components/responses/403"
     *      )
     * )
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "UserController show v1 ($id)";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
