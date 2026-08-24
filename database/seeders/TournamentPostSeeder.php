<?php

namespace Database\Seeders;

use App\Models\TournamentPost;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TournamentPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        //find the admin from the first seeder
        $admin = User::where('email', 'admin@example.com')->firstOrFail();

        TournamentPost::updateOrCreate(
            ['slug' => 'golf-classic-tournament-2026-b'],
            [
                'user_id' => $admin->id,
                'title' => 'Golf Classic Tournament',
                'subtitle' => 'Empowering Students Through Sports',
                'event_date' => '2026-09-09',
                'location' => 'Monterrey Country Club',
                'excerpt' => 'Support Science of Sport through a golf event that helps bring
                  transformational learning experiences to students across LA County.',
                'body' => 'When you tee it up at the Science of Sport Golf Classic, you drive the
                  organization forward. With support from golfers and sponsors, more students across
                  LA County can experience transformational learning opportunities built around sports
                  and education.',
                'sponsorship_details' => "Title Sponsor: $15,000, includes 12 golfers and premium
                  recognition.\nChampion: $8,500, includes 8 golfers.\nAll Star: $5,000, includes 4
                  golfers.\nMVP: $3,000, includes 4 golfers.\nFoursome: $1,800.\nSingle golfer: $450.
                  \n19th Hole Attendee: $45.",
                'cta_label' => 'Tee Up Today',
                'cta_url' => 'https://secure.qgiv.com/',
                'is_published' => true,
            ]
        );

        TournamentPost::updateOrCreate(
            ['slug' => 'science-of-sport-2026-a'],
            [
                'user_id' => $admin->id,
                'title' => 'Bringing academics to life through sports 2026 A',
                'subtitle' => 'Support student learning through sports 2026 A',
                'event_date' => '2026-11-10',
                'location' => 'Calabasas Country Club',
                'excerpt' => 'Explore sponsorship options for the Golf Classic Tournament.',
                'body' => 'Sponsors receive event signage, digital promotion, custom branded
                  opportunities, reserved range sections, VIP perks, raffle tickets and board
                  recognition.',
                'sponsorship_details' => "Activation on selected hole or experience.\nEvent signage
                  and digital promotion.\nCustom branded golf carts.\nVIP perks and on-course
                  contests.\nQuick check-in and board recognition.",
                'cta_label' => 'View Sponsorships',
                'cta_url' => 'https://sciencesport.org/golf-classic-tournament-2025/',
                'is_published' => true,
            ]
        );
        TournamentPost::updateOrCreate(
            ['slug' => 'science-of-sport-2026-b'],
            [
                'user_id' => $admin->id,
                'title' => 'Bringing academics to life through sports 2026 B',
                'subtitle' => 'Support student learning through sports 2026 B',
                'event_date' => '2026-12-12',
                'location' => 'Calabasas Country Club',
                'excerpt' => 'Explore sponsorship options for the Golf Classic Tournament.',
                'body' => 'Sponsors receive event signage, digital promotion, custom branded
                  opportunities, reserved range sections, VIP perks, raffle tickets and board
                  recognition.',
                'sponsorship_details' => "Activation on selected hole or experience.\nEvent signage
                  and digital promotion.\nCustom branded golf carts.\nVIP perks and on-course
                  contests.\nQuick check-in and board recognition.",
                'cta_label' => 'View Sponsorships',
                'cta_url' => 'https://sciencesport.org/golf-classic-tournament-2025/',
                'is_published' => true,
            ]
        );
        TournamentPost::updateOrCreate(
            ['slug' => 'science-of-sport-2027-a-draft'],
            [
                'user_id' => $admin->id,
                'title' => 'Sponsorship Options Draft',
                'subtitle' => 'Support student learning through sports',
                'event_date' => '2027-01-03',
                'location' => 'Calabasas Country Club',
                'excerpt' => 'Explore sponsorship options for the Golf Classic Tournament.',
                'body' => 'Sponsors receive event signage, digital promotion, custom branded
                  opportunities, reserved range sections, VIP perks, raffle tickets and board
                  recognition.',
                'sponsorship_details' => "Activation on selected hole or experience.\nEvent signage
                  and digital promotion.\nCustom branded golf carts.\nVIP perks and on-course
                  contests.\nQuick check-in and board recognition.",
                'cta_label' => 'View Sponsorships',
                'cta_url' => 'https://sciencesport.org/golf-classic-tournament-2025/',
                'is_published' => false,
            ]
        );
    }
}
