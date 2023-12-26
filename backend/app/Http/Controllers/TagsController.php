<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TagsController extends Controller {
    public function index(Request $request) {
        // Get the postId from the URL query parameter
        $postId = $request->query('postId');

        if ($postId) {
            // Make a GET request to fetch tags for the specified post ID
            $response = Http::get("http://wordpress/wp-json/wp/v2/tags?post=$postId");
            $tags = $response->json();

            return response()->json([
                'success' => true,
                'tags' => $tags
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post ID not provided in the URL query.'
            ], 400); // Return a 400 Bad Request status code for missing postId
        }
    }
}
