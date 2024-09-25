<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.12/dist/css/uikit.min.css" />
    <title>Document</title>

</head>

<body  class="uk-background-muted uk-padding uk-panel uk-container">

    <style>
        .custom-navbar-bg {
            background-color: #4CAF50; /* Your desired color */
        }
    </style>

<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; end: + *; offset: 80">
    <nav class="uk-navbar-container custom-navbar-bg">
        <div class="uk-container">
            <div uk-navbar>
                <div class="uk-navbar-left">
                    <ul class="uk-navbar-nav">
                        <li class="uk-active"><a href="#">Home</a></li>
                        @foreach($menuTree as $menu)
                            <li class="{{ $menu->children->isNotEmpty() ? 'uk-parent' : '' }}">
                                <a href="#">{{ $menu->name }}</a>
                                @if($menu->children->isNotEmpty())
                                    <div class="uk-navbar-dropdown">
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            @foreach($menu->children as $child)
                                                <li><a href="#">{{ $child->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>



@yield('content')




    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.12/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.12/dist/js/uikit-icons.min.js"></script>

</body>

</html>
