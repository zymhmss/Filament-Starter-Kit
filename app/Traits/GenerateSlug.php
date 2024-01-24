<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

trait GenerateSlug
{
    protected function generateSlug($name, $tableName)
    {
        $slug = Str::slug($name, '-');

        $allSlugs = DB::table($tableName)
            ->select('slug')
            ->where('slug', 'like', $slug.'%')
            ->get();

        if (! $allSlugs->contains('slug', $slug)) {
            return $slug;
        }

        for ($i = 1; $i <= 100; $i++) {
            $newSlug = $slug.'-'.$i;

            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
    }
}
