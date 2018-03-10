<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style> 
        li {
            display:inline;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li>LOGO</li>
            <li><a href="/">Beranda</a></li>
            @if(isset($user))
                <li><a href="#">{{$first_name}}</a></li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @else
                <li><a href="/loginregis">Masuk</a></li>
            @endif
            <li>
                <form style="display:inline;">
                    <select>
                        <option>Musik</option>
                        <option>Wibu</option>
                    </select>
                    <input type="text">
                    <button type="submit">Cari</button>
                </form>
            </li>
        </ul>
    </nav>
    <br><br><br>
    
    @section('body')
    @show

    <br><br><br>
    <div>
        FOOTER CERITANYA
    </div>

    @section('script')
    @show
</body>
</html>