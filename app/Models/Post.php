<?php

namespace App\Models;

use Illuminate\Support\Collection;

class Post
{
    protected static $blogPosts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Ucup Markucup",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt nostrum consequatur,
            sit maiores quia nisi error itaque! Asperiores magni est impedit illum maiores distinctio,
            iusto sequi autem. Eos, accusamus est."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => 'judul-post-kedua',
            "author" => "Otong Sarotong",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt nostrum consequatur,
            sit maiores quia nisi error itaque! Asperiores magni est impedit illum maiores distinctio,
            iusto sequi autem. Eos, accusamus est. maiores quia nisi error itaque!
            Asperiores magni est impedit illum maiores distinctio, iusto sequi autem. Eos, accusamus est. "
        ]
    ];

    public static function all(): Collection
    {
        return collect(self::$blogPosts);
    }

    public static function find($slug): array
    {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
