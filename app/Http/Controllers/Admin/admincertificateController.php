<?php

// app/Http/Controllers/Admin/CertificateController.php

namespace App\Http\Controllers\Admin; // Menggunakan namespace dengan huruf kapital untuk "Admin"

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate; // Memastikan namespace model Certificate benar
use Illuminate\Support\Facades\Storage; // Perbaiki import Storage jika perlu

class admincertificateController extends Controller
{
    // Menampilkan daftar certificate
    public function index()
    {
        // Retrieve all certificates
        $certificates = Certificate::all();
        // Return the view with certificate data
        return view('admin.certificate.index', compact('certificates'));
    }

    // Show form to create a new certificate
    public function create()
    {
        // Return the view for creating a certificate
        return view('admin.certificate.create');
    }

    // Store a new certificate
// Store a new certificate
public function store(Request $request)
{
    // Validate the input data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'issued_by' => 'required|string|max:255',
        'issued_at' => 'required|date',
        'description' => 'nullable|string|max:1000',
    ]);

    $imagePath = '';  // Berikan nilai default string kosong
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $filename = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('project_images'), $filename);
        $imagePath = 'project_images/' . $filename;
    }

    Certificate::create([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'file' => $imagePath,  // Ini sekarang akan menyimpan string kosong jika tidak ada file
        'issued_by' => $validated['issued_by'],
        'issued_at' => $validated['issued_at'],
    ]);

    // Redirect with success message
    return redirect()->route('admin.certificate.index')->with('success', 'Certificate created successfully!');
}



    // Show form to edit an existing certificate
    public function edit( $id)
    {
        $certif = Certificate::findOrFail($id);
        
        return view('admin.certificate.certifedit', compact('certif'));
    }
    
    // Update an existing certificate
    public function update(Request $request, Certificate $certificate)
    {
        // Validasi input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'issued_by' => 'required|string|max:255',
            'issued_at' => 'required|date',
            'image' => 'nullable|file|mimes:pdf,jpg,png|max:2048', // Pastikan validasi file sudah tepat
            'description' => 'nullable|string|max:1000',
        ]);
    
        $imagePath = $certificate->file; // Ambil path file lama
    
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Hapus file lama jika ada
            if ($certificate->file && Storage::disk('public')->exists($certificate->file)) {
                Storage::disk('public')->delete($certificate->file);
            }
    
            // Simpan file baru
            $filename = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('project_images'), $filename);
            $imagePath = 'project_images/' . $filename;
        }
    
        // Update data certificate
        $certificate->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'file' => $imagePath, // Simpan file path baru jika ada, atau tetap gunakan yang lama
            'issued_by' => $validated['issued_by'],
            'issued_at' => $validated['issued_at'],
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('admin.certificate.index')->with('success', 'Certificate updated successfully!');
    }
    



    // Delete an existing certificate
    public function destroy(Certificate $certificate)
    {
        // Delete the certificate from the database
        $certificate->delete();

        // Redirect with success message
        return redirect()->route('admin.certificate.index')->with('success', 'Certificate deleted successfully!');
    }
}