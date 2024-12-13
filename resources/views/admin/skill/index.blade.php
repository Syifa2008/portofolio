<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skills Management</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8e1e7;
            color: #555;
            line-height: 1.6;
            padding-bottom: 50px;
            font-size: 16px;
            overflow-x: hidden;
        }

        /* Header Section */
        .header {
            background: linear-gradient(135deg, #a6dcef, #a6dcef);
            color: white;
            padding: 100px 20px;
            text-align: center;
            border-bottom: 4px solid #f9b6c6;
            box-shadow: 0px 10px 50px rgba(249, 182, 198, 0.3);
            margin-bottom: 50px;
        }

        .header h1 {
            font-size: 4rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 20px;
            text-shadow: 0px 0px 15px rgba(249, 182, 198, 0.7);
        }

        .header p {
            font-size: 1.2rem;
            font-weight: 300;
            margin-bottom: 30px;
        }

        /* Skills Cards */
        .skills-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 40px;
            padding: 30px 20px;
        }

        .skill-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .skill-card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 15px 50px rgba(0, 0, 0, 0.2);
        }

        .skill-card h2 {
            font-size: 2rem;
            color: #f9b6c6;
            margin-bottom: 20px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .skill-card p {
            font-size: 1.1rem;
            color: #777;
            margin-bottom: 50px;
        }

        /* Floating Action Button (FAB) */
        .fab {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #a6dcef;
            padding: 15px;
            border-radius: 50%;
            font-size: 1.8rem;
            color: white;
            text-align: center;
            box-shadow: 0px 5px 30px rgba(166, 220, 239, 0.3);
            transition: all 0.3s ease;
        }

        .fab:hover {
            transform: scale(1.1);
            background-color: #88c4db;
        }

        /* Button Styles */
        .btn {
            font-size: 1rem;
            padding: 12px 20px;
            border-radius: 30px;
            transition: 0.3s ease;
            text-decoration: none;
            display: inline-block;
            width: 100%;
            text-align: center;
            min-width: 120px;
        }

        .btn-edit {
            background-color: #f9b6c6;
            color: white;
            box-shadow: 0 5px 15px rgba(249, 182, 198, 0.3);
        }

        .btn-edit:hover {
            background-color: #e89aad;
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(249, 182, 198, 0.4);
        }

        .btn-delete {
            background-color: #ff6b6b;
            color: white;
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
        }

        .btn-delete:hover {
            background-color: #e05555;
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(255, 107, 107, 0.4);
        }

        .skill-actions {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            align-items: center;
            width: 100%;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2.5rem;
            }

            .skills-wrapper {
                grid-template-columns: 1fr;
                gap: 30px;
            }
        }
    </style>
</head>

<body>

    <!-- Header Section -->
    <div class="header">
        <h1>Skills Management</h1>
        <p>Enhance Your Abilities and Track Your Progress</p>
    </div>

    <!-- Skills Cards Section -->
    <div class="skills-wrapper">
        @foreach ($skills as $skill)
        <div class="skill-card">
            <h2>{{ $skill->name }}</h2>
            <p>{{ $skill->description }}</p>

            <div class="skill-actions">
                <a href="{{ route('skill.edit', $skill) }}" class="btn btn-edit"><i class="fas fa-edit"></i> Edit</a>
                <form action="{{ route('skill.destroy', $skill) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Floating Action Button (FAB) -->
    <a href="{{ route('skill.create') }}" class="fab">
        <i class="fas fa-plus"></i>
    </a>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // SweetAlert2 Confirmation for Delete
        const deleteForms = document.querySelectorAll('form[method="POST"]');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f9b6c6',
                    cancelButtonColor: '#ff6b6b',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // SweetAlert2 Success Message after deletion
        @if (session('success'))
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
        @endif
    </script>

</body>

</html>
