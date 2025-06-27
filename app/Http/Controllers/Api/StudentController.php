<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Student::all());
        /**in the postman use the get method
         * 
         * http://127.0.0.1:8000/api/students
         * in the headers pass the key as accept and in the value pass  application/json
         * hit the api to see all the users data
         */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:students,email',
            'gender'=>'required|in:male,female'
        ]);

        Student::create($data);

        return response()->json([
            'status'=>true,
            'message'=>'Student created successfully'
        ]);

        /** in the postman use the post method
         * 
         * http://127.0.0.1:8000/api/students
         * in the headers pass the key as accept and in the value pass  application/json
         * in the body use form-data to pass users data,in the key pass the names which you have
         * passed in the model fillable property and in the values add the value of your choice
         * 
         * hit the api to insert new user data into the database
         */
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return response()->json([
            'status'=>true,
            'message'=>'Student fetched successfully',
            'data'=>$student
        ]);

        /** in the postman use the get method
         * 
         * http://127.0.0.1:8000/api/students/{id} ->i.e: http://127.0.0.1:8000/api/students/1
         * in the headers pass the key as accept and in the value pass  application/json
         * hit the api to see specific user's data
         */
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // $student = Student::find($student->id);
       $data=  $request->validate([
            'name'=>'sometimes|string',
            'email'=>'sometimes|email|unique:students,email',
            'gender'=>'sometimes|in:male,female'
        ]);


        $student->update($data);

        return response()->json([
            'status'=>true,
            'message'=>'Student updated successfully',
        ]);

        /** in the postman use the post method
         * http://127.0.0.1:8000/api/students/{id} ->i.e: http://127.0.0.1:8000/api/students/1
         * in the headers pass the key as accept and in the value pass  application/json
         * in the body use form-data to pass users data. In the key pass the names which you have added in the model fillable property and in the values add the value of your choice and at the last pass one another important key but only while sending data through form not in raw json format _method and value PATCH to update the user's data
         */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Student deleted successfully'
        ]);
    }
}
