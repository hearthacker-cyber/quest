<?php
session_start();

// Database configuration
$servername = "srv1837.hstgr.io";
$username = "u329947844_quest";
$password = "Ariharan@2025";
$dbname = "u329947844_quest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch featured posts
function getFeaturedPosts($conn) {
    $sql = "SELECT bp.*, bc.name as category_name, au.name as author_name 
            FROM blog_posts bp 
            LEFT JOIN blog_categories bc ON bp.category_id = bc.id 
            LEFT JOIN admin_users au ON bp.author_id = au.id 
            WHERE bp.is_featured = 1 AND bp.status = 'published' 
            ORDER BY bp.created_at DESC 
            LIMIT 3";
    
    $result = $conn->query($sql);
    $posts = [];
    
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    }
    
    return $posts;
}

// Fetch all blog categories with post counts
function getBlogCategories($conn) {
    $sql = "SELECT bc.*, COUNT(bp.id) as post_count 
            FROM blog_categories bc 
            LEFT JOIN blog_posts bp ON bc.id = bp.category_id AND bp.status = 'published' 
            WHERE bc.status = 'active' 
            GROUP BY bc.id 
            ORDER BY bc.name";
    
    $result = $conn->query($sql);
    $categories = [];
    
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
    }
    
    return $categories;
}

// Fetch latest blog posts
function getLatestPosts($conn, $limit = 6) {
    $sql = "SELECT bp.*, bc.name as category_name, au.name as author_name 
            FROM blog_posts bp 
            LEFT JOIN blog_categories bc ON bp.category_id = bc.id 
            LEFT JOIN admin_users au ON bp.author_id = au.id 
            WHERE bp.status = 'published' 
            ORDER BY bp.created_at DESC 
            LIMIT ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $posts = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    }
    
    return $posts;
}

// Search blog posts
function searchBlogPosts($conn, $search_term) {
    $sql = "SELECT bp.*, bc.name as category_name, au.name as author_name 
            FROM blog_posts bp 
            LEFT JOIN blog_categories bc ON bp.category_id = bc.id 
            LEFT JOIN admin_users au ON bp.author_id = au.id 
            WHERE bp.status = 'published' 
            AND (bp.title LIKE ? OR bp.content LIKE ? OR bp.excerpt LIKE ?) 
            ORDER BY bp.created_at DESC";
    
    $stmt = $conn->prepare($sql);
    $search_pattern = "%$search_term%";
    $stmt->bind_param("sss", $search_pattern, $search_pattern, $search_pattern);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $posts = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    }
    
    return $posts;
}

// Get category icon based on category name
function getCategoryIcon($category_name) {
    $icons = [
        'Learning Strategies' => 'https://assets1.lottiefiles.com/packages/lf20_kuhijvxr.json',
        'Parenting Tips' => 'https://assets1.lottiefiles.com/packages/lf20_5tkztbqk.json',
        'Educational Technology' => 'https://assets1.lottiefiles.com/packages/lf20_ydo2agll.json',
        'Student Success' => 'https://assets1.lottiefiles.com/packages/lf20_u8jpp9sc.json',
        'Math Skills' => 'https://assets1.lottiefiles.com/packages/lf20_5tkztbqk.json',
        'Reading' => 'https://assets1.lottiefiles.com/packages/lf20_kuhijvxr.json',
        'STEM' => 'https://assets1.lottiefiles.com/packages/lf20_ydo2agll.json',
        'Creativity' => 'https://assets1.lottiefiles.com/packages/lf20_u8jpp9sc.json',
        'Collaboration' => 'https://assets1.lottiefiles.com/packages/lf20_5tkztbqk.json',
        'Digital Learning' => 'https://assets1.lottiefiles.com/packages/lf20_ydo2agll.json'
    ];
    
    return $icons[$category_name] ?? 'https://assets1.lottiefiles.com/packages/lf20_kuhijvxr.json';
}

// Get reading time from content
function getReadingTime($content) {
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // Average reading speed: 200 words per minute
    return max(1, $reading_time); // Minimum 1 minute
}

// Format date for display
function formatBlogDate($date_string) {
    return date('F j, Y', strtotime($date_string));
}

// Get data
$featured_posts = getFeaturedPosts($conn);
$categories = getBlogCategories($conn);
$latest_posts = getLatestPosts($conn, 6);

// Handle search
$search_results = [];
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_term = $conn->real_escape_string($_GET['search']);
    $search_results = searchBlogPosts($conn, $search_term);
}

