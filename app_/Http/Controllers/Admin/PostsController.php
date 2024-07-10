<?php

namespace App\Http\Controllers\Admin;

// use App\Entities\Category;
// use App\Entities\Content;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Post;
use App\Utils\Helpers;
use Carbon\Carbon;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Storage;
use Auth;

class PostsController extends Controller {

	// protected $current_user;
	// protected $validator1;
	// // protected $NewsPublished = Post::where('status',1)->where('published',1);

	// public function __construct()
	// {
	// 	$this->current_user = Auth::user();
	// 	$this->validator1 = Validator::make(Input::only('title','title_cover', 'content','category_id'), Post::$rules);
	// 	// Post::where('status',1)->where('published',1)  = Post::where('status',1)->where('published',1);
	// }

	public function get_index()
	{
        $user = Auth::user();

        $permissions = DB::table('permission_user')
            ->where('user_id', $user->id)
            ->join('permissions', 'permission_user.permission_id', '=', 'permissions.id')
            ->select(['permissions.slug'])
            ->where('permissions.slug', 'ver-noticias')
            ->get()
            ->toArray();

        if (!count($permissions)) {
            return redirect('/admin/dashboard');
        }


		return View::make('admin.posts.datatable');
	}

	// public  function get_index_destinos(){

	// 	return View::make('admin.posts.destinos-datatable');
	// }

	public function get_datatable(Request $request)
	{
		$role_id = $request->role_id;

		$result = DB::table('info_informacion')
			->select('info_informacion.in_id_informacion as id', 'info_informacion.vc_titulo_informacion as title',
							'info_informacion.vc_resumen_informacion as summary',
							'info_informacion.fecha_en as date',
							'info_informacion.foto as photo',
							'published')
			->where('info_informacion.deleted_at', NULL)
			->orderBy('info_informacion.in_id_informacion','DESC');

		// if ($request->category_id) {
		// 	$result = $result->where('info_informacion.categoria', $categoryId);
		// }

		return DataTables::of($result)
		->escapeColumns('Image', 'Actions')
		->addColumn('Image', function($model)
		{
			return Date::parse($model->date)->format('d\/F\/Y');
			// return $this->getOneImage($model->id,3,1);
		})
		->addColumn('Actions', function($model) use ($role_id)
        {	

        	if ($role_id == 3) {
				return "
							<button class='btn btn-primary btn-sm solsoShowModal' data-toggle='tooltip' title='Editar' value=$model->id OnClick='Editar(this);'>
							<i class='fa fa-edit'></i>
							</button>";
        	}


			return "
					<button class='btn btn-primary btn-sm solsoShowModal' data-toggle='tooltip' title='Editar' value=$model->id OnClick='Editar(this);'>
					<i class='fa fa-edit'></i>
					</button>

					<button class='btn btn-danger btn-sm solsoConfirm' data-toggle='modal' data-title='$model->title' title='Eliminar' value=$model->id OnClick='Eliminar(this);'>
					  <i class='fa fa-trash'></i>
					</button>";

        })->make();
	}

