<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman About</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: #f9f0f7;
            color: #333;
        }

        /* Header Section */
        header {
            background: linear-gradient(135deg, #f7c1d1, #b2d8f5);
            color: white;
            text-align: center;
            padding: 20px 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        h1 {
            font-size: 32px;
            margin: 0;
            font-weight: bold;
        }

        /* Back Button */
        .back-arrow-btn {
            padding: 10px;
            background-color: #b2d8f5;
            color: white;
            border: 2px solid #b2d8f5;
            border-radius: 50%;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 15px;
            left: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .back-arrow-btn:hover {
            background-color: #9bc8e8;
            box-shadow: 0 0 20px #9bc8e8;
            transform: scale(1.05);
        }

        .back-arrow-btn i {
            transition: transform 0.3s ease;
        }

        .back-arrow-btn:hover i {
            transform: translateX(-3px);
        }

        /* Container Styles */
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            margin: 20px;
        }

        /* Content Section */
        .content {
            flex: 2;
            background-color: #fdeef3;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border: 2px solid #f7c1d1;
        }

        .content h2 {
            font-size: 28px;
            color: #ff729f;
            margin-bottom: 10px;
        }

        .content p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .content a {
            display: inline-block;
            margin-bottom: 10px;
        }

        /* Sidebar Section */
        .sidebar {
            flex: 1;
            background-color: #fdeef3;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border: 2px solid #b2d8f5;
        }

        .sidebar h3 {
            font-size: 20px;
            color: #b2d8f5;
            margin-bottom: 15px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 12px 0;
        }

        .sidebar ul li a {
            color: #333;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .sidebar ul li a:hover {
            color: #ff729f;
            text-decoration: underline;
        }

        /* Button Styles */
        button {
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        .neon-btn {
            background-color: transparent;
            color: #ff729f;
            border: 2px solid #ff729f;
        }

        .neon-btn:hover {
            background-color: #ff729f;
            color: white;
            box-shadow: 0 0 20px #ff729f;
            transform: scale(1.05);
        }

        .edit-btn {
            background-color: #9bc8e8;
            color: white;
            border: 1px solid #7bbad1;
        }

        .edit-btn:hover {
            background-color: #7bbad1;
            transform: scale(1.05);
        }

        .delete-btn {
            background-color: #f77e89;
            color: white;
            border: 1px solid #f05263;
        }

        .delete-btn:hover {
            background-color: #f05263;
            transform: scale(1.05);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .content, .sidebar {
                flex: 1;
                max-width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Halaman About</h1>
    </header>

    <a href="{{ route('admin.dashboard') }}" class="back-arrow-btn">
        <i class="fas fa-arrow-left"></i>
    </a>

    <div class="container">
        <div class="content">
            <a href="{{ route('admin.about.create') }}">
                <button class="neon-btn">Buat Halaman About</button>
            </a>

            @if($about)
                <h2>{{ $about->title }}</h2>
                <p>{{ $about->content }}</p>

                <a href="{{ route('admin.about.edit', $about->id) }}">
                    <button class="edit-btn">Edit Halaman About</button>
                </a>

                <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus halaman ini?')" class="delete-btn">Hapus Halaman About</button>
                </form>
            @else
                <p>Belum ada informasi tentang kami.</p>
            @endif
        </div>

        <div class="sidebar">
            <h3>Informasi Penting</h3>
            <ul>
                <li><a href="{{ route('admin.certificate.index') }}">Kelola Sertifikat</a></li>
                <li><a href="#">Link Informasi Lain</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
