@if (Session::get('success'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: "{{Session::get('success')}}",
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@endif


@if ($message = Session::get('error'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: "{{Session::get('error')}}",
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@endif

@if (Session::get('alert'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'alert',
            title: "{{Session::get('alert')}}",
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@endif
