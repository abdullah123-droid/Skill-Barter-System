<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillSync - Connect, Learn, Grow Together</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 1rem 0;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: white !important;
        }
        .navbar-brand i {
            margin-right: 10px;
        }
        .nav-buttons .btn {
            margin-left: 10px;
            padding: 8px 25px;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-login {
            background: transparent;
            border: 2px solid white;
            color: white;
        }
        .btn-login:hover {
            background: white;
            color: #667eea;
            transform: translateY(-2px);
        }
        .btn-register {
            background: white;
            border: 2px solid white;
            color: #667eea;
        }
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.1)" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
            opacity: 0.3;
        }
        .hero-content {
            position: relative;
            z-index: 2;
        }
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            color: white;
        }
        .hero p {
            font-size: 1.2rem;
            color: rgba(255,255,255,0.9);
            margin-bottom: 30px;
        }
        .hero-image {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        .btn-get-started {
            background: white;
            color: #667eea;
            padding: 12px 35px;
            border-radius: 30px;
            font-weight: bold;
            font-size: 1.1rem;
            transition: all 0.3s;
            border: none;
        }
        .btn-get-started:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        /* Stats Section */
        .stats-section {
            background: white;
            padding: 60px 0;
            box-shadow: 0 5px 30px rgba(0,0,0,0.05);
        }
        .stat-box {
            text-align: center;
            padding: 20px;
        }
        .stat-box i {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 15px;
        }
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
        }
        .stat-label {
            font-size: 1rem;
            color: #666;
        }

        /* Features Section */
        .features {
            padding: 80px 0;
            background: #f8f9fa;
        }
        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }
        .section-title h2 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }
        .section-title p {
            font-size: 1.1rem;
            color: #666;
        }
        .feature-card {
            background: white;
            padding: 35px 25px;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            height: 100%;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }
        .feature-card i {
            font-size: 3rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 20px;
        }
        .feature-card h4 {
            margin-bottom: 15px;
            font-weight: bold;
        }
        .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        /* How It Works */
        .how-it-works {
            padding: 80px 0;
            background: white;
        }
        .step-card {
            text-align: center;
            padding: 20px;
        }
        .step-number {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-size: 1.8rem;
            font-weight: bold;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        /* Testimonials */
        .testimonials {
            padding: 80px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .testimonial-card {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            margin: 15px;
            text-align: center;
        }
        .testimonial-card i {
            font-size: 2rem;
            margin-bottom: 15px;
            opacity: 0.8;
        }
        .testimonial-text {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .testimonial-author {
            font-weight: bold;
            margin-top: 15px;
        }

        /* CTA Section */
        .cta-section {
            padding: 60px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
        }
        .cta-section h3 {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        .btn-cta {
            background: white;
            color: #667eea;
            padding: 12px 35px;
            border-radius: 30px;
            font-weight: bold;
            font-size: 1.1rem;
            border: none;
            margin-top: 20px;
        }

        /* Footer */
        .footer {
            background: #1a1a2e;
            color: white;
            padding: 50px 0 20px;
        }
        .footer h5 {
            margin-bottom: 20px;
            font-weight: bold;
        }
        .footer a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }
        .footer a:hover {
            color: #667eea;
        }
        .social-icons i {
            font-size: 1.5rem;
            margin-right: 15px;
            transition: all 0.3s;
            cursor: pointer;
        }
        .social-icons i:hover {
            transform: translateY(-3px);
            color: #667eea;
        }
        .copyright {
            text-align: center;
            padding-top: 30px;
            margin-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }
            .hero-image {
                margin-top: 40px;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="fas fa-exchange-alt"></i> SkillSync
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto nav-buttons">
                <button class="btn btn-login" onclick="showLoginModal()">Login</button>
                <button class="btn btn-register" onclick="showRegisterModal()">Register</button>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <div class="container hero-content">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1>Sync Skills, <br>Grow Together</h1>
                <p>Join thousands of university students sharing knowledge and skills. Learn for free, teach what you know, and grow together as a community with SkillSync.</p>
                <button class="btn btn-get-started" onclick="showRegisterModal()">
                    <i class="fas fa-rocket"></i> Get Started Now
                </button>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=500&h=400&fit=crop" alt="Students collaborating" class="img-fluid hero-image rounded-4 shadow">
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="stat-box">
                    <i class="fas fa-users"></i>
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Active Students</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box">
                    <i class="fas fa-tasks"></i>
                    <div class="stat-number">100+</div>
                    <div class="stat-label">Skills Available</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box">
                    <i class="fas fa-handshake"></i>
                    <div class="stat-number">1000+</div>
                    <div class="stat-label">Exchanges Made</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box">
                    <i class="fas fa-star"></i>
                    <div class="stat-number">4.8</div>
                    <div class="stat-label">User Rating</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features">
    <div class="container">
        <div class="section-title">
            <h2>Why Choose SkillSync?</h2>
            <p>Connect, learn, and grow with students just like you</p>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <i class="fas fa-user-plus"></i>
                    <h4>Easy Registration</h4>
                    <p>Create your profile in minutes and start listing your skills. No complicated setup required.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <i class="fas fa-search"></i>
                    <h4>Smart Search</h4>
                    <p>Find peers based on skills, department, or interests. Our intelligent search helps you find the perfect match.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <i class="fas fa-handshake"></i>
                    <h4>Skill Matching</h4>
                    <p>Get automatic suggestions for mutual skill exchange. Learn what you want by teaching what you know.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <i class="fas fa-calendar-alt"></i>
                    <h4>Easy Scheduling</h4>
                    <p>Schedule learning sessions at your convenience. Plan your exchange around your busy schedule.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <i class="fas fa-star"></i>
                    <h4>Rating System</h4>
                    <p>Rate your exchanges and build trust. Quality mentors and learners rise to the top.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <i class="fas fa-shield-alt"></i>
                    <h4>Safe & Secure</h4>
                    <p>Verified university students only. Your data and privacy are always protected.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="how-it-works">
    <div class="container">
        <div class="section-title">
            <h2>How SkillSync Works</h2>
            <p>Get started in 4 simple steps</p>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h4>Create Account</h4>
                    <p>Sign up with your university email and create your profile</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h4>Add Skills</h4>
                    <p>List skills you can teach and skills you want to learn</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h4>Find Matches</h4>
                    <p>Search for partners or get automatic match suggestions</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="step-card">
                    <div class="step-number">4</div>
                    <h4>Start Learning</h4>
                    <p>Connect, schedule sessions, and exchange skills</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular Skills Section -->
<section class="features">
    <div class="container">
        <div class="section-title">
            <h2>Popular Skills on SkillSync</h2>
            <p>Join thousands learning and teaching these in-demand skills</p>
        </div>
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-3">
                <span class="badge bg-primary p-3">🐍 Python</span>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <span class="badge bg-success p-3">🎨 Graphic Design</span>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <span class="badge bg-info p-3">📊 Data Science</span>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <span class="badge bg-warning p-3">🗣️ Public Speaking</span>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <span class="badge bg-danger p-3">💻 Web Dev</span>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <span class="badge bg-secondary p-3">📱 Mobile Dev</span>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <span class="badge bg-dark p-3">🎵 Music</span>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <span class="badge bg-primary p-3">🌐 Languages</span>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials">
    <div class="container">
        <div class="section-title">
            <h2 style="color: white;">What Our Users Say</h2>
            <p style="color: rgba(255,255,255,0.8);">Real stories from real students</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="testimonial-card">
                    <i class="fas fa-quote-left"></i>
                    <p class="testimonial-text">"SkillSync helped me learn Python from a senior student. Now I'm teaching web development to others!"</p>
                    <p class="testimonial-author">- Sarah Ahmed, CS Student</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card">
                    <i class="fas fa-quote-left"></i>
                    <p class="testimonial-text">"I wanted to improve my public speaking. Found a mentor here and now I'm much more confident!"</p>
                    <p class="testimonial-author">- Bilal Khan, Business Student</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card">
                    <i class="fas fa-quote-left"></i>
                    <p class="testimonial-text">"Best platform for skill exchange. I learned graphic design and taught programming. Win-win!"</p>
                    <p class="testimonial-author">- Ayesha Malik, Design Student</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h3>Ready to Start Your Learning Journey?</h3>
        <p>Join thousands of students already exchanging skills on SkillSync</p>
        <button class="btn btn-cta" onclick="showRegisterModal()">
            <i class="fas fa-user-plus"></i> Create Free Account
        </button>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5><i class="fas fa-exchange-alt"></i> SkillSync</h5>
                <p>Connecting university students to learn and teach skills. No paid courses, just pure knowledge sharing.</p>
                <div class="social-icons">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin"></i>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-4">
                <h5>Popular Skills</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Programming</a></li>
                    <li><a href="#">Design</a></li>
                    <li><a href="#">Languages</a></li>
                    <li><a href="#">Business</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-4">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-envelope"></i> support@skillsync.com</li>
                    <li><i class="fas fa-map-marker-alt"></i> University Campus</li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2024 SkillSync. All rights reserved. Empowering students through skill sharing.</p>
        </div>
    </div>
</footer>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient text-white">
                <h5 class="modal-title">Welcome Back to SkillSync!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    <div class="mb-3">
                        <label>Email address</label>
                        <input type="email" class="form-control" id="loginEmail" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" id="loginPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <div id="loginMessage" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient text-white">
                <h5 class="modal-title">Join SkillSync Today!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="registerForm">
                    <div class="mb-3">
                        <label>Full Name</label>
                        <input type="text" class="form-control" id="regName" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" id="regEmail" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" id="regPassword" required>
                    </div>
                    <div class="mb-3">
                        <label>Department</label>
                        <input type="text" class="form-control" id="regDepartment" required>
                    </div>
                    <div class="mb-3">
                        <label>Semester</label>
                        <input type="number" class="form-control" id="regSemester" min="1" max="8" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
                <div id="registerMessage" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function showLoginModal() {
    $('#loginModal').modal('show');
}

function showRegisterModal() {
    $('#registerModal').modal('show');
}

$('#loginForm').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        url: 'api/login.php',
        method: 'POST',
        data: {
            email: $('#loginEmail').val(),
            password: $('#loginPassword').val()
        },
        success: function(response) {
            if (response.success) {
                localStorage.setItem('user_id', response.user_id);
                localStorage.setItem('user_name', response.user_name);
                window.location.href = 'dashboard.html';
            } else {
                $('#loginMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
            }
        }
    });
});

$('#registerForm').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        url: 'api/register.php',
        method: 'POST',
        data: {
            name: $('#regName').val(),
            email: $('#regEmail').val(),
            password: $('#regPassword').val(),
            department: $('#regDepartment').val(),
            semester: $('#regSemester').val()
        },
        success: function(response) {
            if (response.success) {
                $('#registerMessage').html('<div class="alert alert-success">Registration successful! Please login.</div>');
                $('#registerForm')[0].reset();
                $('#registerModal').modal('hide');
                $('#loginModal').modal('show');
            } else {
                $('#registerMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
            }
        }
    });
});
</script>
</body>
</html>