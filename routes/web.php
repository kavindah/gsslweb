<?php
use App\Article;
use App\workshop;
use App\publictalk;
use App\technicalsession;
use App\fieldexcrusion;
use App\annualtrip;
use App\journal;
use App\volume;
use App\undergraduateresearchaward;
use App\anandamedal;
use App\pgmedal;
use App\tissa;
use App\vitanage;
use App\news;
use App\abvolume;
use App\newsletter;
use App\specialpublications;
use App\gsslbook;
use App\slesocom;
use App\iesocom;
use App\MemberReq;
use Illuminate\support\Facades\Route;
use App\calender;
use App\focuses;
use App\journalsubmit;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','PagesController@index');
//Route::resource('/','calendercontroller');
Route::get('/article_published','PagesController@article_published');
Route::get('/members','PagesController@members');
Route::get('/news','PagesController@news');
Route::get('/journal_editorialboard','PagesController@journal_editorialboard');
Route::get('/journal_authorguidlines','PagesController@journal_authorguidlines');
Route::get('/journal_browse','PagesController@journal_browse');
Route::get('/journalgssl','PagesController@journalgssl');
Route::get('/activities','PagesController@activities');
Route::get('/activities_home','PagesController@activities_home');
Route::get('/activities_publictalk','PagesController@activities_publictalk');
Route::get('/activities_technical_session','PagesController@activities_technical_session');
Route::get('/activities_field_excursion','PagesController@activities_field_excursion');
Route::get('/activities_annual_trip','PagesController@activities_annual_trip');
Route::get('/awards','PagesController@awards');  
Route::get('/undergraduate_research_awards','PagesController@undergraduate_research_awards');
Route::get('/ljd_medal','PagesController@ljd_medal');
Route::get('/ananda_coomaraswamy_medal','PagesController@ananda_coomaraswamy_medal');
Route::get('/pg_cooray_medal','PagesController@pg_cooray_medal');
Route::get('/tissa_munasinghe_scholarship','PagesController@tissa_munasighe_scholarship');
Route::get('/pw_vitanage_memorial_scholarship','PagesController@pw_vitanage_memorial_scholarship');
Route::get('/news','PagesController@news');
Route::get('/publications','PagesController@publications');
Route::get('/abstract_volume','abvolumeController@abstract_volume');
Route::get('/news_letters','newsletterController@news_letters');
Route::get('/special_publications','specialpublicationsController@special_publications');
Route::get('/gssl_book','gsslbookController@gssl_book');
Route::get('/sleso','PagesController@sleso');
Route::get('/slesocom','PagesController@slesocom');
Route::get('/iesocom','PagesController@iesocom');
Route::get('/excom','PagesController@excom');
Route::get('/presentexcom','PagesController@presentexcom');
Route::get('/pastexcom','PagesController@pastexcom');
Route::get('/pastpresidents','PagesController@pastpresidents');
Route::get('/lifemembers','PagesController@lifemembers');
Route::get('/journal_submit','PagesController@journal_submit');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('member_request','MemberReqController');

//Route::get('index','MemberReqController@index');
Route::post('store','MemberReqController@store');


Route::get('/home',function(){
	if (Auth::user()->admin==0) {
		return view('home');
	}else{
		$users['users']=\App\User::all();
        $notifications = MemberReq::all()->where('notifications', 1);
//        return view('admin')->with('notifications',$notifications);
		return view('admin',compact('users','notifications'));
	}
});

Route::get('requests',['middleware'=>['auth','admin'],'uses'=>'MemberReqController@index']); //authundicaion and prevent quick access *************************************************************

Route::get('membersRequests','pagesController@membersRequests');

/*if(Auth::check()){
	if(Auth::user()->type=="admin"){

	}
}*/
//****************posts**********************
Route::resource('articles','ArticleController');
Route::get('article_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@articleindex']);

Route::resource('workshop','workshopcontroller');
Route::get('new_workshop_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@activities_workshop']);

Route::resource('publictalks','publictalkcontroller');
Route::get('activities_publictalk_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@activities_publictalk_create']);

