<header>
    
     @can('isLevel3-4')
    <div id="logo">
        <a href="{{route('homepage')}}"><img src="{{ asset('images/icons/logoV.png') }}"></a>
    </div>
    @endcan
    @cannot('isLevel3-4')
    <div id="logo">
        <a href="{{route('homepage')}}"><img src="{{ asset('images/icons/logoR.png') }}"></a>
    </div>
    @endcannot
    <nav>
        <ul id="navigazione">
            <li title ="muEvents"> <a class="link" href="{{route('homepage')}}">Home</a> </li>
            <li title ="Esplora Catalogo"> <a class="link" href="{{route('filteredCatalog')}}">Catalogo</a> </li> 
            <li title ="FAQ"> <a class="link" href="{{route('faq')}}">FAQ</a> </li>

            @guest
            <li title ="Accedi"><a href="{{ route('login') }}" id="accedi"><i class="fa fa-user" id="login"></i></a></li>
            @endguest

            @can('isUser')
            <li title ="Account"><a href="{{ route('account') }}" id="account"><i class="fa fa-user" id="account"></i></a></li>
            @endcan

            @can('isOrg')
            <li title ="Gestione"><a class="link" href="{{ route('manageEvents') }}" id="gestioneEventi">Gestione </a></li>
            <li title ="Analisi"><a class="link" href="{{ route('analyzeEvents') }}" id="analisiEventi">Analisi </a></li>
            @endcan

            @can('isAdmin')
            <li title ="Gestione utenti"><a class="link" href="{{ route('manageUsers') }}" id="gestioneUtenti"> Utenti</a></li>
            <li title ="Gestione organizzazioni"><a class="link" href="{{ route('homeOrganizations') }}" id="gestioneOrganizzazioni"> Organizzazioni</a></li>
            <li title ="Gestione FAQ"><a class="link" href="{{ route('homeFAQ') }}" id="gestioneFaq"> Gestione FAQ</a></li>
            @endcan
            
            @auth
                <li title ="Logout"><i class="fa fa-sign-out" id="logout-ico">
                </i></li>
            @endauth

        </ul>
    </nav>
</header>
