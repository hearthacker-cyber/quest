<?php
// Define a variable to indicate the active page for the header
$active_page = 'blog';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUEST Blog - Insights on Learning & Growth</title>
    <!-- Include Bootstrap, Font Awesome, and AOS from index.php -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <style>
        /* Custom Styles for the Blog Page to ensure visual appeal */

        /* Hero Section Styling */
        .blog-hero-section {
            background: linear-gradient(135deg, var(--accent-purple) 0%, #301934 100%);
            color: white;
            padding: 8rem 0 4rem 0; /* Adjusted padding to accommodate the fixed navbar */
            min-height: 50vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .blog-hero-title {
            font-size: 3rem;
            font-weight: 700;
        }

        /* Blog Card Styling */
        .blog-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .blog-card img {
            height: 200px; /* Fixed height for image consistency */
            object-fit: cover;
            width: 100%;
        }

        .blog-card-body {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .blog-card-title {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .blog-card-meta {
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }

        .read-more-link {
            color: var(--primary-yellow);
            font-weight: 500;
            text-decoration: none;
            transition: color 0.3s;
        }

        .read-more-link:hover {
            color: var(--primary-color);
        }

        /* Lottie Container */
        .lottie-container {
            max-width: 400px;
            height: 300px;
            margin: auto;
        }
    </style>
</head>
<body>
    <!-- Include Header and pass the active page variable -->
    <?php include_once('layouts/header.php');?>

    <!-- Blog Hero Section with Lottie Animation -->
    <section class="blog-hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="blog-hero-title">
                        Insights, Tips & The Future of Learning
                    </h1>
                    <p class="lead mt-3">
                        Stay informed with articles on critical thinking, educational psychology, and parenting strategies for academic success.
                    </p>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                    <!-- Lottie Animation Container -->
                    <div id="blog-lottie" class="lottie-container"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Posts Grid Section -->
    <section id="blog-posts" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Latest Articles</h2>
                    <p class="section-subtitle">A curated collection of resources for parents and students</p>
                </div>
            </div>

            <div class="row">
                <!-- Blog Post 1: Critical Thinking -->
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="card blog-card">
                        <img src="https://images.unsplash.com/photo-1510511232890-ba356dd09d84?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Critical Thinking">
                        <div class="blog-card-body">
                            <div>
                                <h5 class="blog-card-title">5 Ways to Boost Critical Thinking in Young Children</h5>
                                <p class="blog-card-meta">By Sarah Lee | Sep 20, 2023 | Education</p>
                                <p class="card-text">Simple daily activities and questions you can use to encourage your child to analyze problems and think creatively.</p>
                            </div>
                            <a href="#" class="read-more-link mt-3">Read Full Article <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Blog Post 2: Adaptive Learning -->
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="150">
                    <div class="card blog-card">
                        <img src="https://images.unsplash.com/photo-1588196749597-9db8a706be22?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Adaptive Learning">
                        <div class="blog-card-body">
                            <div>
                                <h5 class="blog-card-title">The Power of Adaptive Practice: Learning at the Right Pace</h5>
                                <p class="blog-card-meta">By Dr. Alex Stone | Sep 15, 2023 | Technology</p>
                                <p class="card-text">Understanding how personalized difficulty adjusts to maximize retention and minimize frustration in students.</p>
                            </div>
                            <a href="#" class="read-more-link mt-3">Read Full Article <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Blog Post 3: Time Management -->
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card blog-card">
                        <img src="https://images.unsplash.com/photo-1549419163-d143c683713d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Time Management">
                        <div class="blog-card-body">
                            <div>
                                <h5 class="blog-card-title">Preparing for Tests: Mastering Time Management with QUEST</h5>
                                <p class="blog-card-meta">By QUEST Team | Sep 10, 2023 | Tips & Tricks</p>
                                <p class="card-text">Effective strategies for using timed tests to build confidence and ensure speed without sacrificing accuracy.</p>
                            </div>
                            <a href="#" class="read-more-link mt-3">Read Full Article <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Blog Post 4: Digital Citizenship -->
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="card blog-card">
                        <img src="https://images.unsplash.com/photo-1553877542-e1d5a7d6928e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Digital Citizenship">
                        <div class="blog-card-body">
                            <div>
                                <h5 class="blog-card-title">Digital Safety and Learning: A Parent's Guide</h5>
                                <p class="blog-card-meta">By Anna Green | Sep 5, 2023 | Parenting</p>
                                <p class="card-text">Best practices for monitoring your child's online learning experience and promoting good digital citizenship.</p>
                            </div>
                            <a href="#" class="read-more-link mt-3">Read Full Article <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Blog Post 5: Motivation -->
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="150">
                    <div class="card blog-card">
                        <img src="https://images.unsplash.com/photo-1543269865-c337424075b6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Motivation">
                        <div class="blog-card-body">
                            <div>
                                <h5 class="blog-card-title">Keeping the Learning Flame Alive: Boosting Student Motivation</h5>
                                <p class="blog-card-meta">By Emily Carter | Aug 28, 2023 | Education</p>
                                <p class="card-text">Tips and psychological insights to help students maintain curiosity and engagement throughout the academic year.</p>
                            </div>
                            <a href="#" class="read-more-link mt-3">Read Full Article <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Blog Post 6: Study Habits -->
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card blog-card">
                        <img src="https://images.unsplash.com/photo-1524178232363-1fb2b7be69a7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Study Habits">
                        <div class="blog-card-body">
                            <div>
                                <h5 class="blog-card-title">The Secret to Success: Establishing Effective Study Habits</h5>
                                <p class="blog-card-meta">By Chris Jordan | Aug 22, 2023 | Tips & Tricks</p>
                                <p class="card-text">A step-by-step guide for parents to help their children create and stick to a productive study routine.</p>
                            </div>
                            <a href="#" class="read-more-link mt-3">Read Full Article <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-center">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

   <!-- Include Footer -->
   <?php include_once('layouts/footer.php');?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Lottie Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.10.2/lottie.min.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Initialize Lottie Animation in the Hero Section
        const blogLottie = lottie.loadAnimation({
            container: document.getElementById('blog-lottie'), // the DOM element that will contain the animation
            renderer: 'svg',
            loop: true,
            autoplay: true,
            // A placeholder URL for a Lottie animation related to learning/reading/ideas
            path: 'https://lottie.host/9f50f968-07e5-4f33-8a9d-54152861c470/6Kq76j2yYw.json' 
        });

        // Navbar scroll effect - (Copied from home.js to ensure functionality on this page)
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.querySelector('.navbar').classList.add('scrolled');
            } else {
                document.querySelector('.navbar').classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
