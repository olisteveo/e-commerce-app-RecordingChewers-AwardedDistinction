<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public static function getAll()
	{
		$query = static::orderBy('id', 'asc');
		return $query->get();
	}

    public static function contentFromName($name)
    {
        return static::where("name", $name)
                    ->first();
    }
}

