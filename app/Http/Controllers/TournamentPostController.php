<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTournamentPostRequest;
use App\Http\Requests\UpdateTournamentPostRequest;
use App\Models\TournamentPost;
use App\Services\TournamentPostService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TournamentPostController extends Controller
{

    public function __construct(
        private readonly TournamentPostService $tournamentPostService
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        //
        $posts = $request->user()?->isAdmin()
            ? $this->tournamentPostService->adminPaginated()
            : $this->tournamentPostService->publishedPaginated();

        return view('tournament-posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('create', TournamentPost::class);
        return view('tournament-posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTournamentPostRequest $request): RedirectResponse
    {
        //
        $post = $this->tournamentPostService->create(
            $request->validated(),
            $request->user()
        );

        return redirect()
            ->route('tournament-posts.show', $post)
            ->with('success', 'Tournament post created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TournamentPost $tournamentPost): View
    {
        //
        //abort_unless(
        //$tournamentPost->is_published || request()->user()?->isAdmin(),
        //404
        //);

        $this->authorize('view', $tournamentPost);

        return view('tournament-posts.show', [
            'post' => $tournamentPost->load('user'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TournamentPost $tournamentPost): View
    {
        //

        //abort_unless(request()->user()?->isAdmin(), 403);

        $this->authorize('update', $tournamentPost);

        return view('tournament-posts.edit', [
            'post' => $tournamentPost,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTournamentPostRequest $request, TournamentPost $tournamentPost): RedirectResponse
    {
        //
        $post = $this->tournamentPostService->update(
            $tournamentPost,
            $request->validated()
        );

        return redirect()
            ->route('tournament-posts.show', $post)
            ->with('success', 'Tournament post updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TournamentPost $tournamentPost): RedirectResponse
    {
        //
        //abort_unless(request()->user()?->isAdmin(), 403);
        $this->authorize('delete', $tournamentPost);

        $this->tournamentPostService->delete($tournamentPost);

        return redirect()
            ->route('tournament-posts.index')
            ->with('success', 'Tournament post deleted.');
    }
}
