<?php

namespace App\Services;

use App\Models\TournamentPost;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class TournamentPostService
{
    // Return published posts for public listing

    public function publishedPaginated(int $perPage = 5): LengthAwarePaginator
    {
        return TournamentPost::query()
            ->where('is_published', true)
            ->latest()
            ->paginate($perPage);
    }

    //Return all posts for admin management
    public function adminPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return TournamentPost::query()
            ->with('user')
            ->latest()
            ->paginate($perPage);
    }

    //only admin ?
    public function create(array $data, User $user): TournamentPost
    {
        $data['user_id'] = $user->id;
        $data['slug'] = $this->uniqueSlug($data['title']);
        $data['is_published'] = (bool) ($data['is_published'] ?? false);

        return TournamentPost::create($data);
    }

    public function update(TournamentPost $post, array $data): TournamentPost
    {
        if (($data['title'] ?? null) !== $post->title) {
            $data['slug'] = $this->uniqueSlug($data['title'], $post);
        }

        $data['is_published'] = (bool) ($data['is_published'] ?? false);

        $post->update($data);

        return $post;
    }

    // Delete a tournament post
    public function delete(TournamentPost $post): void
    {
        $post->delete();
    }

    // Build a unique slug from the post title
    private function uniqueSlug(string $title, ?TournamentPost $ignorePost = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 2;

        while (
            TournamentPost::query()
            ->where('slug', $slug)
            ->when($ignorePost, fn($query) => $query->whereKeyNot($ignorePost->id))
            ->exists()
        ) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        return $slug;
    }
}
