<?php

namespace App\Http\Controllers\API;
use App\Models\Task;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Http\Requests\API\TaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Task::All();

        return TaskResource::collection(Task::all()); //mettre une clé sur l'ensemble des données envoyé, aussi permet de faire des filtre sur les colonnes qu'on voudrait voir afficher
        // return TaskResource::collection(Task::paginate(2)); //paginé ici//mettre une clé sur l'ensemble des données envoyé, aussi permet de faire des filtre sur les colonnes qu'on voudrait voir afficher
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
       //return  $request->all();

       Task::create([
            "name"=>$request->name,
            "status"=>$request->status,
            "user_id"=>$request->user_id,
       ]);

       return response()->json([
            "message"=>"succesfully saved into dataBase"
       ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        // return $task;   j'aurai pu utilliser ce code et tout allait marcher comme sur des roulettes, le problemen c'est que je veux que cela fonctionne comme sur la mathode index (voir note du cours)  
        return TaskResource::make($task); /// alors je veux utiliser la classe TaskResource pour me permettre de realiser pour une seule task la meme action comme effectuée dans la methode index
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task->update([
            "name"=>$request->name,
        ]);

        return  response()->json([
            "message"=> "has been succesfully updated",
            "task" => TaskResource::make($task)
       ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return  response()->json([
           'message'=>'Record has been deleted',   
        ]);
       }
}
