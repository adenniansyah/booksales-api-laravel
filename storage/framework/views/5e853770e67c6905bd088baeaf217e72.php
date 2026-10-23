<!DOCTYPE html>
<html>
<head>
    <title>Data Genre Buku</title>
</head>
<body>
    <h2>Daftar Genre Buku</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Genre</th>
        </tr>
        <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($genre['id']); ?></td>
            <td><?php echo e($genre['nama']); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <br>
    <a href="/author">Lihat Data Author</a>
</body>
</html><?php /**PATH C:\xampp\htdocs\booksales-api\resources\views/genre.blade.php ENDPATH**/ ?>