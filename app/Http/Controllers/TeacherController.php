<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("teacher.index", [
            "teachers" => Teacher::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("teacher.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                "name" => ["required", "min:3"],
                "email" => ["required", "email", "unique:teachers,email"],
                "phone" => ["required", "numeric", "regex:/^08\d{6,10}$/", "unique:teachers,phone"],
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
            ],
        );
        Teacher::create($validated);

        return redirect()->route("teachers.index")->with("message", "Data berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view("teacher.show", [
            "teacher" => $teacher,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view("teacher.edit", [
            "teacher" => $teacher,
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
                "email" => ["required", "email", "unique:teachers,email,$id"],
                "phone" => ["required", "numeric", "regex:/^08\d{6,10}$/", "unique:teachers,phone,$id"],
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
            ],
        );
        $teacher = Teacher::findOrFail($id);
        $teacher->fill($validated);

        if (!$teacher->isDirty()) {
            return redirect()->route("teachers.show", $teacher->id)->with("message", "Tidak ada perubahan.");
        }

        $teacher->save();

        return redirect()->route("teachers.show", $teacher->id)->with("message", "Data berhasil diubah.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route("teachers.index")->with("message", "Data berhasil dihapus.");
    }
}