	public function store(CreatePostRequest $request)
	{
		$data = $request->all();
		$post = new Post();
		$post->fill($data);
		$post->slug = str_slug($data['vc_titulo_informacion']);
		$post->foto1 = "";
		$post->foto1_path = "";
		$post->foto2 = "";
		$post->foto2_path = "";
		$post->foto3 = "";
		$post->foto3_path = "";
		$post->foto4 = "";
		$post->foto4_path = "";

		$post->categoria = "por hacer";

		$post->foto = "";
		$post->foto_path = "";


		$post->tipo = 1;
		$post->autor = "por hacer";

		if (!$request->video) {
			$post->video = "";
		}

		$now = Carbon::now();

		if ($request->fecha) {
			$post->fecha = $request->fecha;
			$post->fecha_en = Carbon::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
		} else {
			$post->fecha = $now->format('d/m/Y');
			$post->fecha_en = $now->format('Y-m-d');
		}

		//$post->fecha = $now->format('Y-m-d');
		$post->dia = $now->format('d');
		$post->mes = $now->format('m');
		$post->ano = $now->format('Y');

		//$post->slug = "-";
		
		if ($request->hasFile('foto')) {
			$img = $request->file('foto');

			$filename = time().'00a.'.str_slug($img->getClientOriginalExtension());
			$img->move(public_path(). "/img/news/", $filename);
			$post->foto = "/img/news/".$filename;
		}

        // if ($request->hasFile('foto')) {
        //     $file1 = $request->file('foto');

        //     $file_name = $file1->getClientOriginalName().time();

        //     Storage::disk('google')->put($file_name, fopen($file1, 'r+'));
        //     $url = Storage::disk('google')->url($file_name);
        //     $post->foto = $url;
        // }

		if ($request->hasFile('foto1')) {
			$img = $request->file('foto1');

			$filename = time().'11b.'.str_slug($img->getClientOriginalExtension());
			$img->move(public_path(). "/img/news/", $filename);
			$post->foto1 = "/img/news/".$filename;
		}		

        // if ($request->hasFile('foto1')) {
        //     $file1 = $request->file('foto1');

        //     $file_name = $file1->getClientOriginalName().time();

        //     Storage::disk('google')->put($file_name, fopen($file1, 'r+'));
        //     $url = Storage::disk('google')->url($file_name);
        //     $post->foto1 = $url;
        // }

		if ($request->hasFile('foto2')) {
			$img = $request->file('foto2');

			$filename = time().'22c.'.str_slug($img->getClientOriginalExtension());
			$img->move(public_path(). "/img/news/", $filename);
			$post->foto2 = "/img/news/".$filename;
		}

        // if ($request->hasFile('foto2')) {
        //     $file1 = $request->file('foto2');

        //     $file_name = $file1->getClientOriginalName().time();

        //     Storage::disk('google')->put($file_name, fopen($file1, 'r+'));
        //     $url = Storage::disk('google')->url($file_name);
        //     $post->foto2 = $url;
        // }


		$post->save();

		return;
	}

	 public function show($id)
	 {
	 	$post = DB::table('info_informacion')->where('in_id_informacion', $id)->first();
		return response()->json($post);	
	 }

