<?php
 
namespace App\Http\Controllers;
 
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\rules;
 
 
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::latest() ->get();
 
        return view('students.index', compact('students'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_number' =>'required | string | max : 50 |unique:students,student_number',
            'first_name' => ' required | string |max:255',
            'last_name' => ' required | string |max:255',
            'email' => 'required |email |max:255|unique:students,email',
            'course' => ' required |string|max:255'
           
        ]);
       
        Student::create ($validated);
 
        return redirect () ->route ('students.index')
            ->with ('success', 'Student added successfully');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view ('student.show', compact('student'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view ('student.edit', compact (student));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate ([
            'student_number' => [
                'required',
                'string',
                'max:50',
                Rule::uniquie ('student','student_number') ->ignore ($student->id),      
             ],
             'course' => 'required | string | max:255',
 
        ]);
        $student->update ($validated);
 
        return redirect () ->route('student.index')
            ->with ('success', 'student updated successfully!');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete ();
 
        return redirect () ->route ('students.index')
            ->with ('success', 'Student deleted successfully');
    }
}
 