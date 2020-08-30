<?php

class ArticlesController extends \BaseController {

	/*
	 * Shows a single (specified) article.
	 * @param $id of the article. 
	 * @return view of the specified article.
	*/
	public function show($id) {
		return View::make("articles.show", array("article" => Article::findOrFail($id)));
		
	}

	/*
	 * Renders a list of articles.
	 * @return view of the list.
	*/
	public function index() {

		if (Input::get("tag")) {
			$articles = Tag::where("name", Input::get("tag"))->firstOrFail()->articles;
		} else {
			$articles = Article::take(15)->latest()->get();
		}
		return View::make("articles.index", array("articles" => $articles));
	}

	/*
	 * Shows a view to create a new article.
	 * @return view to create a new article.
	*/
	public function create() {
		/*
		* This is a little test of relationships, I placed it here because I needed
		* to test it fast.
		$user = User::find(8);
		
		return $user->articles;
	
		
		$article = Article::find(8)->author;

		return $article;

		$article = Article::first();

		return $article->tags;
		

		$tag = Tag::find(1);

		return $tag->articles;
		*/
		return View::make("articles.create", array("tags" => Tag::all()));
	}

	/*
	 * Persist the new article.
	 * @return Redirect:
	 * In case of success, to the article list. 
	 * Otherwise, to the article creation form.
	*/
	public function store() {

		$article = new Article();

		$input = array(
			"title" => Input::get("title"),
			"excerpt" => Input::get("excerpt"),
			"body" => Input::get("body"),
			"user_id" => 1 // this is hardcoded for now, it will be changed with authentication
		);

		$validator = $this->validate($input);

		if ($validator->fails()) {
		 	return Redirect::back()->withInput()->withErrors($validator);
		}
		
		$article->fill($input)->save();
		// Article::create($input)

		return Redirect::to("articles");
	}

	/*
	 * Shows a view to edit an existing article.
	 * @param $id of the article.
	 * @return view to edit the selected article.
	*/
	public function edit($id) {
		return View::make("articles.edit", array("article" => Article::findOrFail($id)));
	}

	/*
	 * Persists the edited article.
	*/
	public function update($id) {
		$article = Article::findOrFail($id);

		$input = array(
			"title" => Input::get("title"),
			"excerpt" => Input::get("excerpt"),
			"body" => Input::get("body")
		);

		$validator = $this->validate($input);

		if ($validator->fails()) { 
			return Redirect::route("articles.edit", $article->id)->withInput()->withErrors($validator);
		}

		$article->fill($input)->save();

		return Redirect::route("articles.show", $article->id);
	}

	/*
	 * Delete the resource.
	*/
	public function destroy() {

	}

	protected function validate($input) {
		$rules = array(
			"title" => "required|min:4",
			"excerpt" => "required|min:8",
			"body" => "required|min:12"
		);

		return Validator::make($input, $rules);
	}
}
