<?php

namespace App\Http\Controllers;

use App\Models\Argument;
use App\Models\Mock;
use App\Services\MockService;
use Generator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use ReflectionMethod;

class MockController extends Controller
{
    public function __construct(protected readonly MockService $mockService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginated_mocks = $this->mockService->getPaginatedMocks();
        return Inertia::render('Mock/Index', [
            "mocks" => $paginated_mocks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("Mock/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->mockService->createMock($request);

        return to_route('mocks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mock $mock)
    {
        return Inertia::render('Mock/Try', [
            'mock' => $mock->load('arguments'),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function use(Mock $mock, Request $request)
    {
        return response()->json([
            "data" => $this->mockService->useMock($mock, $request)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mock $mock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mock $mock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mock $mock)
    {
        $this->mockService->deleteMock($mock);

        return redirect()->route('mocks.index')->with([
            'success' => true,
            'message' => "Mock deleted successfully"
        ]);
    }
}