 public function update($id, CreatePostRequest $request)
 {
 	$data = $request->all();
 	$post = Post::find($id);
 	
 	$post->fill($data);
 	$post->slug = str_slug($data['vc_titulo_informacion']);

	if ($request->hasFile('foto')) {
		$img = $request->file('foto');

		if(file_exists($post->foto)){
			unlink($post->foto);
		}

		$filename = time().'00a.'.str_slug($img->getClientOriginalExtension());
		$img->move(public_path(). "/img/news", $filename);

		$post->foto = "/img/news/".$filename;
	}
    // if ($request->hasFile('foto')) {
    //     $file1 = $request->file('foto');

    //     if($post->foto)
    //     {
    //         $val = explode('id=', $post->foto); 
    //         $val = $val[1];
    //         $val = explode('&', $val); 
    //         $val = $val[0];
    //         Storage::disk('google')->delete($val);
    //     }

    //     $file_name = $file1->getClientOriginalName().time();

    //     Storage::disk('google')->put($file_name, fopen($file1, 'r+'));
    //     $url = Storage::disk('google')->url($file_name);
    //     $post->foto = $url;
    // }

	if ($request->hasFile('foto1')) {
		$img = $request->file('foto1');

		if(file_exists($post->foto1)){
			unlink($post->foto1);
		}

		$filename = time().'11b.'.str_slug($img->getClientOriginalExtension());
		$img->move(public_path(). "/img/news", $filename);
		$post->foto1 = "/img/news/".$filename;
	}
    // if ($request->hasFile('foto1')) {
    //     $file1 = $request->file('foto1');

    //     if($post->foto1)
    //     {
    //         $val = explode('id=', $post->foto1); 
    //         $val = $val[1];
    //         $val = explode('&', $val); 
    //         $val = $val[0];
    //         Storage::disk('google')->delete($val);
    //     }

    //     $file_name = $file1->getClientOriginalName().time();

    //     Storage::disk('google')->put($file_name, fopen($file1, 'r+'));
    //     $url = Storage::disk('google')->url($file_name);
    //     $post->foto1 = $url;
    // }

	if ($request->hasFile('foto2')) {
		$img = $request->file('foto2');

		if(file_exists($post->foto2)){
			unlink($post->foto2);
		}

		$filename = time().'22c.'.str_slug($img->getClientOriginalExtension());
		$img->move(public_path(). "/img/news", $filename);
		$post->foto2= "/img/news/".$filename;
	}
    // if ($request->hasFile('foto2')) {
    //     $file1 = $request->file('foto2');

    //     if($post->foto2)
    //     {
    //         $val = explode('id=', $post->foto2); 
    //         $val = $val[1];
    //         $val = explode('&', $val); 
    //         $val = $val[0];
    //         Storage::disk('google')->delete($val);
    //     }

    //     $file_name = $file1->getClientOriginalName().time();

    //     Storage::disk('google')->put($file_name, fopen($file1, 'r+'));
    //     $url = Storage::disk('google')->url($file_name);
    //     $post->foto2 = $url;
    // }


	if (!$request->video) {
		$post->video = "";
	}

	$now = Carbon::now();

	if ($request->fecha) {
		$post->fecha = $request->fecha;
		$post->fecha_en = Carbon::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
	} else {
		$post->fecha = $now->format('d/m/Y');
		$post->fecha_en = $now->format('Y-m-d');
	}

	// $post->fecha = $request->fecha;
	// $post->fecha_en = Carbon::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');

	$post->save();
	return;
}

	// public function put_elimina_imgslide()
	// {
	// 	$id = Input::get('id');
	// 	$content = Content::find($id);
	// 	$content->status = 0;
	// 	Helpers::borrar_imagen($content->resource_path, $content->resource,$content->resource_thumb,$content->resource_thumb_path);
	// 	$content->save();
	// 	return "Foto eliminada";
	// }
	
	public function delete($id)
	{
		$post = Post::find($id);
		
		if (file_exists($post->foto)) {
			unlink($post->foto);
		}

		if (file_exists($post->foto1)) {
			unlink($post->foto1);
		}

		if (file_exists($post->foto2)) {
			unlink($post->foto2);
		}

		$post->delete();
		return;
	}

	// public function updatePublish($id)
	// {
	// 	$post = Post::find($id);
	// 	$post->published = true;
	// 	$post->save();
	// 	return;
	// }

	// public  function updateNotPublish($id)
	// {
	// 	$post = Post::find($id);
	// 	$post->main = false;
	// 	$post->published = false;
	// 	$post->save();
	// 	return;
	// }

	// public function putCover($id)
	// {
	// 	$oldNewsCover = Post::where('status', 1)->where('published', 1)->where('main', 1)->get();

	// 	foreach ($oldNewsCover as $key => $post) {
	// 		$post->main = 0;
	// 		$post->save();
	// 	}

	// 	$post = Post::find($id);
	// 	$post->main = 1;
	// 	$post->save();

	// 	return;
 //  }

 //  public function storeImage(Request $request){

	// 	$img  = $request->file[0];

 //  		$dropbox_process = Helpers::subir_cortar($img, "no","no", "no", "no", 'posts/images', 950, 450);

	// 	$content  = new Content();
	// 	$content->content = "Img post";
	// 	$content->resource = $dropbox_process->normal_url;
	// 	$content->resource_path = $dropbox_process->normal_path;
	// 	$content->resource_thumb = $dropbox_process->thumb_url;
	// 	$content->resource_thumb_path = $dropbox_process->thumb_path;
	// 	$content->model_id = 0;
	// 	$content->model_type = 3;
	// 	$content->type = 1;
	// 	$content->status = 1;
	// 	$content->save();

