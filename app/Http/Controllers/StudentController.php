<?php

namespace App\Http\Controllers;

use App\Guardian;
use App\Level;
use App\Promotion;
use App\Student;
use App\YearGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Level::all();
        $levels = Level::pluck('name','id');
        $guardians = Guardian::all();
        $students=Student::orderBy('regNumber','desc')->get();
        return view('students.show',compact('students', 'classes', 'guardians', 'levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentSession = (new YearGroup)->getCurrentSession();
        $promotions = (new YearGroup)->find($currentSession)->promotions;
        $students = Student::where('is_active', '=', '1')->get();
        $levels = Level::all();
        $sesions = YearGroup::all();
        $names = Level::pluck('name', 'id');
        $tags = Level::pluck('tag', 'id');
        return view('students.classStudents', compact('students','currentSession', 'levels','classes', 'promotions', 'names', 'tags', 'sesions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $formInput=$request->except('image');

        //validate
        $this->validate($request,[
            'regNumber'=>'required',
            'surname'=>'required',
            'othernames'=>'required',
            "sex"=>"required|boolean",
            "dateOfBirth"=>"required",
            "phone"=>"required",
            "lastSchool"=>"required",
            "admissionDate"=>"required",
            "level_id"=>"required|integer",
            "guardian_id"=>"required",
            "address"=>"required",
            'image' => 'image|mimes:png,jpg,jpeg|max:10000'
        ]);
        
        //image upload
        $image=$request->image;
        if ($image){
            $imageName=str_replace('/', '',  $request['regNumber']);
            $image->move('assets/images/students',$imageName);
            $formInput['image']=$imageName;
            $formInput['is_active']=true;
        }
       
        //store
        $student = Student::create($formInput);


        //'student_id','year_group_id','level_id', 'user_id', 'remark'
        $promotions['student_id'] = $student->id;
        $promotions['year_group_id'] = (new YearGroup)->getCurrentSession();
        $promotions['level_id'] = $student->level_id;
        $promotions['user_id'] = Auth::user()->id;

        Promotion::create($promotions);
       
        //redirect
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        $promotions = (new Student)->find($id)->promotions;
        $sesions = YearGroup::pluck('name', 'id');
        $levels = (new Level)->getLevels();
        $guardians = Guardian::pluck('surname', 'id');
        return view('students.single', compact('student', 'promotions', 'sesions', 'levels', 'guardians'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $student = Student::findOrFail($student->id);
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        // return $request->all();
        // $student = Student::findOrFail($student);

        $formInput=$request->except('image');

        //validate
        // $this->validate($request,[
        //     'regNumber'=>'required',
        //     'surname'=>'required',
        //     'othernames'=>'required',
        //     "sex"=>"required",
        //     "dateOfBirth"=>"required",
        //     "phone"=>"required",
        //     "lastSchool"=>"required",
        //     "admissionDate"=>"required",
        //     "class_id"=>"required",
        //     "guardianName"=>"required",
        //     "guardianPhone"=>"required",
        //     "relationship"=>"required",
        //     "state"=>"required",
        //     "lga"=>"required",
        //     "address"=>"required",
        //     'image' => 'image|mimes:png,jpg,jpeg|max:10000'
        // ]);
        //store

        //image upload
        $image=$request->image;
        if ($image){
            $imageName=str_replace('/', '',  $request['regNumber']);
            $image->move('assets/images/students', $imageName);
            $formInput['image']=$imageName;
        }

        //store
        $student->update($formInput);

        //redirect
        return response()->json('Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        // $student = Student::findOrFail($student);
        $student->delete();
        return response()->json('Record deleted successfully');
    }

    public function importStudents()
    {
        return view('students.import');
    }

    public function uploadStudents(Request $request)
    {
        // return $request->all();
        //get file
        $upload = $request->file('file');
        $filePath = $upload->getRealPath();

        //open and read
        $file = fopen($filePath, 'r');
        $header = fgetcsv($file);

        // dd($header);

        $escapedHeader = [];
        //validate
        foreach ($header as $key => $value) {
            $lheader = $value;
            $escapedItem = preg_replace('/[^a-z]_/', '', $lheader);
            // $escapedItem = $lheader;
            array_push($escapedHeader, $escapedItem);
        }

            // dd($escapedHeader);

        //looping through other cclumns
        while ($columns = fgetcsv($file)) {
            if ($columns[0] == "") {

                continue;
            }
            //trim data
            foreach ($columns as $key => &$value) {
                // $value = preg_replace('/\D/', '', $value);
                $value=$value;
            }

            $data = array_combine($escapedHeader, $columns);

            //setting type
            foreach ($data as $key => &$value) {
                $value = ($key == "dateOfBirth" || $key == "admissionDate") ? $value : $value;
            }

            //Table update
            $regNumber=$data['regNumber'];
            $surname=$data['surname'];
            $othernames=$data['othernames'];
            $sex=$data['sex'];
            $dateOfBirth=$data['dateOfBirth'];
            $phone=$data['phone'];
            $lastSchool=$data['lastSchool'];
            $admissionDate=$data['admissionDate'];
            $level_id=$data['level_id'];
            $address=$data['address'];
            $image=$data['image'];
            $guardian_id=$data['guardian_id'];

            $student = Student::firstOrNew(['regNumber' => $regNumber]);
            $student->regNumber = $regNumber;
            $student->surname = $surname;
            $student->othernames = $othernames;
            $student->sex = $sex;
            $student->dateOfBirth = $dateOfBirth;
            $student->phone = $phone;
            $student->lastSchool = $lastSchool;
            $student->admissionDate = $admissionDate;
            $student->level_id = $level_id;
            $student->guardian_id = $guardian_id;
            $student->address = $address;
            $student->image = $image;
            $student->is_active = true;

            if ($student->save()){
                $promotions['student_id'] = $student->id;
                $promotions['year_group_id'] = (new YearGroup)->getCurrentSession();
                $promotions['level_id'] = $student->level_id;
                $promotions['user_id'] = Auth::user()->id;

                Promotion::create($promotions);
            }

        }
        return back()->withMessage('Students imported successfully');
    }
}
