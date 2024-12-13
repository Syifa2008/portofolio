<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Halaman About</title>
    <style>
        /* Reset dan dasar styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(45deg, #ffe4e6, #cce7ff);
            color: #333;
            line-height: 1.6;
            padding: 0;
            overflow-x: hidden;
        }

        /* Header */
        header {
            background-color: #ffb6c1;
            color: white;
            text-align: center;
            padding: 40px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 3rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Form Styling */
        .content {
            max-width: 850px;
            margin: 50px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(204, 231, 255, 0.5);
        }

        .content label {
            display: block;
            color: #333;
            font-size: 1.1rem;
            margin-bottom: 8px;
        }

        .content input,
        .content textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 25px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 8px;
            color: #333;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .content input:focus,
        .content textarea:focus {
            border-color: #87cefa;
            outline: none;
            box-shadow: 0 0 10px #87cefa;
        }

        .content textarea {
            height: 220px;
            resize: none;
        }

        button {
            width: 100%;
            padding: 18px;
            background-color: #87cefa;
            color: white;
            font-size: 1.2rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(135, 206, 250, 0.4);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #6495ed;
            transform: translateY(-3px); /* Efek tombol terangkat */
        }

        /* Link styling */
        .back-link {
            text-align: center;
            margin-top: 30px;
        }

        .back-link a {
            color: #ff69b4;
            font-size: 1.1rem;
            text-decoration: none;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .back-link a:hover {
            color: #ff1493;
            text-decoration: underline;
            transform: scale(1.1); /* Efek perbesar saat hover */
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            h1 {
                font-size: 2.2rem;
            }

            .content {
                padding: 20px;
            }

            button {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Edit Halaman About</h1>
    </header>

    <div class="content">
        <!-- Form untuk mengedit halaman About -->
        <form action="{{ route('admin.about.update', $about->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="title">Judul</label>
                <input type="text" name="title" id="title" value="{{ old('title', $about->title) }}" required>
            </div>

            <div>
                <label for="content">Isi Konten</label>
                <textarea name="content" id="content" required>{{ old('content', $about->content) }}</textarea>
            </div>

            <button type="submit">Update</button>
        </form>

        <div class="back-link">
            <a href="{{ route('admin.about.index') }}">Kembali ke Halaman About</a>
        </div>
    </div>

</body>
</html>