Route::resource('technical_sessions','technicalsessoioncontroller');
Route::get('activities_technical_session_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@activities_technical_session_create']);

Route::resource('field_excursion','fieldexcrusioncontroller');
Route::get('activities_field_excursion_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@activities_field_excursion_create']);

Route::resource('annual_trip','annualtripcontroller');
Route::get('activities_annual_trip_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@activities_annual_trip_create']);

Route::resource('journal','journalcontroller');
Route::resource('journal_create','journalcontroller');
Route::get('journal_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@journal_create']);

Route::resource('volume','volumecontroller');
Route::get('volume_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@volume_create']);

Route::resource('undergraduate_research_awards','undergraduateresearchawardcontroller');
Route::get('undergraduate_research_awards_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@undergraduate_research_awards_create']);

Route::resource('ljd_medal','ljdmedalcontroller');
Route::get('ljd_medal_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@ljd_medal_create']);

Route::resource('ananda_coomaraswamy_medal','anandamedalcontroller');
Route::get('ananda_coomaraswamy_medal_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@ananda_coomaraswamy_medal_create']);

Route::resource('pg_cooray_medal','pgcontroller');
Route::get('pg_cooray_medal_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@pg_cooray_medal_create']);

Route::resource('tissa_munasinghe_scholarship','tissamunasinghecontroller');
Route::get('tissa_munasinghe_scholarship_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@tissa_munasinghe_scholarship_create']);

Route::resource('pw_vitanage_memorial_scholarship','pwvitanagecontroller');
Route::get('pw_vitanage_memorial_scholarship_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@pw_vitanage_memorial_scholarship_create']);

Route::resource('news','newscontroller');
Route::get('news_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@news_create']);


Route::resource('abstract_volume','abvolumecontroller');
Route::get('abstract_volume_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@abstract_volume_create']);

Route::resource('abstract_volume/','abstactvolumemorecontroller');
//Route::get('abstract_volume_more_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@abstract_volume_more_create']);

Route::resource('news_letters','newslettercontroller');
Route::get('news_letters_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@news_letters_create']);

Route::resource('special_publications','specialpublicationscontroller');
Route::get('special_publications_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@special_publications_create']);

Route::resource('gssl_book','gsslbookcontroller');
Route::get('gssl_book_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@gssl_book_create']);

Route::resource('slesocom','slesocomcontroller');
Route::get('slesocom_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@slesocom_create']);

Route::resource('iesocom','iesocomcontroller');
Route::get('iesocom_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@iesocom_create']);

Route::resource('calendar_event','calendercontroller');
Route::get('calendar_event_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@calendar_event_create']);

Route::resource('focuses','focusescontroller');
Route::get('focuses_create',['middleware'=>['auth','admin'],'uses'=>'PagesController@focuses_create']);

Route::resource('journal_submit','journalsubmitcontroller');
Route::get('journal_submit',['middleware'=>['auth','web'],'uses'=>'PagesController@journal_submit']);

Route::resource('user_edit','userregistercontroller');
Route::get('user_edit',['middleware'=>['auth','web'],'uses'=>'PagesController@user_edit']);


Route::get('/',function(){
    $articles=Article::orderBy('created_at','desc')->paginate(3);
     $calender=calender::orderBy('created_at','desc')->paginate(3);
     $focuses=focuses::orderBy('created_at','desc')->get();
       return view('index',compact('articles','calender','focuses'));
});

Route::get('/article_published',function(){
	$articles=Article::orderBy('created_at','desc')->paginate(10);
       return view('article_published')->with('articles',$articles);
});


Route::get('/activities',function(){
	$workshop=workshop::orderBy('created_at','desc')->paginate(10);
        return view('activities.index')->with('workshops',$workshop);
});

Route::get('/activities_publictalk',function(){
	$publictalk=publictalk::orderBy('created_at','desc')->paginate(10);
        return view('activities.public_talk.index')->with('publictalks',$publictalk);
});

