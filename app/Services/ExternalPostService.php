<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExternalPostService
{
    public function getPosts()
    {
        $response = Http::withoutVerifying()
            ->timeout(10)
            ->get('https://jsonplaceholder.typicode.com/posts');
        // $response = Http::timeout(30)
        //     ->acceptJson()
        //     ->get('https://jsonplaceholder.typicode.com/posts');

        if ($response->failed()) {
            throw new \Exception('External API error');
        }

        return collect($response->json())
            ->take(15)
            ->values();
    }
}