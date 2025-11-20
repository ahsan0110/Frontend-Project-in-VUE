<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaTag;

class MetaTagController extends Controller
{
    public function index($pageId)
    {
        return MetaTag::where('page_id', $pageId)->get();
    }

    public function store(Request $request, $pageId)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'value' => 'required|string',
        ]);

        $data['page_id'] = $pageId;
        $meta = MetaTag::create($data);
        return response()->json($meta);
    }
    
    public function update(Request $request, $id)
    {
        $meta = MetaTag::findOrFail($id);
        $meta->update($request->only(['name', 'value']));
        return response()->json($meta);
    }

    public function destroy($id)
    {
        $meta = MetaTag::findOrFail($id);
        $meta->delete();
        return response()->json(['message' => 'Deleted']);
    }

}
