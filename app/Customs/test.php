<?php
use App\Models\show;
class provider {
    public static function hook($id) {
         $key = env('tmdb');
         $provider = Http::get("https://api.themoviedb.org/3/tv/$id/watch/providers?api_key=$key")->json();
         if(isset($provider["results"]["US"]["flatrate"])) {
            return $provider["results"]["US"]["flatrate"];
         } else {
             return null;
         }
        
    }
}