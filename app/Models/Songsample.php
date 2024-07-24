<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Songsample
 * 
 * @property int $id
 * @property string $name
 * @property string $filename
 * @property string|null $comments
 * @property string|null $artwork
 * @property int $artist_id
 * 
 * @property Artistprofile $artistprofile
 *
 * @package App\Models
 */
class Songsample extends Model
{
	protected $table = 'songsample';
	public $timestamps = false;

	protected $casts = [
		'artist_id' => 'int'
	];

	protected $fillable = [
		'name',
		'filename',
		'comments',
		'artwork',
		'artist_id'
	];

	public function artistprofile()
	{
		return $this->belongsTo(Artistprofile::class, 'artist_id');
	}
}
