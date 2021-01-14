<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 09/01/2021
 * Time: 13:16
 */ ?>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
</script>

<script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>


<script src="{{ asset('js/main.js')}}"></script>

@yield('scripts')