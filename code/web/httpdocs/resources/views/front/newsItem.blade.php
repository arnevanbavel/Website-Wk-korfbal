@extends("frontmasterpage", ['albums' => $albums])

@section("content")

		<div class="pageContainer" id="changeHeader">
			<div class="newsIndContainer">
				<div class="blockTitle">
					<a href="{{ URL::action('FrontController@getNews') }}">View all news</a>
				</div>
				<div class="individualContainer">
				<div class="leftContainer container">
				<h1>{{$news->title}}</h1>
				<small>Posted on: {{$news->publish_at}}</small>
				<p>{{$news->body_eng}}</p>
				<p>{{$news->body_nl}}</p>
				</div>
					<div class="rightContainer container">
				@if($news->url_image)
					<div class="image" style="background: url({{$news->url_image}});"></div>
				@endif		
				@if($news->url_youtube)
					<iframe width="450" height="400" src="https://www.youtube.com/embed/{{$news->url_youtube}}" frameborder="0" allowfullscreen></iframe>
				@endif			
				</div>
				</div>



<div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'wkkorfball';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
</div>
</div>


@stop