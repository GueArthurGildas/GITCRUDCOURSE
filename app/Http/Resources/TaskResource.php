<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       // return parent::toArray($request);  ///// ici le mec me renvoie toutes les colonnes presentent dans le Json 

       return [
        "name"=>$this->name,
        "status" => $this->status,
        ///// "nameUser" => $this->nameUSer    ------ pour utiliser ce code se rassurer d'avoir bien faire les relation dans le modèle entre les task et l'user avec le code du type hasmany or belongsTo
       ];
    }
}
