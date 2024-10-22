<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    {{-- Title icon --}}
    <link rel="icon" type="image/png" href="{{ asset('../assets/img/PESOLOGO.png') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700&family=Rubik:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- SweetAlert2  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 2%;
        }

        .dropdown-toggle::after {
            display: none;
        }

        .dropdown-menu.dropdown-menu-adjust {
            margin-top: -15px;
        }

        .bgp-gradient {
            background: linear-gradient(90deg, rgba(77, 7, 99, 1) 0%, rgba(121, 9, 128, 1) 50%, rgba(189, 11, 186, 1) 100%);
            display: flex;
            align-items: center;
            color: white;
        }

        .bgp-danger {
            background: linear-gradient(90deg, rgba(139, 0, 0, 1) 100%, rgb(207, 74, 74) 50%, rgb(206, 150, 150) 0%);
            align-items: center;
            text-align: center;
            color: white;
        }

        .btn-gradient {
            background: linear-gradient(135deg, #ff512f, #dd2476);
            color: white;
            border: none;
            transition: background 0.3s ease;
            width: 70px;
            height: 70px;
            font-size: 1.1rem;

        }

        .btn-gradient:hover {
            background: linear-gradient(135deg, #dd2476, #ff512f);
        }

        .tooltip-container {
            position: relative;
            display: inline-block;
        }

        .tooltip-container button {
            position: relative;
            z-index: 2;
        }

        .tooltip-text {
            position: absolute;
            bottom: 1px;
            left: 50%;
            transform: translateX(-50%);
            visibility: hidden;
            opacity: 0;
            background-color: #c97474;
            color: #fff;
            padding: 5px 12px;
            border-radius: 5px;
            white-space: nowrap;
            font-size: 14px;
            transition: opacity 0.3s ease-in-out, visibility 0.3s;
            z-index: 3;
        }

        .tooltip-container:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }

        .tooltip-text::after {
            content: "";
            position: absolute;
            top: 100%;
        }
    </style>
</head>
