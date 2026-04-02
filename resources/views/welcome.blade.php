<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel 10 URL Shortener Demo</title>
        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }
            
            .navbar {
                background-color: rgba(255, 255, 255, 0.1) !important;
                backdrop-filter: blur(10px);
                border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            }
            
            .navbar-brand {
                font-weight: bold;
                font-size: 1.5rem;
                color: white !important;
            }
            
            .nav-link {
                color: rgba(255, 255, 255, 0.8) !important;
                transition: color 0.3s ease;
            }
            
            .nav-link:hover {
                color: white !important;
            }
            
            .hero-section {
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                color: white;
                padding: 40px 20px;
            }
            
            .hero-section h1 {
                font-size: 3.5rem;
                font-weight: 700;
                margin-bottom: 20px;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            }
            
            .hero-section p {
                font-size: 1.25rem;
                margin-bottom: 30px;
                opacity: 0.9;
            }
            
            .btn-primary-custom {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                border: 2px solid white;
                color: white;
                padding: 12px 40px;
                font-size: 1.1rem;
                border-radius: 50px;
                transition: all 0.3s ease;
                text-decoration: none;
                display: inline-block;
            }
            
            .btn-primary-custom:hover {
                background: white;
                color: #667eea;
                transform: translateY(-2px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            }
            
            .features {
                background: white;
                padding: 60px 20px;
                margin-top: auto;
            }
            
            .feature-card {
                text-align: center;
                padding: 30px;
                border-radius: 10px;
                background: #f8f9fa;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            
            .feature-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            }
            
            .feature-card h5 {
                color: #667eea;
                margin-top: 15px;
            }
        </style>
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">🔗 URL Shortener</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>                
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="hero-section">
            <div class="container">
                <h1>Welcome to URL Shortener</h1>
                <p>Create short, shareable links and track their performance</p>
                <a href="http://127.0.0.1:8000/login" class="btn-primary-custom">Login</a>
            </div>
        </div>

        <!-- Features Section -->
        <div class="features" id="features">
            <div class="container">
                <h2 class="text-center mb-5">Why Choose Our Service?</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="feature-card">
                            <h5>⚡ Fast & Reliable</h5>
                            <p>Create short links instantly and access them whenever you need them.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature-card">
                            <h5>📊 Analytics</h5>
                            
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature-card">
                            <h5>🔒 Secure</h5>
                            <p>Your links are protected and managed with enterprise-grade security.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
