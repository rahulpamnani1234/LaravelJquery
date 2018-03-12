<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sex;
use DB;
use Validator;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table('students')->join('sexes','sexes.id','=','students.sex_id')
                    ->selectRaw('sexes.sex,
                          students.first_name,
                          students.last_name,
                          CONCAT(students.first_name," ",students.last_name) AS full_name,
                          students.id')
                    ->get();
        
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert()
    {   

        return view('students.insert',['sexes'=>Sex::all()]);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
        'first_name' => 'required',
        'last_name' => 'required',
        'sex_id' => 'required',
        ]);

        $data = ['first_name'=>$request->first_name,
                 'last_name'=>$request->last_name,
                 'sex_id'=>$request->sex_id];
        DB::table('students')->insert($data);
        return redirect('/students/list');
    }

    public function edit($id)
    {
        $sexes = Sex::all();

        $student = DB::table('students')->where('id',$id)->first();

        return view('students.edit',compact('sexes','student'))->with('id',$id);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = ['first_name'=>$request->first_name,
                 'last_name'=>$request->last_name,
                 'sex_id'=>$request->sex_id];
        DB::table('students')->where('id',$request->id)->update($data);
        return redirect('/students/list');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::table('students')->where('id',$id)->delete();
        return back();
    }
}
