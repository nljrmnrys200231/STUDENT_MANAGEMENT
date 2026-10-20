@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
<h2>Student List</h2>
<a href="{{ route('students.create') }}" class="btn btn-
primary">
</a>
Add Student
</div>
<div class="card">
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Student Number</th>
<th>Name</th>
<th>Email</th>
<th>Course</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@forelse ($students as $student)
<tr>
<td>
    {{ $student->student number }}</td>
<td>{{ $student->first_name }} {{
$student->last_name}}</td>
<td>{{ $student->email }}
</td>
<td>{{ $student->course }}</td>
<td>
    <td>

$student) }}"
<a href="{{ route('students.show',

class="btn btn-info btn-sm">

View
</a>
<a href="{{ route('students.edit',

class="btn btn-warning btn-sm">

Edit
</a>
<form action="{{

method="POST"

class="d-inline"

route ('students.destroy', $student) }}"

onsubmit="return

confirm('Delete this student?')">

@csrf

@method('DELETE')

btn-danger btn-sm">
<button type="submit" class="btn

Delete
</button>
</form>
</td>
</tr>

@empty
<tr>
<td colspan="5" class="text-center">

No students found.
</td>
</tr>

@endforelse
</tbody>
</table>
</div>
</div>

@endsection
 