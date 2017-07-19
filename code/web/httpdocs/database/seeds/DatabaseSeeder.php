<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\News;
use App\User;
use App\Message;
use App\Events;
use App\Team;
use App\Tag;
use App\Player;
use App\Album;
use App\Media;
use App\Highscore;
use App\Location;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{	   
		/* 	DISABLES FOREIGN KEYS FOR DATASEED 
			(Bad practice maar ging niet anders...)
		*/
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		Model::unguard();

		/*TEAMS*/
		DB::table('teams')->delete();

		Team::create([
			'id' => 1,
			'name' => 'Belgium',
			'url_flag' => '/images/team/1.png',
			'about' => 'The Belgium national korfball team is managed by the Koninklijke Belgische Korfbalbond (KBKB), representing Belgium in korfball international competitions. The Koninklijke Belgische Korfbalbond was one of the founders of the International Korfball Federation, with the Dutch Federation, on 11 June 1933.',
			'tag_id' => 1,
			'url_cover' => '/img/sample.jpg'
		]);
		Team::create([
			'name' => 'Australia',
			'url_flag' => '/images/team/2.png',
			'tag_id' => 2,
			'url_cover' => '/img/sample.jpg'
		]);
		Team::create([
			'name' => 'Russia',
			'url_flag' => '/images/team/3.png',
			'tag_id' => 3,
			'url_cover' => '/img/sample.jpg'
		]);
		Team::create([
			'name' => 'Brasil',
			'url_flag' => '/images/team/4.png',
			'tag_id' => 4,
			'url_cover' => '/img/sample.jpg'
		]);
		Team::create([
			'name' => 'Netherlands',
			'url_flag' => '/images/team/5.png',
			'tag_id' => 5,
			'url_cover' => '/img/sample.jpg'
		]);
		Team::create([
			'name' => 'Czech Republic',
			'url_flag' => '/images/team/6.png',
			'tag_id' => 6,
			'url_cover' => '/img/sample.jpg'
		]);
		Team::create([
			'name' => 'Germany',
			'url_flag' => '/images/team/7.png',
			'tag_id' => 7,
			'url_cover' => '/img/sample.jpg'
		]);
		Team::create([
			'name' => 'Hungary',
			'url_flag' => '/images/team/8.png',
			'tag_id' => 8,
			'url_cover' => '/img/sample.jpg'
		]);
		Team::create([
			'name' => 'Chinese Tapei',
			'url_flag' => '/images/team/9.png',
			'tag_id' => 9,
			'url_cover' => '/img/sample.jpg'
		]);
		Team::create([
			'name' => 'Catalonia',
			'url_flag' => '/images/team/10.png',
			'tag_id' => 10,
			'url_cover' => '/img/sample.jpg'
		]);
		Team::create([
			'name' => 'Hong Kong',
			'url_flag' => '/images/team/11.png',
			'tag_id' => 11,
			'url_cover' => '/img/sample.jpg'
		]);
		Team::create([
			'name' => 'Poland',
			'url_flag' => '/images/team/12.png',
			'tag_id' => 12,
			'url_cover' => '/img/sample.jpg'
		]);
		Team::create([
			'name' => 'Portugal',
			'url_flag' => '/images/team/13.png',
			'tag_id' => 13,
			'url_cover' => '/img/sample.jpg'
		]);
		Team::create([
			'name' => 'England',
			'url_flag' => '/images/team/14.png',
			'tag_id' => 14,
			'url_cover' => '/img/sample.jpg'
		]);
		Team::create([
			'name' => 'China',
			'url_flag' => '/images/team/15.png',
			'tag_id' => 15,
			'url_cover' => '/img/sample.jpg'
		]);
		Team::create([
			'name' => 'South Afrika',
			'url_flag' => '/images/team/16.png',
			'tag_id' => 16,
			'url_cover' => '/img/sample.jpg'
		]);

		/* USERS */
		DB::table('users')->delete();
		
		User::create([
			'name' => 'admin',
			'role' => 1,
			'team' => 0,
			'email' => 'admin@test.be',
			'password' => bcrypt('root')
		]);

		User::create([
			'name' => 'belgium-teamleader',
			'role' => 2,
			'team' => 1,
			'email' => 'guide@test.be',
			'password' => bcrypt('root')
		]);

		User::create([
			'name' => 'brasil',
			'role' => 3,
			'team' => 4,
			'email' => 'player-brasil@team.com',
			'password' => bcrypt('root')
		]);

		User::create([
			'name' => 'belgium',
			'role' => 3,
			'team' => 1,
			'email' => 'player@test.be',
			'password' => bcrypt('root')
		]);


		/* */
		DB::table('players')->delete();

		for ($i=0; $i < 16; $i++) { 
			Player::create([
				'first_name' => 'player ' . $i,
				'last_name' => 'Lastname',
				'number' => $i,
				'gender' => true,
				'team_id' => 1
			]);
		}

		/* NEWS */
        DB::table('news')->delete();


       	News::create([	'title' => 'Integer a ultrices',
        				'body_eng' => 'Nam ac imperdiet nulla. Integer a ultrices diam. Aliquam erat volutpat. Nullam dignissim, eros eu porta dapibus, purus sapien tempor nibh, eu pellentesque lorem turpis vel velit. Cras posuere metus vitae purus scelerisque placerat. Pellentesque vitae dolor faucibus, feugiat dui id, commodo justo. Suspendisse condimentum id odio vitae lacinia. Sed urna elit, sagittis at ullamcorper sit amet, elementum nec nisi. Mauris ac volutpat purus. Phasellus vel malesuada diam. Vestibulum nec ex diam.',
        				'sender_team' => 1,
        				'url_youtube' => 'a81yu8nDPr0',
        				'visible' => true]);


       	News::create([	'title' => 'Integer a ultrices',
        				'body_eng' => 'Nam ac imperdiet nulla. Integer a ultrices diam. Aliquam erat volutpat. Nullam dignissim, eros eu porta dapibus, purus sapien tempor nibh, eu pellentesque lorem turpis vel velit. Cras posuere metus vitae purus scelerisque placerat. Pellentesque vitae dolor faucibus, feugiat dui id, commodo justo. Suspendisse condimentum id odio vitae lacinia. Sed urna elit, sagittis at ullamcorper sit amet, elementum nec nisi. Mauris ac volutpat purus. Phasellus vel malesuada diam. Vestibulum nec ex diam.',
        				'sender_team' => 1,
        				'url_image' => '/images/catalog/5.jpg',
        				'visible' => true]);

       	News::create([	'title' => 'Integer a ultrices',
        				'body_eng' => 'Nam ac imperdiet nulla. Integer a ultrices diam. Aliquam erat volutpat. Nullam dignissim, eros eu porta dapibus, purus sapien tempor nibh, eu pellentesque lorem turpis vel velit. Cras posuere metus vitae purus scelerisque placerat. Pellentesque vitae dolor faucibus, feugiat dui id, commodo justo. Suspendisse condimentum id odio vitae lacinia. Sed urna elit, sagittis at ullamcorper sit amet, elementum nec nisi. Mauris ac volutpat purus. Phasellus vel malesuada diam. Vestibulum nec ex diam.',
        				'sender_team' => 1,
        				'url_youtube' => '_OBlgSz8sSM',
        				'visible' => true]);

       	News::create([	'title' => 'Integer a ultrices',
        				'body_eng' => 'Nam ac imperdiet nulla. Integer a ultrices diam. Aliquam erat volutpat. Nullam dignissim, eros eu porta dapibus, purus sapien tempor nibh, eu pellentesque lorem turpis vel velit. Cras posuere metus vitae purus scelerisque placerat. Pellentesque vitae dolor faucibus, feugiat dui id, commodo justo. Suspendisse condimentum id odio vitae lacinia. Sed urna elit, sagittis at ullamcorper sit amet, elementum nec nisi. Mauris ac volutpat purus. Phasellus vel malesuada diam. Vestibulum nec ex diam.',
        				'sender_team' => 1,
        				'url_youtube' => '4yu8r_wC0JQ',
        				'visible' => true]);

       	/* TAGS */
       	DB::table('tags')->delete();

		Tag::create([ 'name' => 'Belgium',
					  'team' => 1 ]);
		Tag::create([ 'name' => 'Australia',
					  'team' => 2 ]);
		Tag::create([ 'name' => 'Russia',
					  'team' => 3 ]);
		Tag::create([ 'name' => 'Brasil',
					  'team' => 4 ]);
		Tag::create([ 'name' => 'Netherlands',
					  'team' => 5 ]);
		Tag::create([ 'name' => 'Czech Republic',
					  'team' => 6 ]);
		Tag::create([ 'name' => 'Germany',
					  'team' => 7 ]);
		Tag::create([ 'name' => 'Hungary',
					  'team' => 8 ]);
		Tag::create([ 'name' => 'Chinese Tapei',
					  'team' => 9 ]);
		Tag::create([ 'name' => 'Catalonia',
					  'team' => 10 ]);
		Tag::create([ 'name' => 'Hong Kong',
					  'team' => 11 ]);
		Tag::create([ 'name' => 'Poland',
					  'team' => 12 ]);
		Tag::create([ 'name' => 'Portugal',
					  'team' => 13 ]);
		Tag::create([ 'name' => 'England',
					  'team' => 14 ]);
		Tag::create([ 'name' => 'China',
					  'team' => 15 ]);
		Tag::create([ 'name' => 'South Afrika',
					  'team' => 16 ]);

		Tag::create([ 'name' => 'frontpage']);
		Tag::create([ 'name' => 'game']);
		Tag::create([ 'name' => 'competition']);	

		/* MESSAGES */
		DB::table('messages')->delete();



		/* EVENTS */
		DB::table('events')->delete();
		
		Events::create([
			'subject' => 'Our Belgium First Event',
			'sender_role' => 2,
			'sender_team' => 2,
			'date_start' => '2015-06-20 12:34:00',
			'date_end' => '2015-06-20 12:34:00',
			'tournament' => true,
			'team_a' => 8,
			'team_b' => 12,
			'location_id' => 1
		]);

		/* ALBUMS */
		DB::table('albums')->delete();
		
		Album::create([
			'name'=>'test',
			'thumb' => 1
		]);
		/* MEDIA */
		DB::table('media')->delete();
		
		Media::create([
			'description' => 'sample',
			'url_image' => '/img/sample.jpg'
		]);
		/* HIGHSCORE */
		DB::table('highscores')->delete();

		DB::table('locations')->delete();

		Location::create([
			'name' => 'Sports Hall Bourgoyen',
			'lat' => '51.066929',
			'long' => '3.680685',
			'number' =>  '30',
			'street' => 'Driepikkelstraat',
			'city' => '9030 Mariakerke',
			'url_image' => '/img/sample.jpg',
			'public' => true
		]);
		
		Location::create([
			'name' => 'Sports Hall Bourgoyen',
			'lat' => '51.066929',
			'long' => '3.680685',
			'number' =>  '30',
			'street' => 'Driepikkelstraat',
			'city' => '9030 Mariakerke',
			'url_image' => '/img/sample.jpg',
			'public' => true
		]);
		
		Location::create([
			'name' => 'Sports Hall Bourgoyen',
			'lat' => '51.066929',
			'long' => '3.680685',
			'number' =>  '30',
			'street' => 'Driepikkelstraat',
			'city' => '9030 Mariakerke',
			'url_image' => '/img/sample.jpg',
			'public' => true
		]);
		
		Location::create([
			'name' => 'Sports Hall Bourgoyen',
			'lat' => '51.066929',
			'long' => '3.680685',
			'number' =>  '30',
			'street' => 'Driepikkelstraat',
			'city' => '9030 Mariakerke',
			'url_image' => '/img/sample.jpg',
			'public' => true
		]);
		
		Location::create([
			'name' => 'Sports Hall Bourgoyen',
			'lat' => '51.066929',
			'long' => '3.680685',
			'number' =>  '30',
			'street' => 'Driepikkelstraat',
			'city' => '9030 Mariakerke',
			'url_image' => '/img/sample.jpg',
			'public' => true
		]);

		/* ENABLE FOREIGN KEYS AFTER SEED */
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