// Close connection
$conn->close();
?>
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
                        <form method="GET" action="">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search articles..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                                <button class="btn btn-warning" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
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

    <?php if (isset($_GET['search']) && !empty($_GET['search'])): ?>
    <!-- Search Results Section -->
    <section class="search-results py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-4">Search Results for "<?php echo htmlspecialchars($_GET['search']); ?>"</h2>
                    <?php if (!empty($search_results)): ?>
                        <div class="row">
                            <?php foreach($search_results as $post): ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="blog-post-card">
                                    <div class="post-image">
                                        <img src="<?php echo htmlspecialchars($post['featured_image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>">
                                    </div>
                                    <div class="post-content">
                                        <div class="post-category"><?php echo htmlspecialchars($post['category_name']); ?></div>
                                        <h3><?php echo htmlspecialchars($post['title']); ?></h3>
                                        <p><?php echo htmlspecialchars($post['excerpt']); ?></p>
                                        <div class="post-meta">
                                            <span><i class="far fa-user"></i> <?php echo htmlspecialchars($post['author_name']); ?></span>
                                            <span><i class="far fa-calendar"></i> <?php echo formatBlogDate($post['created_at']); ?></span>
                                        </div>
                                        <a href="blog-post.php?id=<?php echo $post['id']; ?>" class="btn btn-primary mt-3">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-5">
                            <i class="fas fa-search fa-3x text-muted mb-3"></i>
                            <h4>No articles found</h4>
                            <p>Try different keywords or browse our categories.</p>
                            <a href="blog.php" class="btn btn-primary">View All Articles</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php else: ?>

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
                <?php if (!empty($featured_posts)): ?>
                    <?php foreach($featured_posts as $post): ?>
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $loop_index * 100; ?>">
                        <div class="featured-post-card">
                            <div class="post-image">
                                <img src="<?php echo htmlspecialchars($post['featured_image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>">
                                <div class="post-category"><?php echo htmlspecialchars($post['category_name']); ?></div>
                            </div>
                            <div class="post-content">
                                <h3><?php echo htmlspecialchars($post['title']); ?></h3>
                                <p><?php echo htmlspecialchars($post['excerpt']); ?></p>
                                <div class="post-meta">
                                    <span><i class="far fa-calendar"></i> <?php echo formatBlogDate($post['created_at']); ?></span>
                                    <span><i class="far fa-clock"></i> <?php echo getReadingTime($post['content']); ?> min read</span>
                                </div>
                                <a href="blog-post.php?id=<?php echo $post['id']; ?>" class="btn btn-primary mt-3">Read More</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <p>No featured articles available at the moment.</p>
                    </div>
                <?php endif; ?>
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
                <?php if (!empty($categories)): ?>
                    <?php foreach($categories as $category): ?>
                    <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $loop_index * 100; ?>">
                        <div class="category-card">
                            <div class="category-icon">
                                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                                <lottie-player 
                                    src="<?php echo getCategoryIcon($category['name']); ?>" 
                                    background="transparent" 
                                    speed="1" 
                                    style="width: 80px; height: 80px;" 
                                    loop 
                                    autoplay>
                                </lottie-player>
                            </div>
                            <h4><?php echo htmlspecialchars($category['name']); ?></h4>
                            <p><?php echo htmlspecialchars($category['description']); ?></p>
                            <span class="post-count"><?php echo $category['post_count']; ?> Articles</span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <p>No categories available.</p>
                    </div>
                <?php endif; ?>
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
                <?php if (!empty($latest_posts)): ?>
                    <?php foreach($latest_posts as $post): ?>
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $loop_index * 100; ?>">
                        <div class="blog-post-card">
                            <div class="post-image">
                                <img src="<?php echo htmlspecialchars($post['featured_image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>">
                            </div>
                            <div class="post-content">
                                <div class="post-category"><?php echo htmlspecialchars($post['category_name']); ?></div>
                                <h3><?php echo htmlspecialchars($post['title']); ?></h3>
                                <p><?php echo htmlspecialchars($post['excerpt']); ?></p>
                                <div class="post-meta">
                                    <span><i class="far fa-user"></i> <?php echo htmlspecialchars($post['author_name']); ?></span>
                                    <span><i class="far fa-calendar"></i> <?php echo formatBlogDate($post['created_at']); ?></span>
                                </div>
                                <a href="blog-post.php?id=<?php echo $post['id']; ?>" class="btn btn-primary mt-3">Read More</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <p>No articles available at the moment.</p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-up">
                    <a href="blog-archive.php" class="btn btn-primary btn-lg">View All Articles</a>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

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
                        <form id="newsletterForm">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Enter your email address" required>
                                <button class="btn btn-warning" type="submit">Subscribe</button>
                            </div>
                            <p class="text-muted small">By subscribing, you agree to our Privacy Policy and consent to receive updates from our company.</p>
                        </form>
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