<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Http;
use collection;

class show extends Model
{
    use HasFactory;
    /**
     * @param type => Movie | tv
     * @param append => with genre
     */
    public static function discover($type,$page,$append=[]) {
      $key = env('tmdb');
      $result = Http::get("https://api.themoviedb.org/3/discover/$type?api_key=$key&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=$page&with_watch_providers=netflix")->json();
      return $result['results'];
    }
    /**
     *  
     * @param data => 'sort type'
     * @param type => 'tv , movie'
     * @param page => number of page each page contain 20 result
     * @param genre => return array of shows with specific genre
     * 
     */
    public static function pushShow($data,$type,$page= 1,$with_genre = '') {
        $key = env('tmdb');
        $result = Http::get("https://api.themoviedb.org/3/$type/$data?api_key=$key&language=en-US&page=1&with_genres=$with_genre&page=$page")->json();
        if(!isset($result['success'])) {
          return $result['results'];
        } 
    }
    /**
     * @param id => [0,9]
     * @param type => movie | tv
     */
    public static function hook($type,$id,$res = []) {
      $key = env('tmdb');
      $imp = implode(',',$res);
      $result = Http::get("https://api.themoviedb.org/3/$type/$id?api_key=$key&language=en-US$&append_to_response=$imp")->json();
      return $result;
    }
    /**
     * @param type => chunk,map,merge
     * @param arr -> array need to apply collection on it 
     * @param limit => [0,9]
     */
    public static function collected($type,$arr = [],$limit = null) {
       if($type == 'chunk') {
          $collection = collect($arr)->chunk($limit);
       } else if($type == 'map') {
         $collection = collect($arr)->mapWithKeys(function($arr){
            return [$arr['id'] => $arr['name']];
         });
       } else if($type == 'merge') {
         $collection = collect($arr[0])->merge($arr[1]);
       }
       return $collection;
    }
  
    public static function similarGenre($data,$genid = []) {
      $key = env('tmdb');
      $genreShow = [];
      foreach($genid as $gen) {
          $id = $gen['id'];
          $collection = Http::get("https://api.themoviedb.org/3/discover/$data?api_key=$key&with_genres=$id")->json()['results'];
          $genreShow[$gen['id']] = $collection;
      }
      // $collection = collect($genreShow)->mapWithKeys(function($arr){
      //   return [array_keys($arr) => ];
      // });
      return $genreShow;
  }
    /**
     * @param type => 'movie | tv'
     */
    public static function genre_id($type) {
       $key = env('tmdb');
       return Http::get("https://api.themoviedb.org/3/genre/$type/list?api_key=$key&language=en-US")->json()['genres'];
    }

    public static function search($type,$keyword,$page,$show="movie") {
      $key = env('tmdb');
      if($type == 'query') {
          $collection = Http::get("https://api.themoviedb.org/3/search/multi?api_key=$key&language=en-US&page=1&include_adult=false&query=$keyword&page=$page")->json();
      } else if ($type == 'genre') {
          $collection = Http::get("https://api.themoviedb.org/3/discover/$show?api_key=$key&with_genres=$keyword&page=$page")->json();
      }
      if(!isset($collection['success'])) {
          return $collection['results'];
      }  else {
         return [];
      }
    }
    public static function test() {
      return "test succ";
    }


}
