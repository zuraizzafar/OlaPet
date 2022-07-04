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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('.ad-sold-button').click(function(e) {
            let id = $(this).data('id');
            Swal.fire({
                title: 'Select User',
                text: "To whom your stuff is sold to?",
                icon: 'info',
                input: 'select',
                inputOptions: {
                    0 : "Select User",
                    @foreach(App\Models\User::where('id', '!=', Auth::id())->get() as $user)
                        {!!$user->id.':"'.$user->name.'",'!!}
                    @endforeach
                },
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('sold_to') }}",
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            user_id: '{{ Auth::id() }}',
                            sold_to: result.value,
                            id: id,
                        },
                        success: function(e) {
                            window.location.href = "{{ route('my_ads') }}";
                        }
                    });
                }
            })
        })
        $('.ad-delete-button').click(function(e) {
            e.preventDefault();
            let ad = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Your Ad will be deleted permanentaly!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('delete_ad') }}",
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            user_id: '{{ Auth::id() }}',
                            id: ad,
                        },
                        success: function(e) {
                            $('[data-id="' + ad + '"]').parent().fadeOut(500, function() {
                                $('[data-id="' + ad + '"]').remove();
                            });
                            Swal.fire({
                                title: 'Ad Deleted',
                                text: "Your Ad has been deleted successfully!",
                                icon: 'success'
                            })
                        }
                    });
                }
            })
        });
    })
</script>