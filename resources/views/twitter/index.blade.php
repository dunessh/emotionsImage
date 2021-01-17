@extends('layouts.app')

@section('content')

<header>

	<div class="container">

		<div class="profile">

			<div class="profile-image">

				<img src="{{$profile_image}}" alt="" style="width:300px;height:300px;">

			</div>

			<div class="profile-user-settings">

				<h1 class="profile-user-name">{{$screen_name}}</h1>
        
			</div>

			<div class="profile-stats">

				<ul>
					<li><span class="profile-stat-count">{{$statuses_count}}</span> posts</li>
					<li><span class="profile-stat-count">{{$followers_count}}</span> followers</li>
        			<li> created at <span class="profile-stat-count">{{$created_at}}</span></li>
				</ul>

			</div>

			<div class="profile-bio">

				<p><span class="profile-real-name">{{$user_name}}</span> , Below are the images our system has retrieved from your Twitter timeline.
																				click "Analyze your Image" to detect the overall emotions of your Images</p>
        <a href="/analyze" class="btn btn-primary btn-lg" role="button">Analyze your Images</a>
			</div>

		</div>
		<!-- End of profile section -->

	</div>
	<!-- End of container -->

</header>
	<div class="container">

		<div class="gallery">

      @foreach($data as $key => $value)

                
      @if(!empty($value['extended_entities']['media']))
      <div class="gallery-item" tabindex="0">
        @foreach($value['extended_entities']['media'] as $v)

        <img src="{{ $v['media_url_https'] }}" class="gallery-image" alt="">
        
         @endforeach

			</div>
   
      @endif


      @endforeach

		</div>
		<!-- End of gallery -->



	</div>
	<!-- End of container -->


@endsection