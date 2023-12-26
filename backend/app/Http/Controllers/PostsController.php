<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostsController extends Controller {
    public function index() {

        $response = Http::get('http://wordpress/wp-json/wp/v2/posts');
        $posts = $response->json();

        return response()->json([
            'success' => true,
            'posts' => $posts
        ]);
    }
}

