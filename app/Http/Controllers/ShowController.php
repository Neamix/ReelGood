<?php

namespace App\Http\Controllers;

use App\Models\show;
use App\Models\User;
use App\Models\action;
use Auth;
use App\View\Components\medshowbox;
use Illuminate\Http\Request;
use View;


class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trend = show::pushShow('top_rated','tv');
        $air_today   = show::pushShow('airing_today','tv');
        $pop_movie   = show::pushShow('popular','movie');
        $top_movie   = show::pushShow('top_rated','movie');
        $ppl         = show::pushShow('popular','person');
        $pplChunk    = show::collected('chunk',$ppl,2);
        $upcomming   = show::pushShow('upcoming','movie',1);
        return view('pages/discover',
        [
        'trend'=>$trend,
        'airToday'=>$air_today,
        'popMovie'=>$pop_movie,
        'topRate'=>$top_movie,
        'ppl'=>$pplChunk,
        'upcoming'=>$upcomming
        ]);
    }
    /**
     * @param $type => movie | tv
     * @param $id   => [0-9]
     */
    public function display($type,$id) 
    {
      $display = show::hook($type,$id,['videos','credits','similar']);
      $genre   = show::genre_id($type);
      $genreCollection    = show::collected('map',$genre);
      $cast = (isset($display['credits']['cast'] )) ? $display['credits']['cast'] : '';
      $crew = (isset($display['credits']['crew'] )) ? $display['credits']['crew'] : '';
      $credits = show::collected('merge',[$crew,$cast]);
      $credits = show::collected('chunk',$credits,2);
      $showBulk = show::similarGenre($type,$display['genres']);
      return view('pages/display',[
          'display' => $display,
          'genre'   => $genreCollection,
          'crew'    => $credits,
          'showsBulk' => $showBulk,
          'id'      => $id
      ]);
    }
    /**
     * @param keyword => search query
     * @param type    => query | category
     * @param page    => number of page 
     * @param show    => tv | movie
     */
    public function search(Request $request,$keyword,$type="query",$page=1,$show = 'movie')
    {
       if($type == 'genre') {
           if(!is_numeric($keyword)) {
               return abort(404);
           } 
       } 
       if($request->ajax()) {
        $search = show::search($request->type,$request->keyword,$request->page);
        $arr = [];
        foreach($search as $show) {
            $box = View::make("components.medshowbox")
            ->with("show", $show)
            ->render();
            array_push($arr,$box);
         }
          return  $arr;
       } else {
          $sec = $page + 1;
          $search = show::collected('merge',[show::search($type,$keyword,$page,$show),show::search($type,$keyword,$sec,$show)]);
          $arr = [];
          return view('pages/Search',[
            'search' => $search,
            'keyword' => $keyword,
            'type' => $type,
            'keyword'=>$keyword,
            'page' => $page,
            'show' => $show
        ]);
       }
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\show  $show
     * @return \Illuminate\Http\Response
     * 
     */
    public function shows(Request $request,$show_name,$sort='popular',$page=1,$genre_arr='')
    {
        $show  = show::pushShow($sort,$show_name,$page,$genre_arr);
        $genre = show::genre_id($show_name);
        $genreCollection    = show::collected('map',$genre);
        if($request->ajax()) {
            $showhook  = show::pushShow($request->sort,$request->show_name,$request->page,$request->genre_arr);
            $arr = [];
            foreach($showhook as $item) {
                $box = View::make("components.lgshowbox")
                ->with(["show"=>$item,"genreCollection"=>$genreCollection])
                ->render();
                array_push($arr,$box);
             }
            return $arr;
        } else {
            if(empty($show)) return abort(404);
            return view('pages.show')->with([
                'genre' => $genre,
                'genreCollection' => $genreCollection,
                'discover'  => $show,
                'sort' => $sort,
                'gen' => $genre_arr,
                'sh' => $show_name
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\show  $show
     * @return \Illuminate\Http\Response
     */
    public function edit(show $show)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\show  $show
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, show $show)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\show  $show
     * @return \Illuminate\Http\Response
     */
    public function destroy(show $show)
    {
        //
    }
}
