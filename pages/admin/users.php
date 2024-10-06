<?php
session_start();
require '../../services/connect.php';

// cek apakah user sudah login
if (!isset($_SESSION['login']) && !isset($_SESSION['email'])) {
    header("Location: ../../login.php");
    exit();
} else if ($_SESSION['role'] !== 'admin') {
    header("Location: ../../index.php");
    exit();
}


// ambil data users
$sql_users = "SELECT * FROM user WHERE role = 'member'";
$users = $conn->query($sql_users);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameZone.ML - Users</title>
    <?php include 'components/style.php'; ?>
</head>

<body class="flex bg-gray-100">
    <!-- alert -->
    <?php if (isset($_GET['deleted']) == 'success_delete') { ?>
        <script>
            swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'User Berhasil Dihapus!',
            }).then((result) => {
                // reset params
                if (result.isConfirmed) {
                    window.location.href = 'users.php';
                }
            })
        </script>
    <?php } ?>

    <?php include 'components/aside.php' ?>

    <main class="relative w-full max-h-full p-4">
        <!-- Header -->
        <?php include 'components/header.php'; ?>


        <div class="w-full mt-12">
            <p class="flex items-center pb-3 text-xl">
                <i class="mr-3 fas fa-list"></i> Table of Users Member
            </p>
            <div class="overflow-auto bg-white">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                Name
                            </th>
                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                Email
                            </th>
                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                Role
                            </th>
                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <!-- user -->
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?= ucwords($user['name']) ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <!-- price -->
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap"><?= $user['email'] ?></p>
                                </td>
                                <!-- discount -->
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-yellow-500 whitespace-no-wrap">
                                        <?= $user['role'] ?>
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <a href="services/delete_user.php?id=<?= $user['id_user'] ?>" class="px-3 py-2 text-white bg-red-500 rounded hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php include 'components/js.php'; ?>
</body>

</html>