<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    public function run()
    {
        $pages = [
            [
                'slug' => 'landing',
                'title' => 'Twoday | Digital Solutions',
                'meta_tags' => [
                    'keywords' => 'twoday, digital solutions, IT',
                    'robots' => 'index, follow'
                ]
            ],
            [
                'slug' => 'services',
                'title' => 'Our Services',
                'meta_tags' => [
                    'keywords' => 'services, ai, software, cloud',
                    'robots' => 'index, follow'
                ]
            ],
            [
                'slug' => 'about',
                'title' => 'About Us',
                'meta_tags' => [
                    'keywords' => 'about, company, team',
                    'robots' => 'index, follow'
                ]
            ],
            [
                'slug' => 'career',
                'title' => 'Career Opportunities',
                'meta_tags' => [
                    'keywords' => 'career, jobs, hiring',
                    'robots' => 'index, follow'
                ]
            ],
            [
                'slug' => 'contact',
                'title' => 'Contact Us',
                'meta_tags' => [
                    'keywords' => 'contact, support, sales',
                    'robots' => 'index, follow'
                ]
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
