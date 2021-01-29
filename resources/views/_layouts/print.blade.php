<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>{{ $title == '' ? config('app.name') : $title . ' - ' . config('app.name') }}</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('public') }}/assets/css/bootstrap.min.css">
    <style media="screen">
        body {
            font-family: 'Segoe UI', 'Microsoft Sans Serif', sans-serif;
        }

        /*
            These next two styles are apparently the modern way to clear a float. This allows the logo
            and the word "Invoice" to remain above the From and To sections. Inserting an empty div
            between them with clear:both also works but is bad style.
            Reference:
            http://stackoverflow.com/questions/490184/what-is-the-best-way-to-clear-the-css-style-float
        */
        header:before,
        header:after {
            content: " ";
            display: table;
        }

        header:after {
            clear: both;
        }
    </style>

    <!-- These styles are exactly like the screen styles except they use points (pt) as units
        of measure instead of pixels (px) -->
    <style media="print">
        body {
            font-family: 'Segoe UI', 'Microsoft Sans Serif', sans-serif;
        }

        header:before,
        header:after {
            content: " ";
            display: table;
        }

        header:after {
            clear: both;
        }
    </style>

    {{ $css ?? '' }}
</head>

<body>
    {{ $slot }}

    <!-- Core  -->
    <script src="{{ asset('public') }}/assets/vendor/jquery/jquery.js"></script>
    <script src="{{ asset('public') }}/assets/vendor/bootstrap/bootstrap.js"></script>

    {{ $js ?? '' }}
</body>

</html>