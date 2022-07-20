<?php

namespace App\Http\Controllers;

use App\Student;
use App\Subject;
use App\Family;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
class StudentController extends Controller
{
    public function index(Request $request)
    {
        $item = DB::table('student_subject')->selectRaw('count(*) as count, subject_id')
        ->groupBy('subject_id')
        ->get();
        $students = Student::all();
        $family = Family::all();
        $subjects = Subject::all();
        $allsubjectarray = [];
        foreach ($subjects    as $subject) {
            $allsubjectarray[$subject->id] = $subject->subject;
        }
        // dump($allsubjectarray);
        // $allsubject = implode( ' , ', $allsubjectarray);
        $studentcount = $students->count();
        if ($request->ajax()) {
            // dd('hello');
            // $students = DB::Table('students')->select('id' , 'name' ,'email')->get();
            // dd($students);


            $table =  DataTables::of($students)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    $chk = '<input type="checkbox" class = "chechbox" name="chkbox" value = "' . $row->id . '">';
                    return $chk;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<button class="btn btn-primary myshow"   value="' . $row->id . '" data-toggle="modal" data-target="#editmodal">show</button>';
                    $btn .= '<button class="btn btn-secondary myedit mx-1" value="' . $row->id . '" data-toggle="modal" data-target="#editmodal">edit</button>';
                    $btn .= '<button class="btn btn-danger datadelete" value="' . $row->id . '">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action', 'checkbox'])
                ->make(true);
            return $table;
        }
        // return $studentcount ;
        return view('student.index' , ['studentcount' => $studentcount , 'students' => $students , 'family'=>$family , 'subjects' => $allsubjectarray , 'items'=>$item]);
    }
    public function show($id)
    {
        // $items = DB::table('student_subject')->select('subject_id')->distinct('subject_id')->get(); 
        // $item = DB::table('student_subject')->selectRaw('count(*) as count, subject_id');
        // $item = DB::table('student_subject')->count(DB::raw('DISTINCT subject_id'));
        
        // dd($item);
        $student = Student::find($id);
        $family = Family::find(1);
        // dump($family->student);
        $arraystudnetname = [];

        $studentData = $student->family;
        foreach ($studentData as $students) {
            array_push($arraystudnetname ,  $students->name);
        }

        $subjects = $student->subject;
        $subjectarray = [];
        foreach ($subjects as $subject) {
            array_push($subjectarray , $subject->subject);
        }
        $subjects =  implode( ' , ', $subjectarray);
         
        
        $studentreleted= implode(' , ' , $arraystudnetname);
        $output = '<span class="text">name : ' . $student->name . '</span>
  <span class="text"> <br> Email : ' . $student->email . '</span>
  <span class="text"> <br>Username : ' . $student->username . '</span>
  <span class="text"><br> Phone : ' . $student->phone . '</span>
  <span class="text"><br> DOB : ' . $student->dob . '</span>
  <span class="text"><br> Releted students  : ' . $studentreleted . '</span>
  <span class="text"><br> Releted subjects  : ' . $subjects . '</span>';
        return $output;
    }
    public function destroy($id)
    {
        // dd($id);
        $student =  Student::find($id);
        // dd($student->family);
        $student->family()->delete();
        $student->subject()->detach();
        $response = Student::find($id)->delete();
        return $id;
    }


    public function edit($id)
    {
        $studentData = Student::find($id);
        return $studentData;
    }


    public function update(Request $request, $id)
    {
        dump($request->all());
        $studentData = $request->all();
        $studentDataToUpdate = Student::find($studentData['id']);
        dump($studentData['reletedfmailyid']);
        dump($studentData['reletedsubject']);

        $familytorelate = Family::find($studentData['reletedfmailyid']);
        $subjecttorelate = Subject::find($studentData['reletedsubject']);
        $studentDataToUpdate->fill($studentData)->save();
        $studentDataToUpdate->family()->save($familytorelate);
        $studentDataToUpdate->subject()->attach($subjecttorelate);
        return  1;
    }


    public function store(Request $request)
    {
        // console.log($request);

        $newuser = Student::where('email', '=',  $request->email)->first();
        if ($newuser) {
            $return = json_encode(false);
            return $return;
        } else {
            $user = new Student;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->phone = $request->phone;
            $user->dob = $request->dob;
            $user->save();
            $newuser = Student::where('email', '=',  $request->email)->first();
            // $output = ;
            $return = json_encode(true);

            return $return;
        }
    }
    public function deleteall(Request $request){
        // dd('kjgkd');
        $studentData = $request->all();
         $deleteids = $studentData['data'];
        foreach ($deleteids as $deleteid) {
            if($deleteid != 0){
                $response = Student::find($deleteid)->delete();
            }
        }
        return $deleteids;
    }
    public function updateall(Request $request){
          $allUpdateData = $request->all();
          $allUpdateDataText= $allUpdateData['name'];
          $allUpdateDataIds = $allUpdateData['ids'];
          $allUpdateDataField = $allUpdateData['field'];
          foreach ($allUpdateDataIds as $key => $value) {
            // dump($value);
            $allstudnets = DB::table('students')->where('id' , $value)
            ->update( array($allUpdateDataField => $allUpdateDataText));
            // dump($allstudnets);
          }
        //   dump($allUpdatesDataIds);
       return $allstudnets;
    }
}
