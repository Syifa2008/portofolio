<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Skill</title>
    <style>
        body {
            background-color: #ffe4e1; /* Warna latar belakang pink pastel */
            color: #000080; /* Warna teks biru navy */
            font-family: 'Arial', sans-serif; /* Font yang bersih */
            margin: 0; /* Menghilangkan margin default */
            padding: 20px; /* Padding keseluruhan */
        }

        .container {
            max-width: 600px; /* Lebar maksimum kontainer */
            background-color: #fff0f5; /* Latar belakang kontainer pink pastel */
            border-radius: 10px; /* Sudut melengkung */
            padding: 40px; /* Padding di dalam kontainer */
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2); /* Bayangan untuk kedalaman */
            margin: auto; /* Pusatkan kontainer */
            transition: transform 0.3s; /* Transisi saat hover */
            padding-left: 40px; /* Geser isi kontainer lebih ke kanan */
        }

        .container:hover {
            transform: scale(1.01); /* Efek zoom saat hover */
        }

        h1 {
            text-align: center; /* Pusatkan teks judul */
            color: #4682b4; /* Warna biru pastel */
            margin-bottom: 30px; /* Jarak bawah judul */
            font-size: 2.5em; /* Ukuran font judul yang lebih besar */
            font-weight: 600; /* Ketebalan font judul */
        }

        .form-label {
            font-weight: bold; /* Label dengan ketebalan font */
            margin-bottom: 5px; /* Jarak bawah label */
            color: #87cefa; /* Warna biru muda untuk label */
        }

        .form-control {
            background-color: #f8f8ff; /* Latar belakang input putih pastel */
            color: #000080; /* Warna teks input biru navy */
            border: 1px solid #87cefa; /* Warna border input biru muda */
            border-radius: 5px; /* Sudut melengkung input */
            padding: 12px; /* Padding di dalam input */
            width: 100%; /* Lebar penuh */
            margin-bottom: 20px; /* Jarak bawah input */
            transition: border-color 0.3s; /* Transisi border saat fokus */
            font-size: 1em; /* Ukuran font input */
            box-sizing: border-box; /* Menghitung padding dalam lebar */
            resize: none; /* Mencegah resize textarea */
        }

        textarea {
            width: 100%; /* Pastikan textarea mengisi kontainer */
            resize: none; /* Mencegah resize */
        }

        .form-control::placeholder {
            color: #999; /* Warna placeholder */
        }

        .form-control:focus {
            border-color: #4682b4; /* Warna border saat fokus lebih cerah */
            outline: none; /* Menghilangkan outline default */
            background-color: #f0f8ff; /* Warna latar saat fokus */
        }

        .btn-success {
            background-color: #87cefa; /* Warna tombol biru pastel */
            color: #fff; /* Warna teks tombol */
            border: none; /* Menghilangkan border */
            border-radius: 5px; /* Sudut melengkung tombol */
            padding: 15px; /* Padding di dalam tombol */
            width: 90%; /* Kurangi lebar agar tombol lebih kecil */
            margin-left: 5%; /* Geser ke kanan */
            cursor: pointer; /* Kursor pointer saat hover */
            transition: background-color 0.3s, transform 0.2s; /* Transisi latar belakang dan transformasi */
            font-weight: bold; /* Teks tombol tebal */
            font-size: 1.2em; /* Ukuran font tombol */
            margin-top: 10px; /* Jarak atas tombol */
        }

        .btn-success:hover {
            background-color: #4682b4; /* Warna tombol saat hover lebih gelap */
            transform: translateY(-2px); /* Efek angkat saat hover */
        }

        .form-group {
            margin-bottom: 20px; /* Jarak antar grup input */
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px; /* Padding yang lebih kecil di perangkat kecil */
                padding-left: 10px; /* Geser sedikit lebih kanan di perangkat kecil */
            }

            h1 {
                font-size: 1.8em; /* Ukuran font judul yang lebih kecil di perangkat kecil */
            }

            .btn-success {
                padding: 12px; /* Padding tombol yang lebih kecil di perangkat kecil */
                font-size: 1em; /* Ukuran font tombol yang lebih kecil di perangkat kecil */
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Create Skill</h1>

        <form action="{{ route('skill.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Skill Name</label>
                <input type="text" name="name" class="form-control" required placeholder="Enter skill name">
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" placeholder="Enter skill description" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Create Skill</button>
        </form>
    </div>
</body>

</html>
