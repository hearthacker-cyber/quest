<!-- File: blog.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - QUEST Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/blog.css">
</head>
<body>
    <?php include_once('layouts/header.php'); ?>

    <!-- Blog Hero Section -->
    <section class="blog-hero-section">
        <div class="floating-elements">
            <div class="floating-element" style="width: 50px; height: 50px; top: 10%; left: 10%; animation-delay: 0s;"></div>
            <div class="floating-element" style="width: 30px; height: 30px; top: 20%; left: 80%; animation-delay: 2s;"></div>
            <div class="floating-element" style="width: 70px; height: 70px; top: 60%; left: 5%; animation-delay: 4s;"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="blog-hero-title">QUEST <span style="color: var(--primary-yellow)">Blog</span></h1>
                    <p class="blog-hero-subtitle">Discover insights, tips, and strategies to enhance your child's learning journey with our educational resources.</p>
                    <div class="blog-search mt-4">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search articles...">
                            <button class="btn btn-warning" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                    <div class="blog-hero-animation">
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player 
                            src="https://assets1.lottiefiles.com/packages/lf20_iv4dsx3q.json" 
                            background="transparent" 
                            speed="1" 
                            style="width: 100%; max-width: 400px; height: auto;" 
                            loop 
                            autoplay>
                        </lottie-player>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Posts Section -->
    <section class="featured-posts py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Featured Articles</h2>
                    <p class="section-subtitle">Top educational insights and learning strategies</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="featured-post-card">
                        <div class="post-image">
                            <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Critical Thinking">
                            <div class="post-category">Learning Strategies</div>
                        </div>
                        <div class="post-content">
                            <h3>5 Ways to Develop Critical Thinking in Children</h3>
                            <p>Discover practical strategies to help your child develop essential critical thinking skills through everyday activities and games.</p>
                            <div class="post-meta">
                                <span><i class="far fa-calendar"></i> March 15, 2024</span>
                                <span><i class="far fa-clock"></i> 5 min read</span>
                            </div>
                            <a href="#" class="btn btn-primary mt-3">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="featured-post-card">
                        <div class="post-image">
                            <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Adaptive Learning">
                            <div class="post-category">Technology</div>
                        </div>
                        <div class="post-content">
                            <h3>The Power of Adaptive Learning Technology</h3>
                            <p>How adaptive learning platforms are revolutionizing education by personalizing the learning experience for each student.</p>
                            <div class="post-meta">
                                <span><i class="far fa-calendar"></i> March 12, 2024</span>
                                <span><i class="far fa-clock"></i> 7 min read</span>
                            </div>
                            <a href="#" class="btn btn-primary mt-3">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="featured-post-card">
                        <div class="post-image">
                            <img src="https://images.unsplash.com/photo-1516627145497-ae69578cfc06?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Problem Solving">
                            <div class="post-category">Parenting Tips</div>
                        </div>
                        <div class="post-content">
                            <h3>Building Problem-Solving Skills Through Play</h3>
                            <p>Learn how to transform playtime into valuable learning opportunities that develop strong problem-solving abilities.</p>
                            <div class="post-meta">
                                <span><i class="far fa-calendar"></i> March 8, 2024</span>
                                <span><i class="far fa-clock"></i> 4 min read</span>
                            </div>
                            <a href="#" class="btn btn-primary mt-3">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Categories Section -->
    <section class="blog-categories py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Browse by Category</h2>
                    <p class="section-subtitle">Explore articles by topic</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="category-card">
                        <div class="category-icon">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_kuhijvxr.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 80px; height: 80px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <h4>Learning Strategies</h4>
                        <p>Effective methods and techniques</p>
                        <span class="post-count">12 Articles</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="category-card">
                        <div class="category-icon">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_5tkztbqk.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 80px; height: 80px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <h4>Parenting Tips</h4>
                        <p>Guidance for parents</p>
                        <span class="post-count">8 Articles</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="category-card">
                        <div class="category-icon">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_ydo2agll.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 80px; height: 80px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <h4>Educational Technology</h4>
                        <p>Tech tools and platforms</p>
                        <span class="post-count">15 Articles</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="category-card">
                        <div class="category-icon">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_u8jpp9sc.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 80px; height: 80px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <h4>Student Success</h4>
                        <p>Achievement stories</p>
                        <span class="post-count">10 Articles</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- All Blog Posts Section -->
    <section class="all-posts py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Latest Articles</h2>
                    <p class="section-subtitle">Stay updated with our newest content</p>
                </div>
            </div>
            <div class="row">
                <!-- Post 1 -->
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="blog-post-card">
                        <div class="post-image">
                            <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Math Skills">
                        </div>
                        <div class="post-content">
                            <div class="post-category">Math Skills</div>
                            <h3>Making Math Fun: Creative Approaches</h3>
                            <p>Transform math from a chore into an exciting adventure with these creative teaching methods.</p>
                            <div class="post-meta">
                                <span><i class="far fa-user"></i> Dr. Sarah Johnson</span>
                                <span><i class="far fa-calendar"></i> March 5, 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Post 2 -->
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="blog-post-card">
                        <div class="post-image">
                            <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Reading Habits">
                        </div>
                        <div class="post-content">
                            <div class="post-category">Reading</div>
                            <h3>Cultivating a Love for Reading</h3>
                            <p>How to help children develop strong reading habits that will benefit them throughout their lives.</p>
                            <div class="post-meta">
                                <span><i class="far fa-user"></i> Michael Chen</span>
                                <span><i class="far fa-calendar"></i> March 1, 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Post 3 -->
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="blog-post-card">
                        <div class="post-image">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Collaborative Learning">
                        </div>
                        <div class="post-content">
                            <div class="post-category">Collaboration</div>
                            <h3>The Benefits of Collaborative Learning</h3>
                            <p>Why working together helps students learn better and develop important social skills.</p>
                            <div class="post-meta">
                                <span><i class="far fa-user"></i> Emily Rodriguez</span>
                                <span><i class="far fa-calendar"></i> February 25, 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Post 4 -->
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="blog-post-card">
                        <div class="post-image">
                            <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="STEM Education">
                        </div>
                        <div class="post-content">
                            <div class="post-category">STEM</div>
                            <h3>Introducing STEM Concepts Early</h3>
                            <p>Simple ways to introduce science, technology, engineering, and math concepts to young learners.</p>
                            <div class="post-meta">
                                <span><i class="far fa-user"></i> Dr. James Wilson</span>
                                <span><i class="far fa-calendar"></i> February 20, 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Post 5 -->
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="blog-post-card">
                        <div class="post-image">
                            <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Creative Thinking">
                        </div>
                        <div class="post-content">
                            <div class="post-category">Creativity</div>
                            <h3>Fostering Creative Thinking in Children</h3>
                            <p>Activities and exercises that help children think outside the box and develop innovative solutions.</p>
                            <div class="post-meta">
                                <span><i class="far fa-user"></i> Lisa Thompson</span>
                                <span><i class="far fa-calendar"></i> February 15, 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Post 6 -->
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="blog-post-card">
                        <div class="post-image">
                            <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Digital Learning">
                        </div>
                        <div class="post-content">
                            <div class="post-category">Digital Learning</div>
                            <h3>Balancing Screen Time and Learning</h3>
                            <p>How to make the most of digital learning tools while maintaining healthy screen time habits.</p>
                            <div class="post-meta">
                                <span><i class="far fa-user"></i> Robert Martinez</span>
                                <span><i class="far fa-calendar"></i> February 10, 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-up">
                    <a href="#" class="btn btn-primary btn-lg">Load More Articles</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2>Stay Updated with QUEST</h2>
                    <p>Subscribe to our newsletter for the latest articles, tips, and educational insights delivered to your inbox.</p>
                    <div class="newsletter-animation">
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player 
                            src="https://assets1.lottiefiles.com/packages/lf20_5tkztbqk.json" 
                            background="transparent" 
                            speed="1" 
                            style="width: 100%; max-width: 200px; height: auto;" 
                            loop 
                            autoplay>
                        </lottie-player>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="newsletter-form">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Enter your email address">
                            <button class="btn btn-warning" type="button">Subscribe</button>
                        </div>
                        <p class="text-muted small">By subscribing, you agree to our Privacy Policy and consent to receive updates from our company.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('layouts/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="scripts/home.js"></script>
    <script src="scripts/blog.js"></script>
</body>
</html>