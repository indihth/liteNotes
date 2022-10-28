<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    //////////////////////////
    // Get around mass assignment block when adding note
    //////////////////////////
    
    // Fields that can be mass assiged with:
    //
    // protected $fillable = []
    
    // Fields to prevent against mass assignment.
    // Using empty array allows all fields to be mass assigned.
    protected $guarded = [];
    

    //////////////////////////
    // Because I've passed Note directly into show() in NoteController
    // it uses note->id by default, 
    // this changes the default to use note->uuid
    //////////////////////////
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
