<script>
document.addEventListener('DOMContentLoaded', function() {
    setInterval(function(){
        $.ajax({
            url: "{{ route('get_notifications') }}",
            method: 'POST',
            data: {_token: "{{ csrf_token() }}"},
            success: function(data) {
                if(Date.parse(data[0]['updated_at'])/1000>$('.notifification-dropdown.dropdown-menu>li').first().data('datetime')) {
                    data.forEach(function(v, i) {
                        if((Date.parse(data[i]['updated_at'])-18000000)/1000>$('.notifification-dropdown.dropdown-menu>li').first().data('datetime')) {
                            var time = Date.parse(data[i]['updated_at'])-18000000;
                            var notification = '<li class="text-right mx-1 px-2 border-bottom" data-datetime="'+time/1000+'">';
                            notification += '<span class="d-block">';
                            notification += data[i]['notification'];
                            notification += '</span>';
                            notification += '<small class="d-block text-muted">';
                            var date = new Date(time);
                            console.log(date)
                            notification += $.datepicker.formatDate('M dd, yy', date);
                            notification += '</small>';
                            notification += '</li>';
                            $('.notifification-dropdown.dropdown-menu').prepend(notification);
                            $('.notification-bubble').css('display', 'block');
                        }
                    });
                }
            }
        });
    }, 10000);
    $('.notification-button').click(function() {
        $.ajax({
            url: "{{ route('notification_read_at') }}",
            method: 'POST',
            data: {_token: "{{ csrf_token() }}"},
            success: function(data) {
                $('.notification-bubble').css('display', 'none');
            }
        });
    });
});
</script>