<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    private array $headers = [] ;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function import(Request $request)
    {
        $file = $request->file('file');
        $fileContents = file($file->getPathname());

        Storage::disk('public')->put('/files/students/' , $file);
        $first = true;
        foreach ($fileContents as $line) {
            $data = str_getcsv($line);

            if ($first){
                $this->headers = $data;
                $first = false;
                continue;
            }
            Student::create([
                $this->headers[0] => $data[0],
                $this->headers[1] => $data[1],
                $this->headers[2] => $data[2],
                // Add more fields as needed
            ]);
        }

        return redirect()->back()->with('success', 'CSV file imported successfully.');
    }


    public function export()
    {
        $students = Student::all();
        $csvFileName = 'products.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['UID', 'Name' , 'Gender']); // Add more headers as needed

        foreach ($students as $student) {
            fputcsv($handle, [
                $student->UID,
                $student->name,
                $student->gender
            ]); // Add more fields as needed
        }

        fclose($handle);

        return Response::make('', 200, $headers);
    }
}
