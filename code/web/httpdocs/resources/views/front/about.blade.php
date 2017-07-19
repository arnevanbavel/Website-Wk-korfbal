@extends("frontmasterpage", ['albums' => $albums])

@section("content")
		<div class="pageContainer" id="changeHeader">
			<div class="aboutContainer">
				<div class="blockTitle">
					<h1>{{ trans('translation.about') }}</h1>
				</div>
				<div>
					<h2>{{ trans('translation.aboutTitle')}}</h2>
					<p>{{ trans('translation.aboutText')}}</p>
				</div>
				<ul>
					<li>Poule A:</li>
					<li>Belgie</li>
					<li>Australie</li>
					<li>Rusland</li>
					<li>Brazilie</li>
				</ul>
				<ul>
					<li>Poule B:</li>
					<li>Nederland</li>
					<li>Tjechie</li>
					<li>Duitsland</li>
					<li>Hongarije</li>
				</ul>
				<ul>
					<li>Poule C:</li>
					<li>Taiwan</li>
					<li>Catalonie</li>
					<li>Hong Kong</li>
					<li>Polen</li>
				</ul>
				<ul>
					<li>Poule D:</li>
					<li>Portugal</li>
					<li>Engeland</li>
					<li>China</li>
					<li>Zuid-Afrika</li>
				</ul>
				<div>
				<h2>{{ trans('translation.aboutTitle2') }}</h2>
					<p>{{ trans('translation.aboutText2') }}</p>
				</div>
			</div>
		</div>
@stop