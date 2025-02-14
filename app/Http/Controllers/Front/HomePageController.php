<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class HomePageController extends Controller
{
    public function index()
    {
        $lastData = $this->lastData();
        $data = Post::where('status', 'publish')
                    ->where('id', '!=', $lastData->id ?? null)
                    ->orderBy('id', 'desc')
                    ->paginate(2);

        return view('components.front.home-page', compact('data','lastData'));
    }

    private function lastData()
    {
        return Post::where('status', 'publish')
                    ->orderBy('id', 'desc')
                    ->latest()
                    ->first();
    }
}
