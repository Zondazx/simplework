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
		return View::make("articles.index", array("articles" => Article::latest()->get()));
	}

	/*
	 * Shows a view to create a new article.
	 * @return view to create a new article.
	*/
	public function create() {
		return View::make("articles.create");
	}

	/*
	 * Persist the new article.
	 * @return Redirect:
	 * In case of success, to the article list. 
	 * Otherwise, to the article creation form.
	*/
	public function store() {

		$input = array(
			"title" => Input::get("title"),
			"excerpt" => Input::get("excerpt"),
			"body" => Input::get("body")
		);
		
		$validator = $this->validate($input);

		if ($validator->fails()) {
		 	return Redirect::back()->withInput()->withErrors($validator);
		}

		Article::create($input);
		
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
