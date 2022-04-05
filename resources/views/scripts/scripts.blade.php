@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Error',
            html: `
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        `,
            icon: 'error',
            confirmButtonText: '<a style="text-decoration: none; color: #fff" data-bs-toggle="modal" href="#signupToggle">Try Again</a>',
            showCancelButton: true
        })
    })
</script>
@endif