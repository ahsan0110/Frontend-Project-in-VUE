<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PageMetaController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $search = $request->input('search');

        $query = Page::with('metaTags');
        if ($search) {
            $query->where('title', 'LIKE', "%$search%");
        }

        $pages = $query->get();

        $flattened = [];
        foreach ($pages as $page) {
            if ($page->metaTags->count()) {
                foreach ($page->metaTags as $tag) {
                    $flattened[] = [
                        'uniqueKey' => $page->id . '-' . $tag->id,
                        'pageId' => $page->id,
                        'pageTitle' => $page->title,
                        'metaId' => $tag->id,
                        'metaName' => $tag->meta_name,
                        'metaValue' => $tag->meta_value,
                    ];
                }
            } else {
                $flattened[] = [
                    'uniqueKey' => $page->id . '-no-meta',
                    'pageId' => $page->id,
                    'pageTitle' => $page->title,
                    'metaId' => null,
                    'metaName' => null,
                    'metaValue' => null,
                ];
            }
        }

        // Now paginate the flattened rows manually
        $page = $request->input('page', 1);
        $total = count($flattened);
        $sliced = array_slice($flattened, ($page - 1) * $perPage, $perPage);

        $paginated = new LengthAwarePaginator(
            $sliced,
            $total,
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return response()->json([
            'data' => $paginated->items(),
            'current_page' => $paginated->currentPage(),
            'last_page' => $paginated->lastPage(),
            'total' => $paginated->total(),
        ]);
    }
}
