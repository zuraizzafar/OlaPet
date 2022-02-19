<style>
    .home-slide-1 {
        background-image: url('{{ asset("images/pexels-lumn-406014.jpg") }}');
    }

    .home-slide-2 {
        background-image: url('{{ asset("images/wepik-20211130-171511.jpg") }}');
        background-position: center bottom;
    }

    .home-slide-3 {
        background-image: url('{{ asset("images/adorable-brown-white-basenji-dog-smiling-giving-high-five-isolated-white.jpg") }}');
        background-position: center top;
    }

    .bg-pattern {
        background: url('{{ asset("images/magicpattern-ixxjruC7Gg4-unsplash.jpg") }}'), #7159a1;
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    @media(max-width: 768px) {
        .bg-banner-sm {
            background: url('{{ asset("images/magicpattern-ixxjruC7Gg4-unsplash.jpg") }}');
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