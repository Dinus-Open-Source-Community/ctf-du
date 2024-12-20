<?php
include 'config.php';
include 'includes/db.php';

// Jika tidak ada parameter admin, redirect ke halaman yang sama dengan parameter admin=false
if(!isset($_GET['admin'])) {
    header('Location: index.php?admin=false');
    exit();
}

$isAdmin = $_GET['admin'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberSec Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <!-- Form tersembunyi untuk memastikan parameter admin tetap ada saat refresh -->
    <form id="adminForm" method="GET" style="display: none;">
        <input type="hidden" name="admin" value="<?php echo htmlspecialchars($isAdmin); ?>">
    </form>

    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">CyberSec Portfolio</h1>
            <div>
                <a href="#about" class="mx-2 hover:text-blue-400">About</a>
                <a href="#skills" class="mx-2 hover:text-blue-400">Skills</a>
                <a href="#projects" class="mx-2 hover:text-blue-400">Projects</a>
                <?php if($isAdmin === 'true'): ?>
                    <a href="admin.php?admin=<?php echo htmlspecialchars($isAdmin); ?>" class="mx-2 text-green-400 hover:text-green-300">Admin Panel</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
	
    <main class="container mx-auto px-4 py-8">
        <section id="about" class="mb-12">
            <h2 class="text-3xl font-bold mb-4">About Me</h2>
            <p class="text-gray-300">Experienced cybersecurity professional with a passion for ethical hacking and security research.</p>
        </section>

        <section id="skills" class="mb-12">
            <h2 class="text-3xl font-bold mb-4">Skills</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div class="bg-gray-800 p-4 rounded">
                    <h3 class="font-bold mb-2">Penetration Testing</h3>
                    <div class="w-full bg-gray-700 rounded">
                        <div class="bg-blue-500 rounded h-2" style="width: 90%"></div>
                    </div>
                </div>
                <div class="bg-gray-800 p-4 rounded">
                    <h3 class="font-bold mb-2">Web Security</h3>
                    <div class="w-full bg-gray-700 rounded">
                        <div class="bg-blue-500 rounded h-2" style="width: 85%"></div>
                    </div>
                </div>
                <div class="bg-gray-800 p-4 rounded">
                    <h3 class="font-bold mb-2">Network Security</h3>
                    <div class="w-full bg-gray-700 rounded">
                        <div class="bg-blue-500 rounded h-2" style="width: 95%"></div>
                    </div>
                </div>
            </div>
        </section>

        <section id="projects" class="mb-12">
            <h2 class="text-3xl font-bold mb-4">Projects</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-800 p-6 rounded">
                    <h3 class="text-xl font-bold mb-2">Security Audit Tool</h3>
                    <p class="text-gray-300">Developed an automated security assessment tool for web applications.</p>
                </div>
                <div class="bg-gray-800 p-6 rounded">
                    <h3 class="text-xl font-bold mb-2">CTF Challenges</h3>
                    <p class="text-gray-300">Created and hosted various CTF challenges for security competitions.</p>
                </div>
            </div>
        </section>
    </main>

    <script src="js/main.js"></script>
</body>
</html>

