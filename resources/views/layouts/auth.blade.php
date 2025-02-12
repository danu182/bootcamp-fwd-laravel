<!DOCTYPE html>
<html lang="en">
    <head>

    {{-- include meta star --}}
    @include('include.backsite.meta')
    {{-- include meta end --}}
    <title>@yield('title') | MeetDocters</title>
    

    @stack('before-style')
        {{-- include css link star --}}
        @include('include.frontsite.style')
        {{-- include css link end --}}
    @stack('after-style')

    </head>
        <body>
            {{-- include header start --}}
            @include('components.frontsite.header')
            {{-- include header end --}}


            {{-- content start --}}
            @yield('content')
            {{-- content end --}}

            {{-- include footer start --}}
            @include('components.frontsite.footer')
            {{-- include footer end --}}

            @stack('before-script')
                {{-- include script start --}}
                {{-- @include('include.frontsite.script') --}}
                {{-- include script end --}}
            @stack('after-script')

            {{-- modal start --}}
            {{-- ketik disini --}}
            {{-- modal end --}}

        </body>
</html>