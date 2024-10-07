<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameZone.ML</title>
    <link rel="icon" href="images/logo.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="src/style.css">
    <!-- tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- pengecekan alert -->
    <?php if (isset($_GET['error']) == 'login_failed') {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal Login',
                text: 'Username atau Password yang dimasukkan salah!',
            }).then((result) => {
                // reset params
                if (result.isConfirmed) {
                    window.location.href = 'login.php';
                }
            })
        </script>
    <?php } else if (isset($_GET['success']) == 'register_success') { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Register Berhasil',
                text: 'Silahkan login menggunakan email dan password!',
            })
        </script>
    <?php } else if (isset($_GET['error']) == 'pass_not_match') { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal Konfirmasi Password',
                text: 'Password yang dimasukkan tidak cocok atau tidak sama!',
            })
        </script>
    <?php } else if (isset($_GET['reset']) == 'reset_success') { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Reset Password Berhasil',
                text: 'Silahkan login menggunakan email dan password yang baru!',
            })
        </script>
    <?php } else if (isset($_GET['reset']) == 'reset_failed') { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal reset Password',
                text: 'Email yang dimasukkan tidak terdaftar!',
            })
        </script>
    <?php } ?>

    <section class="bg-image bg-cover bg-[#3b206b] bg-blend-multiply" style="background-image: url('images/bacground.jpg');">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="index.php" class="flex items-center mb-6 text-2xl font-semibold text-white ">
                <img class="h-8 mr-2" src="images/logo.png" alt="logo">
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                        Sign in to your account
                    </h1>
                    <form method="POST" action="services/handle_login.php" class="space-y-4 md:space-y-6">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-[#3b206b] focus:border-[#3b206b] block w-full p-2.5" placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-[#3b206b] focus:border-[#3b206b] block w-full p-2.5" required="">
                        </div>

                        <!-- forgot password -->
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">Forgot password? <button type="button" data-modal-target="forgot-modal" data-modal-toggle="forgot-modal" class="font-medium text-[#3b206b] hover:underline dark:text-primary-500">Reset password</button></p>

                        <button type="submit" class="w-full text-white bg-[#3b206b] hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign in</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Don’t have an account yet? <a href="register.php" class="font-medium text-[#3b206b] hover:underline dark:text-primary-500">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- modal -->
    <?php include 'pages/users/forgot_password.php' ?>
    <!-- flowbite js -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>