	// 	return $content;
 //  }

	// //Ruta api
	// public function getNews(){
	// 	  $currentLanguage = Session::get('lang','es');

	// 	  $searchIdLanguage = Translation::where('name','=',$languageName)->where('status','=',1)->where('published','=',1)->first();
	// 	  $idLang = $searchIdLanguage->id;

	// 	  $data = array();

	// 	  $posts = DB::table('posts')
	// 			  ->select('posts.id as postId','posts.title as postTitle','posts.slug as postSlug','posts.content as postContent',
	// 					  'posts.created_at as postCreatedAt','users.first_name as userFirstName','users.last_name as userLastName',
	// 					  'posts.reference_id as postReferenceId')
	// 			  ->join('users','users.id','=','posts.user_id')
	// 			  ->where('posts.status',1)
	// 			  ->where('posts.published',1)
	// 			  ->where('posts.translation_id',$idLang)
	// 			  ->orderBy('postId','DESC')
	// 			  ->get();

	// 	  foreach ($posts as $key => $post) {
	// 			  $data['id'] = $post->postId;
	// 			  $data['title'] = $post->postTitle;
	// 			  $data['slug'] = $post->postSlug;
	// 			  $data['imageUrl'] = $this->getOneImage($post->postReferenceId,3,1);
	// 			  $data['content'] = $post->postContent;
	// 			  $data['author'] = $post->userFirstName.' '.$post->userLastName;
	// 			  $data['date'] = $this->getDate($post->created_at);
	// 			  $data['hour'] = $this->getDate($post->created_at);
	// 	  }
	// 	  return Response::json($data);
	// }

	// public function getLastNewsFromEachCategory()
	// {
	// 	$categories = Category::where('status',1)->where('published',1)->get();

	// 	$lastNews = [];

	// 	$k = 0;

	// 	$coverNew = Post::where('status',1)->where('published',1)->where('main',1)->first();
	// 	if (count($coverNew)) {
	// 		$lastNews[$k]['slug'] = $coverNew->slug;
	// 		$lastNews[$k]['title'] = $coverNew->title;
	// 		$lastNews[$k]['category'] = $coverNew->category->name;
	// 		$lastNews[$k]['imageUrl'] = $coverNew->cover;
	// 		$lastNews[$k]['imageThumbUrl'] = $coverNew->cover_thumb;
	// 		$k = $k + 1;
	// 	}

	// 	foreach ($categories as $i => $category) {
	// 			$categoryId = $category->id;
	// 			$categoryName = $category->name;
	// 			$lastNew = Post::where('status',1)->where('published',1)->where('category_id',$categoryId)->orderBy('created_at','DESC')->first();
	// 			if (count($lastNew)) {
	// 				$lastNews[$k]['slug'] = $lastNew->slug;
	// 				$lastNews[$k]['title'] = $lastNew->title;
	// 				$lastNews[$k]['category'] = $categoryName;
	// 				$lastNews[$k]['imageUrl'] = $lastNew->cover;
	// 				$lastNews[$k]['imageThumbUrl'] = $lastNew->cover_thumb;
	// 				$k = $k + 1;
	// 			}
	// 		}

	// 	return Response::json(['data'=>$lastNews],200);
	// }

	// public function allNewsThatContainsVideo()
	// {
	// 	$newsThatContainsVideo = Post::where('status', 1)->where('published', 1)
	// 													->where('link', '!=', '')
	// 													->orderBy('id', 'DESC')
	// 													->take(4)
	// 													->get();

	// 	foreach ($newsThatContainsVideo as $key => $new) {
	// 			$array_video = explode('=', $new->link);

	// 			$video_id = 'No es una url de youtube...';

	// 			if (isset($array_video[1])) {
	// 				$video_id = $array_video[1];
	// 			}

	// 			$t[] = array(
	// 				'slug' => $new->slug,
	// 				'title' => $new->title,
	// 				'videoId' => $video_id,
	// 			);
	// 	}

	// 	return response()->json(['data' => $t]);
	// }

