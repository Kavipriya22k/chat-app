<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: #eef1f5;
}

/* FULL HEIGHT LAYOUT */
.page-wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* HERO */
.hero {
    position: relative;
    background: linear-gradient(135deg, #2563eb, #7c3aed);
    color: white;
    padding: 30px 20px;
}
.hero {
    padding: 40px 20px; /* increased from 30px */
}

/* LOGO LEFT */
.logo {
    position: absolute;
    left: 20px;
    top: 25px;
    height: 50px;
}

/* TRUE CENTER (ignores logo) */
.hero-center {
    text-align: center;
}

/* ABOUT FULL WIDTH + MORE SPACE */
.about-section {
    flex: 1;
    padding: 50px 80px;
    background: #ffffff;
}
.about-list {
    padding-left: 20px;
}

.about-list li {
    margin-bottom: 12px;
    line-height: 1.6;
}

/* SAME BACKGROUND CONTINUATION */
.actions {
    text-align: center;
    padding: 30px;
    background: #ffffff;
}
.btn-lg {
    border-radius: 8px;
    transition: 0.3s;
}

.btn-lg:hover {
    transform: translateY(-2px);
}
.footer {
    text-align: center;
    padding: 25px;
    background: #ffffff;
    border-top: 1px solid #eee;
}
.welcome-text {
    font-size: 20px;
    font-weight: 600;
    letter-spacing: 0.5px;
}
.footer i {
    margin: 0 10px;
    cursor: pointer;
}

.copy {
    font-size: 13px;
    margin-top: 10px;
    color: gray;
}
</style>


<div class="page-wrapper">

    <!-- HERO -->
    <div class="hero">

        <!-- LOGO LEFT -->
        <img src="<?php echo base_url('assets/logo.webp'); ?>" class="logo">

        <!-- CENTER TEXT (FULL WIDTH CENTERED) -->
        <div class="hero-center">
    <h3 class="mb-1 font-weight-bold">SMART GLADIATOR INDIA</h3>
    <small style="opacity:0.9;">A Subsidiary of Smart Gladiator, USA</small>

    <p class="mt-3 mb-0 welcome-text">
    Welcome, <?php echo $this->session->userdata('user_name'); ?>!!
</p>
</div>

    </div>

    <!-- ABOUT -->
    <div class="about-section">

    <h5 class="text-primary mb-4">About Smart Gladiator</h5>

    <ul class="about-list">

        <li>
            Smart Gladiator India is a technology-driven company specializing in 
            performance testing, cloud solutions, and scalable digital systems.
        </li>

        <li>
            As a subsidiary of Smart Gladiator, USA, it delivers innovative tools 
            and platforms for modern businesses.
        </li>

        <li>
            Its flagship product <strong>LoadProof</strong> enables powerful 
            real-world performance testing and scalability.
        </li>

        <li>
            This project demonstrates a real-time chat system built using 
            CodeIgniter (MVC), AJAX, and MySQL.
        </li>

        <li>
            🌐 
            <a href="https://smartgladiator.com" target="_blank">smartgladiator.com</a> |
            <a href="https://www.loadproof.com" target="_blank">loadproof.com</a>
        </li>

    </ul>

</div>

    <!-- ACTIONS -->
    <div class="actions">

    <a href="<?php echo base_url('chat'); ?>" class="btn btn-primary btn-lg m-2 px-4">
        <i class="fas fa-comments"></i> Open Chat
    </a>

    <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-danger btn-lg m-2 px-4">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>

</div>

    <div class="footer">

    <p>Connect with Smart Gladiator</p>

    <!-- LINKEDIN -->
    <a href="https://www.linkedin.com/company/smartgladiator/posts/?feedView=all" target="_blank">
        <i class="fab fa-linkedin fa-lg"></i>
    </a>

    <!-- WEBSITE -->
    <a href="https://smartgladiator.com" target="_blank">
        <i class="fas fa-globe fa-lg"></i>
    </a>

    <!-- LOADPROOF -->
    <a href="https://www.loadproof.com" target="_blank">
        <i class="fas fa-server fa-lg"></i>
    </a>

    <p class="copy">© <?php echo date('Y'); ?> Smart Gladiator India</p>

</div>
</div>