<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class AdminProjectController extends Controller
{
    // Menampilkan daftar proyek
    public function index()
    {
        $projects = Project::all();
        return view('admin.project.index', compact('projects'));
    }

    // Menampilkan form untuk membuat proyek baru
    public function create()
    {
        return view('admin.project.create');
    }

    // Menyimpan proyek baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tools' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $filename = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('project_images'), $filename);
            $imagePath = 'project_images/' . $filename;
        }

        Project::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'tools' => $validated['tools'],
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.project.index')->with('success', 'Proyek berhasil dibuat!');
    }

    // Menampilkan form untuk mengedit proyek
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.project.edit', compact('project'));
    }

    // Mengupdate proyek yang ada
    public function update(Request $request, $id)
{
    $project = Project::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'tools' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    // Cek jika file gambar baru diupload
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        // Hapus gambar lama jika ada dan file valid
        if ($project->image_path && file_exists(public_path($project->image_path))) {
            unlink(public_path($project->image_path));
        }

        // Simpan gambar baru
        $filename = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('project_images'), $filename);
        $project->image_path = 'project_images/' . $filename;
    }

    // Update data proyek
    $project->update([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'tools' => $validated['tools'],
        'image_path' => $project->image_path, // Jika gambar diupdate, gunakan path baru
    ]);

    return redirect()->route('admin.project.index')->with('success', 'Proyek berhasil diperbarui!');
}


 // Penutup fungsi update()

    // Menghapus proyek
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        if ($project->image_path && file_exists(public_path($project->image_path))) {
            unlink(public_path($project->image_path));
        }

        $project->delete();

        return redirect()->route('admin.project.index')->with('success', 'Proyek berhasil dihapus!');
    }
}
