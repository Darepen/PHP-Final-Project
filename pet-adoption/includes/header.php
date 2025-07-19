<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPRV Pet Adoption Center</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FEF9FF;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="40" height="40"><path fill="%23E9D5FF" d="M75,30 A10,10 0 1,1 75,50 A10,10 0 1,1 75,30 M50,20 A10,10 0 1,1 50,40 A10,10 0 1,1 50,20 M25,30 A10,10 0 1,1 25,50 A10,10 0 1,1 25,30 M50,55 A20,20 0 1,1 50,95 A20,20 0 1,1 50,55"></path></svg>');
            background-repeat: repeat;
            background-attachment: fixed;
        }
        .navbar {
            background-color: #6a0dad;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
        .navbar-brand img {
            height: 50px;
            transition: transform 0.3s ease;
        }
        .navbar-brand .brand-text {
            color: #fff;
            font-weight: 700;
            font-size: 1.5rem;
            transition: text-shadow 0.3s ease;
        }
        .navbar-brand:hover img {
            transform: scale(1.1);
        }
        .navbar-brand:hover .brand-text {
            text-shadow: 0 0 8px rgba(255, 255, 255, 0.7);
        }

        .nav-link {
            color: #fff !important;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: background-color 0.2s ease-in-out;
        }
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
        }
        .hero-section {
            background-image: 
                linear-gradient(rgba(69, 26, 110, 0.4), rgba(69, 26, 110, 0.4)), 
                url('images/background.jpg');
            background-size: cover;      
            background-position: center; 
            color: white;
            min-height: 265px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 20px;
            border-radius: 20px;
            text-align: center;
            margin-bottom: 40px;
        }
        .hero-section-success {
            background-image:
                linear-gradient(rgba(100, 140, 108, 0.6), rgba(100, 140, 108, 0.6)), 
                url('images/adopted_background.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 72px 20px;
            border-radius: 20px;
            text-align: center;
            margin-bottom: 40px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }
        .hero-section-carrier {
            background-image: 
                linear-gradient(rgba(69, 26, 110, 0.4), rgba(69, 26, 110, 0.4)), 
                url('images/background2.jpg');
            background-size: cover;      
            background-position: center; 
            color: white;
            min-height: 265px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 20px;
            border-radius: 20px;
            text-align: center;
        }
        .pet-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .pet-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }
        .pet-card .card-img-top {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        .btn-custom {
            background-color: #c77dff;
            border-color: #c77dff;
            color: white;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 30px;
        }
        .btn-custom:hover {
            background-color: #b356f0;
            border-color: #b356f0;
            color: white;
        }
        .pet-tag {
            font-size: 0.75rem;
            font-weight: 600;
            padding: .25em .6em;
            border-radius: 10px;
            margin: 2px;
            display: inline-block;
        }
        .how-to-adopt-section {
            background-color: #fff;
            padding: 50px 20px;
            border-radius: 20px;
            margin-top: 60px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .step-circle {
            width: 50px;
            height: 50px;
            background-color: #c77dff;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0 auto 15px auto;
        }
        #heroCarousel .carousel-inner {
            min-height: 300px;
        }
        #heroCarousel .hero-section,
        #heroCarousel .how-to-adopt-section {
            width: 100%;
            height: 200%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0;
            box-shadow: none;
            padding: 20px;
        }
        #heroCarousel .how-to-adopt-section {
            position: relative;
            top: -15px;
        }
        /* --- Custom Modal Styles --- */
        .modal-overlay {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1055; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.5); /* Black w/ opacity */
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 30px;
            border: 1px solid #888;
            width: 80%;
            max-width: 450px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .modal-title {
            color: #6a0dad;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .btn-modal-purple {
            background-color: #6a0dad;
            color: white;
            padding: 10px 25px;
            border: none;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
            transition: background-color 0.2s ease;
        }

        .btn-modal-purple:hover {
            background-color: #5a0b9a;
            color: white;
        }
        #heroCarousel .carousel-control-prev,
        #heroCarousel .carousel-control-next {
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        #heroCarousel:hover .carousel-control-prev,
        #heroCarousel:hover .carousel-control-next {
            opacity: 1;
        }

        .carousel-control-prev-icon {
          background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%236a0dad'%3e%3cpath d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/%3e%3c/svg%3e");
        }

        .carousel-control-next-icon {
          background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%236a0dad'%3e%3cpath d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/BPRV_Logo only.png" alt="BPRV Adoption Center">
                <span class="brand-text">BPRV</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adopted.php"><i class="bi bi-trophy-fill"></i> Success Stories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="favorites.php">
                            <i class="bi bi-basket2-fill"></i> My Carrier 
                            <span class="badge bg-danger rounded-pill ms-1">
                                <?php echo isset($_SESSION['favorites']) ? count($_SESSION['favorites']) : '0'; ?>
                            </span>
                        </a>
                    </li>
                    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
                        <?php if ($_SESSION['username'] === 'BPRV_admin'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="auth/logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="auth/login.php"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
    <?php if (isset($_SESSION['feedback_message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['feedback_message']['type']; ?> alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['feedback_message']['text']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['feedback_message']); // Clear the message after displaying it ?>
    <?php endif; ?>
    </div>
    <div class="container mt-5">