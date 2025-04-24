<?php

namespace App\Services;

use App\Models\Movie;

class MovieService
{
    public function getFilteredMovies($search = null)
    {
        $query = Movie::latest();

        if ($search) {
            $query->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('sinopsis', 'like', '%' . $search . '%');
        }

        return $query->paginate(6)->withQueryString();
    }
}
