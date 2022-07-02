<script>
    document.addEventListener('DOMContentLoaded', function() {
        setInterval(function() {
            $.ajax({
                url: "{{ route('get_notifications') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.length) {
                        if (Date.parse(data[0]['updated_at']) / 1000 > $('.notifification-dropdown.dropdown-menu>li').first().data('datetime')) {
                            data.forEach(function(v, i) {
                                if ((Date.parse(data[i]['updated_at']) - 18000000) / 1000 > $('.notifification-dropdown.dropdown-menu>li').first().data('datetime')) {
                                    var time = Date.parse(data[i]['updated_at']) - 18000000;
                                    var notification = '<li class="text-right mx-1 px-2 border-bottom" data-datetime="' + time / 1000 + '">';
                                    notification += '<span class="d-block">';
                                    notification += data[i]['notification'];
                                    notification += '</span>';
                                    notification += '<small class="d-block text-muted">';
                                    var date = new Date(time);
                                    notification += $.datepicker.formatDate('M dd, yy', date);
                                    notification += '</small>';
                                    notification += '</li>';
                                    $('.notifification-dropdown.dropdown-menu').prepend(notification);
                                    $('.notification-bubble').css('display', 'block');
                                    $('.notification-button i').addClass('fa-shake');
                                    $('.no-notifications').css('display', 'none');
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                        }
                                    })
                                    Toast.fire({
                                        title: 'Notification',
                                        text: data[i]['notification'].substring(0, 38) + (data[i]['notification'].length >= 38 ? '...' : ''),
                                    })
                                }
                            });
                        }
                    }
                }
            });
        }, 10000);
        $('.notification-button').click(function() {
            $.ajax({
                url: "{{ route('notification_read_at') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('.notification-bubble').css('display', 'none');
                    $('.notification-button i').removeClass('fa-shake');
                }
            });
        });
    });
</script>