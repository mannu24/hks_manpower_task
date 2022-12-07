<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeEntry extends Model
{
    use HasFactory;
    protected  $table = 'tree_entry';
    protected $fillable = ['parent_entry_id'];

    public function branches(){
        return $this->hasMany(TreeEntry::class, 'parent_entry_id', 'entry_id')->with(['branches','details:entry_id,name']);
    }

    public function details(){
        return $this->belongsTo(TreeEntryLang::class,'entry_id','entry_id');
    }
}
