<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Validator;
use Auth;
use App\News;

class NewsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$user = Auth::user();
		$newsList = $user->news()->orderBy('updated_at', 'DESC')->paginate(10);

		return view('admin.news.index', compact('newsList'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$news = new News;

		return view('admin.news.create', compact('news'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// TODO: image upload
		$validator = Validator::make($request->all(),
		[
			'title'			=> 'required|string|max:255',
			'excerpt'		=> 'required|string|max:255',
			'description'	=> 'required|string|max:65000',
			'featured_image'=> 'nullable|mimes:jpeg,jpg,bmp,png|max:10240',
		]);

		if($validator->fails())
		{
			return redirect()
						->back()
						->withErrors($validator)
						->withInput();
		}

		$news = new News;

		$news->title 		= $request->title;
		$news->excerpt		= $request->excerpt;
		$news->description 	= $request->description;
		$news->user_id	 	= Auth::user()->id;

		if ($request->featured_image) 
		{
		    $news->featured_image = $request->featured_image;
		} else {
		    $news->featured_image = '';
		}

		if ($news->save()) 
		{
			return redirect(route('news.index'))->with('success', 'News successfully added!');
		}

		return redirect()->back()->withInput()->with('error', 'Error while adding news!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$news = News::where('id', $id)->first();

		if(!$news)
		{
			return redirect()->back()->withErrors('News not found');
		}

		return view('admin.news.show', compact('news'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$news = News::where('id', $id)->first();

		if(!$news)
		{
			return redirect()->back()->withErrors('News not found');
		}

		return view('admin.news.edit', compact('news'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// TODO: image upload
		$validator = Validator::make($request->all(),
		[
			'title'			=> 'required|string|max:255',
			'excerpt'		=> 'required|string|max:255',
			'description'	=> 'required|string|max:65000',
			'featured_image'=> 'nullable|mimes:jpeg,jpg,bmp,png|max:10240',
		]);

		if($validator->fails())
		{
			return redirect()
						->back()
						->withErrors($validator)
						->withInput();
		}

		$news = News::where('id', $id)->first();

		$news->title 		= $request->title;
		$news->excerpt		= $request->excerpt;
		$news->description 	= $request->description;
		
		if ($request->featured_image) 
		{
		    $news->featured_image = $request->featured_image;
		} else {
		    $news->featured_image = '';
		}

		if ($news->save()) 
		{
			return redirect(route('news.index'))->with('success', 'News successfully added!');
		}

		return redirect()->back()->withInput()->with('error', 'Error while adding news!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getNews()
	{
		$newsList = News::paginate(10);

		return response()->json(['data' => $newsList], 200);
	}
}