	// public function getNewsOutstanding()
	// {

	// 	$categories = Category::where('status', 1)->where('published', 1)->where('featured', 1)
	// 								->whereHas('posts_published')
	// 								->get();

	// 	$t = [];

	// 	foreach ($categories as $i =>$category) {

	// 		$posts = Post::where('status', 1)
	// 						->where('published', 1)
	// 						->where('category_id', $category->id)
	// 						->take(4)
	// 						->with('random_photo')
	// 						->get();

	// 		$y  = [];

	// 		foreach ($posts as $u => $new) {
	// 			$y[] = array(
	// 				'slug' => $new->slug,
	// 				'title' => $new->title,
	// 				'imageUrl' => ($new->random_photo != null) ? $new->random_photo->resource : '',
	// 				'imageUrlThumb' => ($new->random_photo != null) ? $new->random_photo->resource_thumb : '',
	// 			);
	// 		}

	// 		$t[] = array(
	// 			'name' => $category->name,
	// 			'posts' => $y,
	// 		);
	// 	}

	// 	return response()->json(['data' => $t]);
	// }

	// //version anterior
	// public function getLastNewsFromEachCategoryAndAOneCoverNews()
	// {
	// 	$categories = Category::where('status',1)->where('published',1)->get();

	// 	$lastNews = [];

	// 	$k = 0;

	// 	foreach ($categories as $i => $category) {
	// 		$categoryId = $category->id;
	// 		$categoryName = $category->name;
	// 		$lastNew = Post::where('status',1)->where('published',1)->where('category_id',$categoryId)->orderBy('created_at','DESC')->first();

	// 		if (count($lastNew)) {
	// 			$lastNews[$k]['slug'] = $lastNew->slug;
	// 			$lastNews[$k]['title'] = $lastNew->title;
	// 			$lastNews[$k]['category'] = $categoryName;
	// 			$lastNews[$k]['imageUrl'] = $this->getOneThumbImage($lastNew->id,3,1);
	// 			$k = $k + 1;
	// 		}
	// 	}
	// 	$coverNews = [];
	// 	$coverNew = Post::where('status',1)->where('published',1)->where('main',1)->first();
	// 	if ($coverNew) {
	// 		$coverNews = new stdClass;
	// 		$coverNews->slug = $coverNew->slug;
	// 		$coverNews->title = $coverNew->title;
	// 		$coverNews->imageUrl = $this->getImage($coverNew->id,3,1)->resource;
	// 		$coverNews->imageThumbUrl = $this->getImage($coverNew->id,3,1)->resource_thumb;
	// 		$coverNews->happened = $this->howLongAgo($coverNew->created_at);
	// 	}
	// 	return Response::json(['lastPosts'=>$lastNews,'coverPost'=>$coverNews],200);
	// }

	// public function getAllNews()
	// {
	// 	$posts = Post::where('status', 1)->where('published', 1)->with('category')->take(10)->orderBy('id', 'DESC')->get();
	// 	$t = [];

	// 	foreach ($posts as $key => $post) {

	// 		$content_without_html = strip_tags($post->content);

	// 		$t[] = array(
	// 			'slug' => $post->slug,
	// 			'title' => $post->title,
	// 			'content' => mb_substr($content_without_html, 0, 100, "UTF-8").'...',
	// 			'category' => $post->category->name,
	// 			'categoryId' => $post->category->id,
	// 			'date' => explode(" ",$post->created_at)[0],
	// 			'dateFull' => $post->created_at,
	// 			'imageUrlThumb' => $this->getImage($post->id,3,1)->resource_thumb,
	// 			'happened' => $this->howLongAgo($post->created_at),
	// 			'imageUrl' => $this->getImage($post->id,3,1)->resource,
	// 			);
	// 	}
	// 	return response()->json(['data' => $t]);

	// }

