@section('sidenav')
    <ul id="sidebar-1" class="sidenav sidenav-fixed">
        <li>
            <div class="user-view">
                <div class="background  red darken-1">
                    {{-- <img src="{{ asset('load_extern/images/office.jpg') }}"> --}}
                </div>
                <a href=""><img class="circle" src="{{ asset('load_extern/images/user.png') }}"></a>
                <a href=""><span class="white-text name">Ady Wijay</span></a>
                <a href=""><span class="white-text email">bla.bla.loremipsum@gmail.com</span></a>
            </div>
        </li>
    @show
    <li>
        <ul class="collapsible">
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">storage</i>Master Data
                </div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{ route('Roles-Dashboard') }}">Accesss / Role</a></li>
                    </ul>
                </div>
            </li>
        </ul>
        <ul class="collapsible">
            <a href="{{ url('jabatan/abouts') }}" class="nopadding">
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">assignment_ind</i>About Me
                    </div>
                </li>
            </a>
        </ul>
        <ul class="collapsible">
            <a href="{{ url('jabatan/abouts') }}" class="nopadding">
                <li>
                    <div class="collapsible-header hide-on-large-only show-on-small">
                        <i class="material-icons">home</i>home
                    </div>
                </li>
            </a>
        </ul>
    </li>
    <ul>
