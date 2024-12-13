<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/admin.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font-family: 'Arial', sans-serif;
        background-color: #F8E8F9; /* Pastel Pink */
        color: #2C3E50; /* Dark Blue for text */
        display: flex;
        min-height: 100vh;
        transition: background-color 0.5s ease, color 0.5s ease;
    }

    .sidebar {
        width: 250px;
        background-color: #A2DFF7; /* Pastel Blue */
        color: white;
        display: flex;
        flex-direction: column;
        padding: 20px;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        border-right: 2px solid #F38BA0; /* Pastel Pink Border */
        box-shadow: 3px 0 10px rgba(0, 0, 0, 0.5);
    }

    .sidebar h2 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 22px;
        color: #F38BA0; /* Pastel Pink */
        text-transform: uppercase;
        letter-spacing: 1.5px;
    }

    .sidebar a {
        display: flex;
        align-items: center;
        color: #2C3E50; /* Dark Blue */
        padding: 12px;
        text-decoration: none;
        margin: 10px 0;
        transition: background 0.3s, color 0.3s;
        border-radius: 5px;
        font-size: 16px;
    }

    .sidebar a i {
        margin-right: 10px;
        font-size: 1.2rem;
        color: #F38BA0; /* Pastel Pink */
    }

    .sidebar a:hover {
        background: #F38BA0; /* Pastel Pink Hover */
        color: white;
        box-shadow: inset 5px 0 0 #F38BA0;
    }

    .main-content {
        margin-left: 250px;
        padding: 20px;
        width: calc(100% - 250px);
        display: flex;
        flex-direction: column;
        gap: 20px;
        background-color: #A2DFF7; /* Pastel Blue */
        color: #2C3E50; /* Dark Blue */
    }

    .header {
        background-color: #A2DFF7; /* Pastel Blue */
        color: #F38BA0; /* Pastel Pink */
        padding: 15px;
        text-align: center;
        font-size: 1.8rem;
        border: 2px solid #F38BA0; /* Pastel Pink Border */
        border-radius: 8px;
        margin-bottom: 20px;
        position: relative;
        text-transform: uppercase;
        letter-spacing: 1.2px;
    }

    .toggle-btn {
        padding: 8px;
        background-color: #F38BA0; /* Pastel Pink */
        color: #A2DFF7; /* Pastel Blue */
        border-radius: 50%;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s, color 0.3s;
        box-shadow: 0 4px 10px rgba(255, 121, 205, 0.4);
        margin-top: -35px;
        margin-left: 0;
    }

    .toggle-btn:hover {
        background-color: #F8A7C3; /* Lighter Pink */
        transform: scale(1.05);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        border: 2px solid #F38BA0; /* Pastel Pink */
        padding: 12px 15px;
        text-align: left;
        color: #2C3E50; /* Dark Blue */
    }
    th {
        background-color: #F38BA0; /* Pastel Pink */
        color: #2C3E50; /* Dark Blue */
        text-transform: uppercase;
    }
    tr {
        background-color: #A2DFF7; /* Pastel Blue */
        transition: background-color 0.3s;
    }
    tr:hover {
        background-color: #F38BA0; /* Pastel Pink Hover */
    }
    @media (max-width: 768px) {
        .sidebar {
            width: 200px;
        }
        .main-content {
            margin-left: 200px;
            width: calc(100% - 200px);
        }
    }
    @media (max-width: 576px) {
        .sidebar {
            width: 100%;
            position: relative;
            height: auto;
        }
        .main-content {
            margin-left: 0;
            width: 100%;
        }
    }
</style>

</head>
<body>
<div class="sidebar">
    <h2>Admin Dashboard</h2>
    <a href="{{ route('admin.about.index') }}"><i class="fas fa-info-circle"></i> About</a>
    <a href="{{ route('skill.index') }}"><i class="fas fa-pencil-alt"></i> Skill</a>
    <a href="{{ route('admin.certificate.index') }}"><i class="fas fa-scroll"></i> Certificate</a>
    <a href="{{ route('admin.project.index') }}"><i class="fas fa-project-diagram"></i> Project</a>
    <a href="{{ route('admin.contacts.index') }}" class="btn btn-primary"><i class="fas fa-address-book"></i> Contact</a>
    <a href="{{ route('login') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<div class="main-content">
    <div class="header">
        Welcome to Admin Dashboard
        <div class="toggle-btn" id="theme-toggle">
            <i class="fas fa-moon"></i>
        </div>
    </div>
</div>
</body>
</html>
