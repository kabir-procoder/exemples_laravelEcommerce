<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'category';

    static public function getSingle($id) {
        return self::find($id);
    }

    static public function getRecord() {
        return self::select('category.*', 'users.name as created_by_name')
                ->join('users', 'users.id', '=', 'category.created_by')
                ->where('category.is_delete', '=', 0)
                ->orderBy('category.id', 'desc')
                ->paginate(20);
                // ->get();
    }

    static public function getRecordActive() {
        return self::select('category.*')
                ->join('users', 'users.id', '=', 'category.created_by')
                ->where('category.is_delete', '=', 0)
                ->where('category.status', '=', 0)
                ->orderBy('category.name', 'asc')
                ->paginate(20);
                // ->get();
    }
}