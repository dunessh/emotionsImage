<?php

namespace App\Http\Controllers;


set_time_limit(0);

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Http;
use App\Models\Image;
use Session;

class PagesController extends Controller
{
    
    public function analyze(){
        $title = 'Sentiment Analysis';
        $imagearray = Session::get('key');
        $userID = Session::get('userID');
        
        $resp = Http::get('http://127.0.0.1:5000/webhook?username='.$userID);
        $person = json_decode($resp,true);
        
        if($person['positive']>$person['negative']){
            $mood = 'positive';
        }
        elseif($person['positive']<$person['negative']){
            $mood = 'negative';
        }
        else{
            $mood = 'neutral';
        }
        
        $image = image::where('id_str',$userID)->get();
        foreach($image as $v){
            $emotion = $v->sentiment;
            if($emotion > 40){
                $v->sentiment = 'Happy';
            }
            elseif($emotion == 40){
                $v->sentiment = 'Neutral';
            }
            else{
                $v->sentiment = 'Sad';
            }
        }
        
      
        return view('twitter.analyze',['mood'=> $mood,'sentiment'=> $person['sentiment'],'negative'=> $person['negative'],'positive'=> $person['positive'],'image'=>$image]);
    }


}