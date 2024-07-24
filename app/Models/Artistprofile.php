<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Artistprofile
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property int $user_id
 *
 * @property User $user
 * @property Artist2event $artist2event
 * @property Collection|Songsample[] $songsamples
 * @property Collection|Supplier[] $suppliers
 *
 * @package App\Models
 */
class Artistprofile extends Model
{
	use HasFactory;
	protected $table = 'artist_profiles';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'name',
		'image',
		'description',
		'user_id'
	];

    public static function search($term)
	{
		// check if search term is like artist name or artist description
        // using variable extraction - expands the variable to a string inside the string wrapped in % because its a like
		$query = static::where("name", "LIKE", "%{$term}%")
                        ->orWhere("description", "LIKE", "%{$term}%");
        return $query;
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

    public static function getPopularGenre($limit=2)
    {
        $query = static::query()
                    ->with('', function($q) {
                        return $q->sum('quantity');
                    })
                    ->limit($limit);
        return $query->get();
    }

	public function artist2event()
	{
		return $this->hasOne(Artist2event::class, 'artist_id');
	}

	public function suppliers()
	{
		return $this->hasMany(Supplier::class, 'artist_id');
	}
}
