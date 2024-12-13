<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Proyek Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F8E8F9; /* Pink pastel */
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #ADD8E6; /* Light blue */
            color: white;
            margin: 0;
            font-size: 36px;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 16px;
            color: #333;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        input:focus, textarea:focus {
            border-color: #FFB6C1; /* Light pink on focus */
            outline: none;
        }

        button {
            padding: 12px 20px;
            background-color: #ADD8E6; /* Light blue */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        button:hover {
            background-color: #4682B4; /* Blue */
        }

        .success-message {
            color: green;
            text-align: center;
            margin: 20px 0;
        }

        .error-message {
            color: red;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #FFB6C1; /* Light pink */
            text-decoration: none;
            font-size: 16px;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Tambah Proyek Baru</h1>

    <!-- Menampilkan pesan sukses setelah form berhasil disubmit -->
    @if(session('success'))
        <div class="success-message">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="container">
        <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="title">Judul Proyek:</label>
                <input type="text" name="title" id="title" required value="{{ old('title') }}">
                @error('title')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="description">Deskripsi:</label>
                <textarea name="description" id="description" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="tools">Alat/Tools (Opsional):</label>
                <input type="text" name="tools" id="tools" value="{{ old('tools') }}">
                @error('tools')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="image">Gambar (Opsional):</label>
                <input type="file" name="image" id="image">
                @error('image')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit">Simpan Proyek</button>
            </div>
        </form>

        <div class="back-link">
            <a href="{{ route('admin.project.index') }}">Kembali ke Daftar Proyek</a>
        </div>
    </div>
</body>
</html>
