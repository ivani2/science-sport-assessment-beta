<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'event_date',
        'location',
        'excerpt',
        'body',
        'sponsorship_details',
        'cta_label',
        'cta_url',
        'is_published',
        //which another admin did created it
        'user_id',
    ];
    //to convert automatically event inoto an date object
    //convert is published ? into a real boolean
    protected function casts(): array
    {
        return [
            'event_date' => 'date',
            'is_published' => 'boolean',
        ];
    }

    //a post will belong to an 'admin' user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /** @use HasFactory<\Database\Factories\TournamentPostFactory> */
    use HasFactory;
}
