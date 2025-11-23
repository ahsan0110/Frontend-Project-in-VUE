<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
{   
    $search = $request->query('search');
    $perPage = $request->query('per_page', 3); 

    $query = Page::query();

    if ($search) {
        $query->where('title', 'LIKE', '%' . $search . '%');
    }
    $pages = $query->paginate($perPage); 
    return response()->json($pages);
}

    public function show($id) {
        return Page::findOrFail($id);
    }

    public function store(Request $request) {
        $page = Page::create($request->all());
        return response()->json($page, 201);
    }

    public function update(Request $request, $id) {
        $page = Page::findOrFail($id);
        $page->update($request->all());
        return response()->json($page, 200);
    }

    public function destroy($id) {
        Page::destroy($id);
        return response()->json(null, 204);
    }
}

