@if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 1500
            });
        });
    </script>
@endif
@if(session('error'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 1500
            });
        });
    </script>
@endif
@if(session('warning'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: "{{ session('warning') }}",
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 1500
            });
        });
    </script>
@endif
@if($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let errorMessages = '';
            @foreach($errors->all() as $error)
                errorMessages += '{{ $error }}<br>';
            @endforeach

            Swal.fire({
                icon: 'error',
                title: 'Field Error',
                html: errorMessages,
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 1500
            }).then((result) => {
                // console.log("idhodshgdf");
                $('#addModal').modal('show');
            });
        });
    </script>
@endif

