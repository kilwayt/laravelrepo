<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'professor_id' => 'required|exists:professors,id',
            'description' => 'nullable|string',
        ]);

        $course = new Course();
        $course->title = $validated['title'];
        $course->professor_id = $validated['professor_id'];
        $course->description = $validated['description'];
        $course->save();

        return redirect()->route('courses.index');
    }
}