	// public function getNewsBySlug($slug)
	// {
	// 	$thisNews = Post::where('slug',$slug)->first();
	// 	$currentNewsId = $thisNews->id;
	// 	$currentNews = new stdClass;
	// 	$currentNews->slug = $thisNews->slug;
	// 	$currentNews->title = $thisNews->title;
	// 	$currentNews->subTitle = $thisNews->title_cover;
	// 	$currentNews->content = $thisNews->content;
	// 	$currentNews->contenteWithOutHtml = strip_tags($thisNews->content);
	// 	$currentNews->category = $this->getCategoryById($thisNews->category_id);
	// 	$currentNews->date = $thisNews->created_at->format('Y-m-d');
	// 	$currentNews->hora = $thisNews->created_at->format('H:i');
	// 	$currentNews->happened =  $this->howLongAgo($thisNews->created_at);
	// 	$currentNews->videoUrl = "";
	// 	if ($thisNews->link !== "") {
	// 		$url = explode('=',$thisNews->link);

	// 		$currentNews->videoUrl = '';
	// 		if (count($url) > 1) {
	// 			$currentNews->videoUrl = $url[1];
	// 		}
	// 	}

	// 	$currentNews->imagesUrl = $this->getArrayImages($thisNews->id,3);

	// 	return Response::json(['data'=>$currentNews],200);
	// }

	// public function getNewsBySlugOld($slug)
	// {
	// 	$thisNews = Post::where('slug',$slug)->first();
	// 	$currentNewsId = $thisNews->id;
	// 	$currentNews = new stdClass;
	// 	$currentNews->slug = $thisNews->slug;
	// 	$currentNews->title = $thisNews->title;
	// 	$currentNews->subTitle = $thisNews->title_cover;
	// 	$currentNews->content = $thisNews->content;
	// 	$currentNews->contenteWithOutHtml = strip_tags($thisNews->content);
	// 	$currentNews->category = $this->getCategoryById($thisNews->category_id);
	// 	$currentNews->date = $thisNews->created_at->format('Y-m-d');
	// 	$currentNews->hora = $thisNews->created_at->format('H:i');
	// 	$currentNews->happened =  $this->howLongAgo($thisNews->created_at);
	// 	$currentNews->videoUrl = "";
	// 	if ($thisNews->link !== "") {
	// 		$url = explode('=',$thisNews->link);

	// 		$currentNews->videoUrl = '';
	// 		if (count($url) > 1) {
	// 			$currentNews->videoUrl = $url[1];
	// 		}
	// 	}

	// 	$currentNews->imagesUrl = $this->getArrayImages($thisNews->id,3);

	// 	// Siguiente post
	// 	$newsNext = new stdClass();
	// 	$idNext = $currentNewsId + 1;
	// 	$i = 0;

	// 	$numberOfPosts = count(Post::where('status',1)->where('published',1)->get());
	// 	$k = 0;

	// 	$news = [];
	// 	while ($i == 0 && $k<=$numberOfPosts ) {

	// 		$news = Post::where('status',1)->where('published',1)->where('id',$idNext)->first();
	// 		if (count($news)) {
	// 			$i = 1;
	// 		}
	// 		$idNext = $idNext + 1;
	// 		$k = $k + 1;
	// 	}
	// 	if (count($news)) {
	// 		$newsNext->slug = $news->slug;
	// 		$newsNext->title = $news->title;
	// 		$newsNext->category = $this->getCategoryById($news->category_id);
	// 		$newsNext->imageUrl = $this->getOneImage($news->id,3,1);
	// 	}

	// 	// Anterior post
	// 	$news = [];
	// 	$newsPrev = new stdClass();
	// 	$idPrev = $currentNewsId - 1;
	// 	while ($idPrev != 0) {
	// 		$news =  Post::where('status',1)->where('published',1)->where('id',$idPrev)->first();
	// 		if (count($news)) {
	// 			$idPrev = 0;
	// 		}
	// 		else {
	// 			$idPrev = $idPrev - 1;
	// 		}
	// 	}

