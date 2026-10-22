<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("student.index", [
            "students" => Student::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("student.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                "name" => ["required", "min:3"],
                "email" => ["required", "email", "unique:students,email"],
                "phone" => ["required", "numeric", "regex:/^08\d{6,10}$/", "unique:students,phone"],
                "address" => ["required"],
            ],
            [
                "name.required" => "Nama harus diisi.",
                "name.min" => "Nama minimal 3 karakter.",

                "email.required" => "Email harus diisi.",
                "email.email" => "Format email tidak valid.",
                "email.unique" => "Email sudah terdaftar.",

                "phone.required" => "Nomor telepon harus diisi.",
                "phone.numeric" => "Nomor telepon harus berupa angka.",
                "phone.regex" => "Nomor telepon harus diawali dengan 08 dan terdiri dari 8 hingga 12 digit.",
                "phone.unique" => "Nomor telepon sudah terdaftar.",

                "address.required" => "Alamat harus diisi.",
            ],
        );
        Student::create($validated);

        return redirect()->route("students.index")->with("message", "Data berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view("student.show", [
            "student" => $student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view("student.edit", [
            "student" => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                "name" => ["required", "min:3"],
                "email" => ["required", "email", "unique:students,email,$id"],
                "phone" => ["required", "numeric", "regex:/^08\d{6,10}$/", "unique:students,phone,$id"],
                "address" => ["required"],
            ],
            [
                "name.required" => "Nama harus diisi.",
                "name.min" => "Nama minimal 3 karakter.",

                "email.required" => "Email harus diisi.",
                "email.email" => "Format email tidak valid.",
                "email.unique" => "Email sudah terdaftar.",

                "phone.required" => "Nomor telepon harus diisi.",
                "phone.numeric" => "Nomor telepon harus berupa angka.",
                "phone.regex" => "Nomor telepon harus diawali dengan 08 dan terdiri dari 8 hingga 12 digit.",
                "phone.unique" => "Nomor telepon sudah terdaftar.",

                "address.required" => "Alamat harus diisi.",
            ],
        );
        $student = Student::findOrFail($id);
        $student->fill($validated);

        if (!$student->isDirty()) {
            return redirect()->route("students.show", $student->id)->with("message", "Tidak ada perubahan.");
        }

        $student->save();

        return redirect()->route("students.show", $student->id)->with("message", "Data berhasil diubah.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route("students.index")->with("message", "Data berhasil dihapus.");
    }
}
