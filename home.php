<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
    <link rel="stylesheet" type="text/css" href="assets/style2.css">
</head>
<body>
    <header>
        <h1>Welcome to Jedybrown Ventures</h1>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php if (isset($_SESSION['login_success']) && $_SESSION['login_success']): ?>
            <p class="success-1">You have successfully logged in!</p>
            <?php unset($_SESSION['login_success']); ?>
        <?php endif; ?>
        <p id="success" class="success-1">Welcome Back Our Esteemed Customer</p>

        <h2>What I do as a Web Developer</h2>
        <p>Web developers create and maintain websites. They are also responsible for the site's technical aspects, such as its performance and capacity, which are measures of a website's speed and how much traffic the site can handle. In addition, web developers may create content for the site.</p>
        <p>   Web development is the process of building websites and applications for the internet, 
            or for a    private network known as an intranet.

            Web development is not concerned with the design of a website; rather, it’s all about the coding and programming that powers the website’s functionality.

            From the most simple, static web pages to social media platforms and apps, from e-commerce websites to content management systems (CMS)—all the tools we use via the internet on a daily basis have been built by developers.
        </p>
    </main>

    <footer>
        <p>Copyright © 2023 - Jedidiah Solomon</p>
    </footer>


    <script>
        // Hide the success message after 30 seconds
        setTimeout(welcomeMessage, 7000);

            function welcomeMessage() {
            let successMessage = document.getElementById('success');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }
    </script>
</body>
</html>