	// 	if (count($news)) {
	// 		$newsPrev->slug =$news->slug;
	// 		$newsPrev->title = $news->title;
	// 		$newsPrev->category = $this->getCategoryById($news->category_id);
	// 		$newsPrev->imageUrl = $this->getOneImage($news->id,3,1);
	// 	}
	// 	return Response::json(['post'=>$currentNews,'nextPost'=>$newsNext,'prevPost'=>$newsPrev],200);
	// }

	// public function getCategoryById($categoryId)
	// {
	// 	$categoryName = Category::where('id',$categoryId)->first()->name;
	// 	return $categoryName;
	// }

	// public function searchNews(Request $request)
	// {
	// 	$text = $request->q;
	// 	$date = $request->date;
	// 	$category_slug = $request->category_slug;
	// 	$category = Category::where('slug', $category_slug)->first();


	// 	$dateToday = Carbon::now();

	// 	switch ($date) {
	// 		case 'all':
	// 			$days = 0;
	// 			break;
	// 		case 'day':
	// 			$days = 1;
	// 			break;
	// 		case 'week':
	// 			$days = 7;
	// 			break;
	// 		case 'month':
	// 			$days = 30;
	// 			break;
	// 		case 'year':
	// 			$days = 365;
	// 			break;
	// 	}

	// 	$dateInitial = $dateToday->subDays($days)->format('Y-m-d');

	// 	$posts = Post::where('published', 1)->where('status', 1)->orderBy('id', 'DESC');

	// 	if ($days != 0) {
	// 		$posts = $posts->whereDate('created_at', '>=', $dateInitial);
	// 	}

	// 	if (count($category)) {
	// 		$posts = $posts->where('category_id', $category->id);
	// 	}

	// 	$posts = $posts->with('random_photo')->with('category')->where('title', 'like', "%$text%")->orWhere('content', 'like', "%$text%")->where('published', 1)->where('status', 1)->orderBy('id', 'DESC')->with('random_photo')->with('category');

	// 	if ($days != 0) {
	// 		$posts = $posts->whereDate('created_at', '>=', $dateInitial);
	// 	}

	// 	if (count($category)) {
	// 		$posts = $posts->where('category_id', $category->id);
	// 	}

	// 	$posts = $posts->paginate(10);

	// 	$posts = $posts->toArray();

	// 	$t = [];

	// 	foreach ($posts['data'] as $key => $post) {
	// 		$content_without_html = strip_tags($post['content']);

	// 		$t[] = array(
	// 			'slug' => $post['slug'],
	// 			'title' => $post['title'],
	// 			'content' => mb_substr($content_without_html, 0, 100, "UTF-8").'...',
	// 			'happened' => $this->howLongAgo($post['created_at']),
	// 			'imageUrl' => ($post['random_photo'] != null) ? $post['random_photo']['resource_thumb'] : '',
	// 			'date' => Carbon::parse($post['created_at'])->format('Y-m-d'),
	// 			'category' => $post['category']['name'],
	// 			'categoryId' => $post['category']['id'],
	// 			);
	// 	}

	// 	$posts['data'] = $t;
	// 	return response()->json($posts, 200);
	// }

	// public function getRelatedBySlug($slug)
	// {
	// 	$post = Post::whereSlug($slug)->first();

	// 	$posts = Post::where('slug', '!=', $slug)->where('category_id', $post->category_id)->orderBy('id', 'DESCS')->with('category')->with('random_photo')->where('status', 1)->where('published', 1)->take(10)->get();

	// 	$t = [];

	// 	foreach ($posts as $key => $post) {
	// 		$t[] = array(
	// 			'slug' => $post->slug,
	// 			'title' => $post->title,
	// 			'imageUrl' => ($post->random_photo != null) ? $post->random_photo->resource : '',
	// 			'imageUrlThumb' => ($post->random_photo != null) ? $post->random_photo->resource_thumb : '',
	// 			'happened' => $this->howLongAgo($post->created_at),
	// 			'category' => $post->category->name,
	// 			);
	// 	}

	// 	return response()->json(['data' => $t], 200);

	// }
}
