<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    {{-- Bootstrap --}}
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])


    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .overlay {
            background-color: rgb(0 0 0 / 45%);
            z-index: 99;
        }

        /* sidebar for small screens */
        @media screen and (max-width: 767px) {

            .sidebar {
                max-width: 18rem;
                transform: translateX(-100%);
                transition: transform 0.4s ease-out;
            }

            .sidebar.active {
                transform: translateX(0);
            }

        }

        .table-striped>tbody>tr:nth-of-type(odd)>* {
            --bs-table-bg-type: #f3f4f6;
        }

        .form-control:focus, 
        .form-select:focus {
            border-color: transparent;
            box-shadow: 0 0 0 .1rem #3d8bfffa;
        } 

    </style>

</head>

<body>

    @include('partials.sidebar')

    <div class="col-md-9 col-xl-10 px-0 ms-md-auto">

        @include('partials.navbar')

        <main class="p-4 min-vh-100">

            @include('partials.success')

            @yield('content')
        </main>

    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const sidebarEl = document.querySelector('#sidebar');
            const sidebarOverlayEl = document.querySelector('#sidebar-overlay');

            document.querySelector('#open-sidebar').addEventListener('click', () => {
           
                sidebarEl.classList.add('active');
                sidebarOverlayEl.classList.remove('d-none');
            });

            document.querySelector('#sidebar-overlay').addEventListener('click', () => {

                sidebarEl.classList.remove('active');
                sidebarOverlayEl.classList.add('d-none');

            });

        });


        function confirmSubmit(form) {

            event.preventDefault(); 
           
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

    </script>
    
    @stack('scripts')


</body>

</html>