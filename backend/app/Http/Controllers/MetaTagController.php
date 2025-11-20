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

    public function store(Request $request)
    {
        $request->validate([
            'page_id' => 'required',
            'meta_name' => 'required',
            'meta_value' => 'required',
        ]);

        return MetaTag::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $tag = MetaTag::findOrFail($id);

        $tag->update($request->all());

        return $tag;
    }

    public function destroy($id)
    {
        MetaTag::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
