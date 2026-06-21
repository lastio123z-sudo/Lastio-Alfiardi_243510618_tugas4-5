<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Portofolio | TI UIR</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>

    <div class="space-bg"></div>

    <nav class="navbar">
        <div class="nav-logo">NEXUS<span>.TI</span></div>
        <ul class="nav-links">
            <li><a href="#hero">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#education">Education</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#todo-app">Tasks</a></li>
        </ul>
        <button id="theme-toggle" class="btn-theme">🌙 Mode</button>
    </nav>

    <main class="container">
        
        <section id="hero" class="hero-section glass-card">
            <div class="avatar-container">
                <div class="avatar-glow"></div>
                <img src="image/WhatsApp Image 2026-06-04 at 16.00.37.jpeg" alt="Developer Avatar" class="profile-img">
            </div>
            <div class="hero-text">
                <div class="badge-wrapper">
                    <span class="hero-badge">SOFTWARE ENGINEER</span>
                    <span class="pulse-dot"></span>
                </div>
                <h2>Halo Saya Lastio Alfiardi <span class="text-gradient">Mahasiswa TI</span></h2>
                <p>Mahasiswa Teknik Informatika Universitas Islam Riau. Mengintegrasikan estetika visual kelas tinggi dengan keandalan logika backend berbasis PHP & MySQL.</p>
            </div>
        </section>

        <article id="about" class="about-section">
            <h2 class="section-title">Tentang Saya</h2>
            <div class="card glass-card">
                <p class="about-text">Saya adalah mahasiswa Teknik Informatika yang berfokus pada pengembangan web dinamis. Memiliki ketertarikan kuat dalam membangun antarmuka pengguna (frontend) yang responsif menggunakan HTML5 dan CSS3, serta berpengalaman dalam mengintegrasikan sistem backend berbasis PHP dan MySQL untuk menciptakan solusi web yang fungsional.</p>
            </div>
        </article>

        <section id="education" class="edu-section">
            <h2 class="section-title">Riwayat Pendidikan</h2>
            <div class="card glass-card table-responsive">
                <table class="edu-table">
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Institusi</th>
                            <th>Kategori / Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-row-hover">
                            <td class="year-cell">2024 - Sekarang</td>
                            <td class="inst-cell">Universitas Islam Riau</td>
                            <td><span class="custom-badge badge-cyber">Teknik Informatika</span></td>
                        </tr>
                        <tr class="table-row-hover">
                            <td class="year-cell">2020 - 2023</td>
                            <td class="inst-cell">SMA Negeri Pintar Provinsi Riau</td>
                            <td><span class="custom-badge badge-mute">Sains / IPA</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <div class="main-grid">
            
            <section id="contact" class="contact-section">
                <h2 class="section-title">Hubungi Saya</h2>
                <div class="card glass-card">
                    <form action="proses_kontak.php" method="POST" class="contact-form">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" name="nama" placeholder="Masukkan nama Anda..." required>
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" id="email" name="email" placeholder="contoh@email.com" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Pesan Strategis</label>
                            <textarea id="message" name="pesan" rows="3" placeholder="Tulis pesan atau kolaborasi di sini..." required></textarea>
                        </div>
                        <button type="submit" name="kirim_pesan" class="btn-cyber-gold">Kirim Pesan</button>
                    </form>
                </div>
            </section>

            <section id="todo-app" class="todo-wrapper">
                <h2 class="section-title">My Tasks</h2>
                <div class="card glass-card">
                    <form action="proses_todo.php" method="POST" class="todo-input-group">
                        <input type="text" name="task_text" placeholder="Tulis task fokus hari ini..." required>
                        <button type="submit" name="add_task" class="btn-cyber-gold btn-add">Add</button>
                    </form>

                    <ul id="todo-list">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM todos ORDER BY id DESC");
                        while ($row = mysqli_fetch_assoc($query)) {
                            $item_class = ($row['completed'] == 1) ? 'completed' : 'normal';
                            $text_class = ($row['completed'] == 1) ? 'done' : '';
                        ?>
                            <li class="todo-item <?php echo $item_class; ?>">
                                <a href="proses_todo.php?toggle=<?php echo $row['id']; ?>&status=<?php echo $row['completed']; ?>" class="todo-text <?php echo $text_class; ?>">
                                    <?php echo htmlspecialchars($row['task_text']); ?>
                                </a>
                                <a href="proses_todo.php?delete=<?php echo $row['id']; ?>" class="todo-delete-btn">
                                    &times;
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </section>

        </div>

    </main>

    <footer class="main-footer">
        <p>&copy; 2026 Nexus Architecture. Engineered for Maximum Academic Grade.</p>
    </footer>

    <script>
        const themeToggle = document.getElementById('theme-toggle');
        
        if (localStorage.getItem('theme') === 'dark') {
            document.body.classList.add('dark');
            themeToggle.textContent = "☀️ Light";
        } else {
            themeToggle.textContent = "🌙 Dark";
        }

        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark');
            if(document.body.classList.contains('dark')) {
                themeToggle.textContent = "☀️ Light";
                localStorage.setItem('theme', 'dark');
            } else {
                themeToggle.textContent = "🌙 Dark";
                localStorage.setItem('theme', 'light');
            }
        });
    </script>
</body>
</html>