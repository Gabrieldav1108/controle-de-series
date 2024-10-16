<?php 

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Models\Episode;
use App\Models\Season;
use Illuminate\Support\Facades\DB;

//classe que vai lidar com os detalhes de banco de dados
class EloquentSeriesRepository implements SeriesRepository
{
    public function add(SeriesFormRequest $request):Series{
        return DB::transaction(function()use ($request) {
            //buscando os dados inseridos
                $serie = Series::create($request->all());

                //logica para atribuir os valores
                $seasons = [];  
                for($i=1; $i<=$request->seasonsQty; $i++){
                    $seasons[] = [
                        'series_id'=> $serie->id,
                        'number' => $i
                    ];
                }
                Season::insert($seasons);

                $episodes = [];
                foreach ($serie->seasons as $season) {
                    for ($j = 1; $j <= $request->episodesPerSeason; $j++ ){
                        $episodes[] = [
                            'season_id' => $season->id,
                            'number' => $j
                        ]; 
                    }
                }
                Episode::insert($episodes);

                return $serie;
        });
    }
}