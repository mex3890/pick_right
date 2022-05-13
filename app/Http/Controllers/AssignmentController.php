<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Category;
use App\Models\Stat;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use function PHPUnit\Framework\isEmpty;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $categories = Category::all();
        $stats = Stat::all();
        $search = $request->search;
        $searchStat = $request->searchStat;
        $searchCategory = $request->searchCategory;
        $direction = $request->direction ?? 'asc';
        $column = $request->column;
        $newDirection = $direction == 'asc' ? 'desc' : 'asc';

        $assignments = Assignment::with(['stat', 'category'])
            ->when($search, function($query, $search) {
            $query->where('name', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
        })->when($searchStat, function($query, $searchStat) {
            $query->where('stat_id', $searchStat);
        })->when($searchCategory, function($query, $searchCategory) {
            $query->where('category_id', $searchCategory);
        })->when($column && $direction, function ($query) use ($direction, $column) {
            $query->orderBy($column, $direction);
        })
            ->paginate(5);
        //dd($assignments->items());
        return view('assignment.index', ['assignments' => $assignments, 'categories' => $categories, 'stats' => $stats, 'oldStat' => $searchStat, 'oldCategory' => $searchCategory, 'newDirection' => $newDirection]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $categories = Category::all();
        $stats = Stat::all();
        return view('assignment.create', ['categories' => $categories, 'stats' => $stats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(Request $request): Application|RedirectResponse|Redirector
    {
        if($request->input('_token') != ''){
            $request->validate(Assignment::$rules, Assignment::$feedback);
            $assignment = new Assignment([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'stat_id' => $request->get('stat_id'),
                'category_id' => $request->get('category_id')
            ]);
            $assignment->save();
        }

        return redirect(route('assignment.index'))->with('Success', 'Assignment added successfully!');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Assignment $assignment): Application|Factory|View
    {
        $assignment = $assignment->load(['category', 'stat']);
        return view('assignment.show', ['assignment'=>$assignment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Assignment $assignment
     * @return Application|Factory|View
     */
    public function edit(Assignment $assignment): View|Factory|Application
    {
        $categories = Category::all();
        $stats = Stat::all();
        return view('assignment.edit', ['assignment' => $assignment, 'categories' => $categories, 'stats' => $stats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Assignment $assignment
     * @return Application|Factory|View
     */
    public function update(Request $request, Assignment $assignment): View|Factory|Application
    {
        if($request->input('_token') != ''){
            $request->validate(Assignment::$rules, Assignment::$feedback);
            $assignment->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'stat_id' => $request->input('stat_id'),
                'category_id' => $request->input('category_id')
            ]);
            $assignment->save();
        }
        return view('assignment.show', ['assignment' => $assignment]);
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy(Assignment $assignment): RedirectResponse
    {
        $assignment->delete();
        return redirect()->route('assignment.index');
    }
}
