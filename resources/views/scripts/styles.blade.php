<style>
    .home-slide-1 {
        background-image: url('{{ get_file_path("pexels-lumn-406014.jpg", get_drive_content()) }}');
    }

    .home-slide-2 {
        background-image: url('{{ get_file_path("wepik-20211130-171511.jpg", get_drive_content()) }}');
        background-position: center bottom;
    }

    .home-slide-3 {
        background-image: url('{{ get_file_path("adorable-brown-white-basenji-dog-smiling-giving-high-five-isolated-white.jpg", get_drive_content()) }}');
        background-position: center top;
    }

    .bg-pattern {
        background-image: url('{{ get_file_path("magicpattern-ixxjruC7Gg4-unsplash.jpg", get_drive_content()) }}');
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    @media(max-width: 768px) {
        .bg-banner-sm {
            background: url('{{ get_file_path("magicpattern-ixxjruC7Gg4-unsplash.jpg", get_drive_content()) }}');
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            z-index: 1;
        }
        
        .bg-banner-sm::after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255,255,255,0.95);
            z-index: -1;
        }
    }
</style>