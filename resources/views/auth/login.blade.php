<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-plus-jakarta-sans">
    <div class="header p-2 w-full bg-theme-primary lg:flex text-center gap-5  pb-5">
        <div class="img flex lg:justify-start justify-center w-full">
            <img class="lg:w-32 w-20" src="{{ asset('images/logo') }}/logo-white.jpg" alt="">
        </div>
        <div class="container mx-auto w-full">
            <div class="flex gap-5">
                <div class="content w-full text-white text-center space-y-3 mt-3">
                    <h2 class="text-2xl font-bold tracking-tighter">Rumah Sakit Umum Srikandi IBI Jember</h2>
                    <div class="content text-sm">
                        <p>Jl. KH Agus Salim No.20, Tegal Besar Kulon, Tegal Besar</p>
                        <p>Kec. Kaliwates, Kabupaten Jember, Jawa Timur 68132</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full"></div>
    </div>
    <div class="form text-center">
        <div class="max-w-7xl mt-[10vh] lg:p-0 p-8  mx-auto">
            <h2 class="lg:text-5xl text-3xl font-bold tracking-tighter">Selamat Datang Di Sistem Informasi Pelaporan Indikator Pelayanan Rumah Sakit</h2>
        </div>
        <form method="POST" action="{{ route('login') }}" class="mt-[10vh] space-y-8">
            @csrf
            <div class="text-center space-y-4">
                <h2 class="text-4xl font-bold">Login</h2>
                <p class="text-lg">Sign in to continue.</p>
            </div>
            <div class="gap-5 container flex w-full justify-center mx-auto">
                <div class="space-y-5 w-64 mx-auto">
                    <div class="input-box text-left space-y-3 w-full">
                        <label for="email" class="uppercase block font-semibold tracking-widest">Username</label>
                        <input  placeholder=""  type="email" name="email" class="border border-black  p-3 w-full" required>
                    </div>
                    <div class="input-box text-left space-y-3 w-full">
                        <label for="password" class="uppercase block font-semibold tracking-widest">Password</label>
                        <input type="password" id="password" name="password" placeholder="*******" class="border border-black p-3 w-full" required>
                    </div>
                    <button class="bg-[#906236] px-10 py-2 text-lg text-white">Login</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>