<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Inertia\Inertia;
use Illuminate\Pagination\Paginator;

class BlogController extends Controller
{
    private BlogService $service;
    private array $categories;

    public function __construct(BlogService $service)
    {
        $this->service = $service;
        $this->categories = $this->service->getCategories();
    }
    // generate resource function

    public function index(Request $request)
    {
        $posts = $this->service->getAll(true);

        $paginated_posts = $this->paginate(
            $posts, $request->per_page ?? 25,
            $request->page ?? 1,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );
        return Inertia::render('blog/index', [
            'posts' =>  $this->service->getAll(true) ?? [],
            'paginated_posts' => $paginated_posts ?? [],
            'categories' => $this->categories ?? [],
        ]);
    }


    public function category(Request $request, $slug)
    {
        $posts = $this->service->getCategoryPosts($slug);

        $paginated_posts = $this->paginate(
            $posts, $request->per_page ?? 25,
            $request->page ?? 1,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );
        return Inertia::render('blog/category', [
            'posts' =>  $this->service->getAll(true) ?? [],
            'paginated_posts' => $paginated_posts ?? [],
            'categories' => $this->categories ?? [],
            'category' => $this->service->getCategory($slug),
        ]);
    }

    public function author(Request $request, $slug)
    {
        $posts = $this->service->getAuthorPosts($slug);

        $paginated_posts = $this->paginate(
            $posts, $request->per_page ?? 25,
            $request->page ?? 1,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );
        return Inertia::render('blog/author', [
            'posts' =>  $this->service->getAll(true) ?? [],
            'paginated_posts' => $paginated_posts ?? [],
            'categories' => $this->categories ?? [],
            'author' => $this->service->getAuthor($slug),
        ]);
    }

    public function show($slug)
    {
        $post = $this->service->getOne($slug);
        return Inertia::render('blog/post', [
            'slug' => $slug,
            'post' => $post ?? [],
            'categories' => $this->categories ?? [],
        ]);
    }

    public function paginate($items, $perPage = 25, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
