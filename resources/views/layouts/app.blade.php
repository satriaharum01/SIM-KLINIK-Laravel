<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta10
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{config('app.name')}} - Login</title>
    <!-- CSS files -->
    <link href="<?= asset('/dist/css/tabler.min.css') ?>" rel="stylesheet" />
    <link href="<?= asset('/dist/css/tabler-flags.min.css') ?>" rel="stylesheet" />
    <link href="<?= asset('/dist/css/tabler-payments.min.css') ?>" rel="stylesheet" />
    <link href="<?= asset('/dist/css/tabler-vendors.min.css') ?>" rel="stylesheet" />
    <link href="<?= asset('/dist/css/demo.min.css') ?>" rel="stylesheet" />
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container-tight py-4">
            @yield('content')
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= asset('/dist/js/tabler.min.js') ?>" defer></script>
    <script src="<?= asset('/dist/js/demo.min.js') ?>" defer></script>
</body>

</html>