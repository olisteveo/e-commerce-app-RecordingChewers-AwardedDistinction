<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArtistProfile>
 */
class ArtistProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $profile_pics = [
            "dp1.jpg",
            "dp2.jpg",
            "dp3.jpg",
            "dp4.jpg",
            "dp5.jpg",
            "dp6.jpg",
            "dp7.jpg",
            "dp8.jpg",
            "dp9.jpg",
            "dp10.jpg",
            "dp11.jpg",
            "dp12.jpg",
            "dp13.jpg"

        ];

        $song_art = [
            "song_art1.jpg",
            "song_art2.jpg",
            "song_art3.jpg",
            "song_art4.jpg",
            "song_art5.jpg",
            "song_art6.jpg",
            "song_art7.jpg",
            "song_art8.jpg",
            "song_art9.jpg",
            "song_art10.jpg",
            "song_art11.jpg",
            "song_art12.jpg",
            "song_art13.jpg",
            "song_art14.jpg",
            "song_art15.jpg"
        ];

        $song_sample = [
            "file_example1.mp3",
            "file_example2.mp3",
            "file_example3.mp3",
            "file_example4.mp3",
            "file_example5.mp3",
            "file_example6.mp3",
            "file_example7.mp3",
            "file_example8.mp3",
            "file_example9.mp3",
            "file_example10.mp3",
            "file_example11.mp3"
        ];

        $song_sample = $song_sample[rand(0, count($song_sample)-1)];
        $profile_pics = $profile_pics[rand(0, count($profile_pics)-1)];
        $song_art = $song_art[rand(0, count($song_art)-1)];
        // @todo
        // Look at using an environment variable so that the user seeder & this have the same upper bound index limit.
        $user_id = rand(1, 29);

        return [
            'name' => fake()->name(),
            'profile_pic' => $profile_pics,
            'description' => fake()->paragraph,
            'song_sample' => $song_sample,
            'song_sample_name' => fake()->name(),
            'song_sample_comments' => fake()->text(100),
            'song_art' => $song_art,
            'user_id' => $user_id,
        ];
    }
}
