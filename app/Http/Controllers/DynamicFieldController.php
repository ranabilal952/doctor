<?php

namespace App\Http\Controllers;

use App\Models\DynamicField;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class DynamicFieldController extends Controller
{
    function index()
    {
      $dynamic = DynamicField::all();
      return view('psychometer.testcreate', compact('dynamic'));
    }

    function insert(Request $request)
    {
     if($request->ajax())
     {

      $error = request()->validate([
        'test_id'  => 'required',
        'question'  => 'required',
        'option1'  => 'required',
        'option2'  => 'required',
        'option3'  => 'required',
        'option4'  => 'required',
        'option5'  => 'required',
      ]);
      $test_id = $request->test_id;
      $question = $request->question;
      $option1 = $request->option1;
      $option2 = $request->option2;
      $option3 = $request->option3;
      $option4 = $request->option4;
      $option5 = $request->option5;
      for($count = 0; $count < count($question); $count++)
      {
       $data = array(
        'test_id' => $test_id,
        'question' => $question[$count],
        'option1'  => $option1[$count],
        'option2'  => $option2[$count],
        'option3'  => $option3[$count],
        'option4'  => $option4[$count],
        'option5'  => $option5[$count],
       );
       $insert_data[] = $data; 
      }

      DynamicField::insert($insert_data);
      return response()->json([
       'success'  => 'Data Added successfully.'
      ]);
     }
    }
}