Route::get('/activities_technical_session',function(){
	$technical_session=technicalsession::orderBy('created_at','desc')->paginate(10);
        return view('activities.technical_session.index')->with('technical_sessions',$technical_session);
});

Route::get('/activities_field_excursion',function(){
	$field_excursion=fieldexcrusion::orderBy('created_at','desc')->paginate(10);
        return view('activities.field_excursion.index')->with('field_excursions',$field_excursion);
});

Route::get('/activities_annual_trip',function(){
	$annual_trips=annualtrip::orderBy('created_at','desc')->paginate(10);
        return view('activities.annual_trip.index')->with('annual_trips',$annual_trips);
});
Route::get('/journal_browse',function(){
  $journals=volume::orderBy('created_at','desc')->paginate(10);
        return view('journal.browse.index')->with('journals',$journals);
});

Route::get('/journal',function(){
  $journals=journal::orderBy('created_at','desc')->paginate(10);
        return view('journal.browse.show')->with('journals',$journals);
});
Route::get('/undergraduate_research_awards',function(){
       $undergraduateresearchaward=undergraduateresearchaward::orderBy('created_at','desc')->paginate(10);
        return view('awards.undergraduate_research_awards.index')->with('undergraduateresearchawards',$undergraduateresearchaward);
});

Route::get('/ananda_coomaraswamy_medal',function(){
 $ananda=anandamedal::orderBy('created_at','desc')->paginate(10);
        return view('awards.ananda_coomaraswamy_medal.index')->with('anandas',$ananda);
});
Route::get('/pg_cooray_medal',function(){
 $pg=pgmedal::orderBy('created_at','desc')->paginate(10);
        return view('awards.pg_cooray_medal.index')->with('pgs',$pg);
});

Route::get('/tissa_munasinghe_scholarship',function(){
 $tissa=tissa::orderBy('created_at','desc')->paginate(10);
        return view('awards.tissa_munasinghe.index')->with('tissas',$tissa);
});

Route::get('/pw_vitanage_memorial_scholarship',function(){
 $vitana=vitanage::orderBy('created_at','desc')->paginate(10);
        return view('awards.pw_vitanage_memorial_scholarship.index')->with('vitanas',$vitana);
});

Route::get('/news',function(){
 $news=news::orderBy('created_at','desc')->paginate(10);
        return view('news.index')->with('newss',$news);
});

Route::get('/abstract_volume',function(){
 $abvolumes=abvolume::orderBy('created_at','desc')->paginate(10);
        return view('publications.abstract_volume.index')->with('abvolumes',$abvolumes);
});

//Route::get('/calendar_event',function(){echo 'sabkjdak';die();
//    $calendar=calender::orderBy('created_at','desc')->paginate(10);
//    return view('calendar.index')->with('calendar',$calendar);
//});

Route::get('/news_letters',function(){
 $news_letters=newsletter::orderBy('created_at','desc')->paginate(10);
        return view('publications.news_letters.index')->with('news_letters',$news_letters);
});

Route::get('/special_publications',function(){
 $special_publications=specialpublications::orderBy('created_at','desc')->paginate(10);
        return view('publications.special_publications.index')->with('special_publications',$special_publications);
});

Route::get('/gssl_book',function(){
   $gsslbook=gsslbook::orderBy('created_at','desc')->paginate(10);
        return view('publications.gssl_book.index')->with('gssl_books',$gsslbook);
});

Route::get('/slesocom',function(){
  $slesocom=slesocom::orderBy('created_at','desc')->paginate(10);
        return view('sleso.slesocom.index')->with('slesocs',$slesocom);
});

Route::get('/iesocom',function(){
  $iesocom=iesocom::orderBy('created_at','desc')->paginate(10);
        return view('sleso.iesocom.index')->with('iesocs',$iesocom);
});

Route::get('/lifemembers',function(){
    $lifemembers=DB::table('member_reqs')->get();
    return view('lifemembers')->with('lifemembers',$lifemembers);
});
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@getReset');
Route::post('password/reset', 'Auth\ResetPasswordController@postReset');


   
