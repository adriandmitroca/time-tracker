<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TimeEntry;

use Request;

class TimeEntriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$time = TimeEntry::with('user')->get();

		return $time;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Request::all();

		$timeentry = new TimeEntry();

		$timeentry->fill($data);

		$timeentry->save();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$timeentry = TimeEntry::find($id);

		$data = Request::all();

		$timeentry->fill($data);

		$timeentry->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$timeentry = TimeEntry::find($id);

		$timeentry->delete();
	}

}
