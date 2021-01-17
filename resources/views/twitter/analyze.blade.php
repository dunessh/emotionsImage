@extends('layouts.new')

@section('content')




<div class="container">
  <h1>Analysis of your Twitter Images</h1>
  <div class="row justify-content-center mb-4 mt-2">
 
    <div class="col-md-5"><div class="card" style="height:400px">
      <div class="card-body">
        <div class="col-md-12">
            
            <div id="piechart" style = "position:absolute; left:-20px;"></div>
  
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
            <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
  
            // Draw the chart and set the chart values
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
              ['Emotion', 'Value'],
              ['Happy', {{$positive}}],
              ['Sad', {{$negative}}],
  
            ]);
  
              // Optional; add a title and set the width and height of the chart
              var options = {'title':'Image Emotions Statistics', 'width':425, 'height':375};
  
              // Display the chart inside the <div> element with id="piechart"
              var chart = new google.visualization.PieChart(document.getElementById('piechart'));
              chart.draw(data, options);
            }
            </script>
          </div>  
      </div>
    </div>
  </div>
  <div class="col-md-7" ><div class="card text-center" style="height:400px">
    <div class="card-body">
      <div class="col-md-12">
        @if($mood =="positive")
      
        <div class="w3-display-container" style="height:600px;">
            
            <div class="w3-display-middle">
                
                    <img src="{{ asset('images/happy.jpg') }}" style="width:350px; height:350px;" alt="" title="">
               
    
               
            </div>
            <div class="w3-display-bottommiddle w3-hide-small">Most of your images give a HAPPY emotions</div>
          
        </div>
        @elseif($mood == "neutral")
        <div class="w3-display-container" style="height:600px;">
            
          <div class="w3-display-middle">
              
                  <img src="{{ asset('images/neutral.jpg') }}" style="width:350px; height:350px;" alt="" title="">
             
  
             
          </div>
          <div class="w3-display-bottommiddle w3-hide-small">Your images are both equal in HAPPY and SAD emotions</div>
        
      </div>
        @else
        <div class="w3-display-container" style="height:600px;">
                
                <div class="w3-display-middle">
        
                  
                        <img src="{{ asset('images/sad.jpg') }}" style="width:350px; height:350px;"alt="" title="">
                  
                </div>
                <div class="w3-display-bottommiddle w3-hide-small">Most of your images give a SAD emotions</div>
              
            </div>
        
    
    @endif
      </div>
    </div>
  </div>
</div>

</div>

<div class="row">
  <div class="col-md-12"><div class="card" >
    <div class="card-body">
      <h4 class="card-title">The Emotions of each of your images</h4>
      <div class="col-md-12">
        @php

        $numberofRow = 0;
        $getRemainder = 0;
        $lastIndex = 0;
        $imageLength = count($image);
        
        if($imageLength % 4 == 0)
        {
            $numberofRow = $imageLength;
        }else
        {
            $realimageSize = $imageLength;
            
            $imageLength = (int)((int)$imageLength/4) *4;
            
            $getRemainder = $realimageSize % 4;
            
            $lastIndex = $imageLength;
            
        }
        
        @endphp

        @for($i = 0 ; $i < $imageLength; $i+=4)
        <div class="row">
            @for($j = $i ; $j < $i+4; $j++)
            <div class="col-md-3">
                <img src="{{ asset('images/'.$image[$j]->name.'.jpg') }}" style="width:100%; height:200px;">
              <div style=  "padding: 10px;text-align: center;" >
                {{$image[$j]->sentiment}}
              </div>
            </div>
            @endfor                   
        </div>
        @endfor
        <div class="row">

          @if($getRemainder != 0)
              @for($k = 0 ; $k < $getRemainder; $k++)
              <div class="col-md-4">
                  <img src="{{ asset('images/'.$image[$lastIndex]->name.'.jpg') }}" style="width:100%; height:200px;">
                  <div style=  "padding: 10px;text-align: center;" >
                    {{$image[$lastIndex]->sentiment}}
                  </div>
              </div>
              @php                                 
                    ++$lastIndex;
              @endphp

                @endfor

                @endif

        </div>
      </div>
    </div>
  </div>
</div>

</div>
</div>
</div>



@endsection