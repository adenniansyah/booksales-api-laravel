<!DOCTYPE html>
<html>
<head>
    <title>Data Author Buku</title>
</head>
<body>
    <h2>Daftar Penulis (Author) Buku</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Penulis</th>
        </tr>
        <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($author['id']); ?></td>
            <td><?php echo e($author['nama']); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <br>
    <a href="/genre">Lihat Data Genre</a>
</body>
</html><?php /**PATH C:\xampp\htdocs\booksales-api\resources\views/author.blade.php ENDPATH**/ ?>