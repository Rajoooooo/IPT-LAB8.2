<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class HTMLFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
        // Start the HTML structure with Bootstrap CSS and custom styling for modern aesthetics
        $output = <<<HTML
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Profile of {$profile->getName()}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f0f8ff, #d1e9ff); /* Subtle gradient background */
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
        }
        h1, h2, h5 {
            color: #003366;
            font-family: 'Montserrat', sans-serif; /* Headings font */
        }
        .navbar {
            background-color: #003366;
        }
        .navbar a {
            color: white;
            font-weight: bold;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 50px 20px;
        }
        .profile-card {
            background: white;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            padding: 30px;
            display: grid;
            grid-template-columns: 1fr 2fr;
            align-items: center;
            gap: 30px;
            margin-bottom: 50px;
            transition: all 0.3s ease;
        }
        .profile-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 16px 24px rgba(0, 0, 0, 0.2);
        }
        .founder-img {
            max-width: 100%;
            border-radius: 50%;
            border: 5px solid #003366;
            transition: transform 0.3s ease;
        }
        .founder-img:hover {
            transform: scale(1.05);
        }
        .profile-info {
            text-align: left;
        }
        .profile-info h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        .profile-info p {
            font-size: 1.1rem;
            color: #666;
        }
        .profile-info h5 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #003366;
        }
    </style>
</head>
<body>

    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
            <img src= "https://www.auf.edu.ph/images/auf-logo.png" alt="AUF Logo" width="35" height="45" class="d-inline-block align-top">
            Barbara Yap Angeles
        </a>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Angeles University Foundation</h1>

        <!-- Profile Card -->
        <div class="profile-card">
            <img src="https://www.auf.edu.ph/home/images/articles/bya.jpg" alt="Founder Image" class="img-fluid founder-img">
            <div class="profile-info">
                <h2>{$profile->getName()}</h2>
                <h5>Founder & Visionary Leader</h5>
                <p>{$profile->getStory()}</p>
            </div>
        </div>
    </div>

</body>
</html>
HTML;

        $this->response = $output;
    }

    public function render()
    {
        header('Content-Type: text/html');
        return $this->response;
    }
}
