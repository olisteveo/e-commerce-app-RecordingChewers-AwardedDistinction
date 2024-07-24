<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Artist2event
 * 
 * @property int $artist_id
 * @property int $event_id
 * 
 * @property Artistprofile $artistprofile
 * @property Event $event
 *
 * @package App\Models
 */
class Artist2event extends Model
{
	protected $table = 'artist2event';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'artist_id' => 'int',
		'event_id' => 'int'
	];

	protected $fillable = [
		'artist_id',
		'event_id'
	];

	public function artistprofile()
	{
		return $this->belongsTo(Artistprofile::class, 'artist_id');
	}

	public function event()
	{
		return $this->belongsTo(Event::class);
	}
}
