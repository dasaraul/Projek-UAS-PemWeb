<div class="navbar">
    <a href="index.php">Beranda</a>
    <a href="list_pelanggan.php">Daftar Pelanggan</a>
    <a href="list_order.php">Daftar Order</a>
    <a href="list_reservasi.php">Daftar Reservasi</a>
    <a href="list_menu.php">Daftar Menu</a>
    <a href="list_order_item.php">Item Order</a>
    <a href="list_kategori.php">Kategori</a>
    <?php if (isset($_SESSION['loggedin'])): ?>
        <a href="logout.php">Keluar</a>
    <?php else: ?>
        <a href="login.php">Masuk</a>
    <?php endif; ?>
</div>
