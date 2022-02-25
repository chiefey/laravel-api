<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\v1\User\StoreUserRequest;
use App\Http\Requests\Api\v1\User\UpdateUserRequest;
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
     *      path="/v1/users",
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
     *                  @OA\Property(property="current_page", type="integer", example="1"),
     *                  @OA\Property(
     *                      property="data",
     *                      type="array",
     *                      @OA\Items(
     *                          ref="#/components/schemas/User"
     *                      )
     *                  ),
     *                  @OA\Property(property="first_page_url", type="string", example=L5_SWAGGER_CONST_USER_PAGE),
     *                  @OA\Property(property="from", type="integer", example="1"),
     *                  @OA\Property(property="last_page", type="integer", example="1"),
     *                  @OA\Property(property="last_page_url", type="string", example=L5_SWAGGER_CONST_USER_PAGE),
     *                  @OA\Property(
     *                      property="links",
     *                      type="array",
     *                      @OA\Items(
     *                          type="object"
     *                      ),
     *                      example={
     *                          {
     *                              "url": null,
     *                              "label": "&laquo; Previous",
     *                              "active": false
     *                          },
     *                          {
     *                              "url": L5_SWAGGER_CONST_USER_PAGE,
     *                              "label": "1",
     *                              "active": true
     *                          },
     *                          {
     *                              "url": null,
     *                              "label": "Next &raquo;",
     *                              "active": false
     *                          }
     *                      }
     *                  ),
     *                  @OA\Property(property="next_page_url", type="integer", example="null"),
     *                  @OA\Property(property="path", type="string", example=L5_SWAGGER_CONST_USER_PATH),
     *                  @OA\Property(property="per_page", type="integer", example="15"),
     *                  @OA\Property(property="prev_page_url", type="integer", example="null"),
     *                  @OA\Property(property="to", type="integer", example="1"),
     *                  @OA\Property(property="total", type="integer", example="1"),
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
        return User::paginate();
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
     * @param  StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Post(
     *      path="/v1/users",
     *      summary="Create User",
     *      description="Add User",
     *      operationId="addUser",
     *      tags={"User"},
     *      security={{"passport": {}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              required={"name","email","password"},
     *              @OA\Property(
     *                  property="name",
     *                  ref="#/components/schemas/User/properties/name"
     *              ),
     *              @OA\Property(
     *                  property="email",
     *                  ref="#/components/schemas/User/properties/email"
     *              ),
     *              @OA\Property(
     *                  property="password",
     *                  ref="#/components/schemas/User/properties/password"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  ref="#/components/schemas/User"
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
     *      ),
     *      @OA\Response(
     *          response=422,
     *          ref="#/components/responses/422"
     *      )
     * )
     */
    public function store(StoreUserRequest $request)
    {
        return User::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Get(
     *      path="/v1/users/{id}",
     *      operationId="getUserById",
     *      tags={"User"},
     *      summary="Get User By Id",
     *      description="Returns updated User data",
     *      security={{"passport": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  ref="#/components/schemas/User"
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
     *      ),
     *      @OA\Response(
     *          response=404,
     *          ref="#/components/responses/404"
     *      )
     * )
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Put(
     *      path="/v1/users/{id}",
     *      operationId="updateUser",
     *      tags={"User"},
     *      summary="Update existing User",
     *      description="Returns updated User data",
     *      security={{"passport": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              ref="#/components/schemas/User/properties/id"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              required={"name","email","password"},
     *              @OA\Property(
     *                  property="name",
     *                  ref="#/components/schemas/User/properties/name"
     *              ),
     *              @OA\Property(
     *                  property="email",
     *                  ref="#/components/schemas/User/properties/email"
     *              ),
     *              @OA\Property(
     *                  property="password",
     *                  ref="#/components/schemas/User/properties/password"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  ref="#/components/schemas/User"
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
     *      ),
     *      @OA\Response(
     *          response=404,
     *          ref="#/components/responses/404"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          ref="#/components/responses/422"
     *      )
     * )
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        return User::update($request->all(), $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Delete(
     *      path="/v1/users/{id}",
     *      operationId="deleteUserById",
     *      tags={"User"},
     *      summary="Delete User",
     *      description="Returns updated User data",
     *      security={{"passport": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(property="message", type="string", example="User deleted."),
     *                  @OA\Property(property="deleted", type="bool", example="true")
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
     *      ),
     *      @OA\Response(
     *          response=404,
     *          ref="#/components/responses/404"
     *      )
     * )
     */
    public function destroy(User $user)
    {
        return User::delete($user->id);
    }
}
