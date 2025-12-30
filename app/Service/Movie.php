<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;

class Movie
{
    protected string $token;

    public function __construct()
    {
        $this->token = config('services.tmdb.token');
    }

    public function displayAllMovie(int $page = 1)
    {
        $url = "https://api.themoviedb.org/3/trending/all/week?language=en-US&time_window=week&page={$page}";

        /** @var Response $response */
        $response = Http::withToken($this->token)->get($url);

        $data = $response->json();
        Log::info('TMDB API Response:', $data);
        
        return $data;
    }
}
