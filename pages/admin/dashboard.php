<?php
session_start();

if (!isset($_SESSION['login']) && !isset($_SESSION['email'])) {
    header("Location: ../../login.php");
    exit();
} else if ($_SESSION['role'] !== 'admin') {
    header("Location: ../../index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameZone.ML - Dashboard</title>
    <?php include 'components/style.php'; ?>
</head>

<body class="flex bg-gray-100">

    <?php include 'components/aside.php'; ?>

    <div class="flex flex-col w-full h-screen overflow-y-hidden">
        <!-- Header -->
        <?php include 'components/header.php'; ?>

        <div class="flex flex-col w-full overflow-x-hidden border-t">
            <main class="flex-grow w-full p-6">
                <h1 class="pb-6 text-3xl text-black">Dashboard</h1>
                <p>Welcome Admin, let's enjoy and get started.</p>

                <!-- <div class="flex flex-wrap mt-6">
                    <div class="w-full pr-0 lg:w-1/2 lg:pr-2">
                        <p class="flex items-center pb-3 text-xl">
                            <i class="mr-3 fas fa-plus"></i> Monthly Reports
                        </p>
                        <div class="p-6 bg-white">
                            <canvas id="chartOne" width="400" height="200"></canvas>
                        </div>
                    </div>
                    <div class="w-full pl-0 mt-12 lg:w-1/2 lg:pl-2 lg:mt-0">
                        <p class="flex items-center pb-3 text-xl">
                            <i class="mr-3 fas fa-check"></i> Resolved Reports
                        </p>
                        <div class="p-6 bg-white">
                            <canvas id="chartTwo" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>

                <div class="w-full mt-12">
                    <p class="flex items-center pb-3 text-xl">
                        <i class="mr-3 fas fa-list"></i> Latest Reports
                    </p>
                    <div class="overflow-auto bg-white">
                        <table class="min-w-full bg-white">
                            <thead class="text-white bg-gray-800">
                                <tr>
                                    <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Name</th>
                                    <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Last name</th>
                                    <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Phone</th>
                                    <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Email</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                <tr>
                                    <td class="w-1/3 px-4 py-3 text-left">Lian</td>
                                    <td class="w-1/3 px-4 py-3 text-left">Smith</td>
                                    <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                    <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                </tr>
                                <tr class="bg-gray-200">
                                    <td class="w-1/3 px-4 py-3 text-left">Emma</td>
                                    <td class="w-1/3 px-4 py-3 text-left">Johnson</td>
                                    <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                    <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                </tr>
                                <tr>
                                    <td class="w-1/3 px-4 py-3 text-left">Oliver</td>
                                    <td class="w-1/3 px-4 py-3 text-left">Williams</td>
                                    <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                    <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                </tr>
                                <tr class="bg-gray-200">
                                    <td class="w-1/3 px-4 py-3 text-left">Isabella</td>
                                    <td class="w-1/3 px-4 py-3 text-left">Brown</td>
                                    <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                    <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                </tr>
                                <tr>
                                    <td class="w-1/3 px-4 py-3 text-left">Lian</td>
                                    <td class="w-1/3 px-4 py-3 text-left">Smith</td>
                                    <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                    <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                </tr>
                                <tr class="bg-gray-200">
                                    <td class="w-1/3 px-4 py-3 text-left">Emma</td>
                                    <td class="w-1/3 px-4 py-3 text-left">Johnson</td>
                                    <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                    <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                </tr>
                                <tr>
                                    <td class="w-1/3 px-4 py-3 text-left">Oliver</td>
                                    <td class="w-1/3 px-4 py-3 text-left">Williams</td>
                                    <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                    <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                </tr>
                                <tr class="bg-gray-200">
                                    <td class="w-1/3 px-4 py-3 text-left">Isabella</td>
                                    <td class="w-1/3 px-4 py-3 text-left">Brown</td>
                                    <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                    <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> -->
            </main>

        </div>

    </div>

    <?php include 'components/js.php'; ?>
</body>

</html>