<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - QUEST Interactive Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/about.css">
</head>
<body>
  <?php include_once('layouts/header.php');?>

    <!-- About Hero Section -->
    <section class="about-hero-section">
        <div class="floating-elements">
            <div class="floating-element" style="width: 50px; height: 50px; top: 10%; left: 10%; animation-delay: 0s;"></div>
            <div class="floating-element" style="width: 30px; height: 30px; top: 20%; left: 80%; animation-delay: 2s;"></div>
            <div class="floating-element" style="width: 70px; height: 70px; top: 60%; left: 5%; animation-delay: 4s;"></div>
            <div class="floating-element" style="width: 40px; height: 40px; top: 70%; left: 70%; animation-delay: 6s;"></div>
            <div class="floating-element" style="width: 60px; height: 60px; top: 40%; left: 90%; animation-delay: 8s;"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content" data-aos="fade-right">
                    <h1 class="hero-title">Our Mission: <span style="color: var(--primary-yellow)">Transforming Education</span></h1>
                    <p class="hero-subtitle">At QUEST, we believe every child deserves access to quality education that nurtures critical thinking, creativity, and problem-solving skills.</p>
                    <div class="hero-buttons mt-4">
                        <a href="signup.php" class="btn btn-warning me-3">Join Our Community</a>
                        <a href="#story" class="btn btn-outline-light">Our Story</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                    <div class="hero-image">
                        <!-- Lottie Animation -->
                        <lottie-player 
                            src="https://assets1.lottiefiles.com/packages/lf20_iv4dsx3q.json" 
                            background="transparent" 
                            speed="1" 
                            style="width: 100%; height: 400px;" 
                            loop 
                            autoplay>
                        </lottie-player>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section id="story" class="story-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Our Story</h2>
                    <p class="section-subtitle">From a simple idea to a transformative learning platform</p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4" data-aos="fade-right">
                    <div class="story-content">
                        <h3 class="mb-4">The Journey of QUEST</h3>
                        <p class="mb-4">Founded in 2018 by a team of educators and technologists, QUEST was born from a shared frustration with traditional educational approaches that failed to engage students and develop essential critical thinking skills.</p>
                        <p class="mb-4">We noticed that students were memorizing facts rather than understanding concepts, and standardized testing was prioritizing speed over depth of understanding.</p>
                        <p>Our team spent two years researching, developing, and testing our adaptive learning methodology before launching the first version of QUEST. Today, we serve thousands of students across the country, helping them unlock their full potential.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                    <!-- Lottie Animation -->
                    <lottie-player 
                        src="https://assets2.lottiefiles.com/packages/lf20_gn0tojcq.json" 
                        background="transparent" 
                        speed="1" 
                        style="width: 100%; height: 400px;" 
                        loop 
                        autoplay>
                    </lottie-player>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Our Values</h2>
                    <p class="section-subtitle">The principles that guide everything we do</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="value-card">
                        <div class="value-icon">
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_6wutsrox.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 100px; height: 100px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <h4>Student-Centered Learning</h4>
                        <p>Every decision we make prioritizes student growth, engagement, and long-term success. We adapt to individual learning styles and paces.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="value-card">
                        <div class="value-icon">
                            <lottie-player 
                                src="https://assets2.lottiefiles.com/packages/lf20_ukgqni0r.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 100px; height: 100px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <h4>Innovation & Excellence</h4>
                        <p>We continuously research and implement the latest educational methodologies and technologies to deliver exceptional learning experiences.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="value-card">
                        <div class="value-icon">
                            <lottie-player 
                                src="https://assets2.lottiefiles.com/packages/lf20_ciwgpvwe.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 100px; height: 100px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <h4>Accessibility & Inclusion</h4>
                        <p>We believe quality education should be accessible to all students, regardless of background, learning differences, or socioeconomic status.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Meet Our Team</h2>
                    <p class="section-subtitle">Passionate educators and innovators dedicated to transforming learning</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="team-card">
                        <div class="team-image">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" alt="Dr. Sarah Johnson">
                        </div>
                        <div class="team-info">
                            <h4>Dr. Sarah Johnson</h4>
                            <p class="team-role">Founder & CEO</p>
                            <p class="team-bio">Former education professor with 15+ years in curriculum development</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-card">
                        <div class="team-image">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" alt="Michael Chen">
                        </div>
                        <div class="team-info">
                            <h4>Michael Chen</h4>
                            <p class="team-role">CTO</p>
                            <p class="team-bio">Software engineer specializing in adaptive learning algorithms</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-card">
                        <div class="team-image">
                            <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" alt="Emily Rodriguez">
                        </div>
                        <div class="team-info">
                            <h4>Emily Rodriguez</h4>
                            <p class="team-role">Head of Education</p>
                            <p class="team-bio">Curriculum specialist with expertise in cognitive development</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-card">
                        <div class="team-image">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" alt="David Kim">
                        </div>
                        <div class="team-info">
                            <h4>David Kim</h4>
                            <p class="team-role">Product Designer</p>
                            <p class="team-bio">UX/UI expert focused on creating engaging learning experiences</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Section -->
    <section class="impact-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Our Impact</h2>
                    <p class="section-subtitle">Making a difference in students' lives</p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4" data-aos="fade-right">
                    <div class="impact-stats">
                        <div class="row text-center">
                            <div class="col-md-4 col-6 mb-4">
                                <div class="impact-stat">
                                    <div class="stat-number">94%</div>
                                    <div class="stat-label">Improved Test Scores</div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 mb-4">
                                <div class="impact-stat">
                                    <div class="stat-number">87%</div>
                                    <div class="stat-label">Increased Engagement</div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 mb-4">
                                <div class="impact-stat">
                                    <div class="stat-number">5K+</div>
                                    <div class="stat-label">Students Served</div>
                                </div>
                            </div>
                        </div>
                        <div class="impact-content mt-4">
                            <h4 class="mb-3">Real Results, Real Impact</h4>
                            <p>Our data-driven approach has shown significant improvements in student outcomes across all grade levels. Students using QUEST demonstrate:</p>
                            <ul>
                                <li>Enhanced critical thinking skills</li>
                                <li>Improved problem-solving abilities</li>
                                <li>Greater confidence in academic challenges</li>
                                <li>Increased motivation to learn</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                    <!-- Lottie Animation -->
                    <lottie-player 
                        src="https://assets8.lottiefiles.com/packages/lf20_vybwn7df.json" 
                        background="transparent" 
                        speed="1" 
                        style="width: 100%; height: 400px;" 
                        loop 
                        autoplay>
                    </lottie-player>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="floating-shapes">
            <div class="shape" style="width: 100px; height: 100px; top: 10%; left: 5%; background: var(--primary-yellow); border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; animation-delay: 0s;"></div>
            <div class="shape" style="width: 150px; height: 150px; top: 20%; left: 80%; background: white; border-radius: 50%; animation-delay: 5s;"></div>
            <div class="shape" style="width: 80px; height: 80px; top: 60%; left: 10%; background: var(--accent-purple); border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; animation-delay: 10s;"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 cta-content" data-aos="fade-right">
                    <h2 class="mb-3">Join Our Educational Revolution</h2>
                    <p class="mb-4">Become part of a community dedicated to transforming how children learn and think.</p>
                </div>
                <div class="col-lg-4 text-lg-end" data-aos="fade-left" data-aos-delay="200">
                    <a href="signup.php" class="btn btn-warning btn-lg">Start Free Trial</a>
                </div>
            </div>
        </div>
    </section>

   <?php include_once('layouts/footer.php');?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="scripts/home.js"></script>
    <script src="scripts/about.js"></script>
</body>
</html>