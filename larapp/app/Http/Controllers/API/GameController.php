<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Game;
use Validator;
use App\Http\Resources\Game as GameResource;
   
class GameController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
    
        return $this->sendResponse(GameResource::collection($games), 'Games retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name'         => 'required|min:4|unique:games',
            'description'  => 'required',
            'user_id'      => 'required',
            'category_id'  => 'required',
            'slider'       => 'required',
            'price'        => 'required|numeric|min:1|max:100',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $game = Game::create($input);
   
        return $this->sendResponse(new GameResource($game), 'Game created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = Game::find($id);
  
        if (is_null($game)) {
            return $this->sendError('Game not found.');
        }
   
        return $this->sendResponse(new GameResource($game), 'Game retrieved successfully.');
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
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name'         => 'required|min:4|unique:games',
            'description'  => 'required',
            'user_id'      => 'required',
            'category_id'  => 'required',
            'slider'       => 'required',
            'price'        => 'required|numeric|min:1|max:100',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $game = Game::find($id);
        $game->name        = $input['name'];
        $game->description = $input['description'];
        $game->user_id     = $input['user_id'];
        $game->category_id = $input['category_id'];
        $game->slider      = $input['slider'];
        $game->price       = $input['price'];
        $game->save();
   
        return $this->sendResponse(new GameResource($game), 'Game updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = Game::find($id);
        $game->delete();
        return $this->sendResponse([], 'Game deleted successfully.');
    }
}