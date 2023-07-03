<header class="header"> 
    
    <div class="logo mr-3 ">
            <h3>Elevate Biz</h3>
    </div>
       

    <div class="menu">
        <i class="icofont-duotone icofont-list-thin icofont-3x"></i>
    </div>

    <div class="spacer"></div>

    <div class="menu-user">
        <div class="menu-user-button">
        <!--  Aqui acesso a model User vejo o usuario logado na Session e exibo o Nome dele -->
            <span class="ml-2"> {{Auth::User()->name}} </span>
            <i class="icofont-duotone icofont-user icofont-2x mx-2"></i>
           
        </div>
        <div class="menu-user-content">
            <ul class="nav-list">
                <li class="nav-item">
                <a href="{{ route('destroy') }}">
                    <i class="icofont-duotone icofont-sign-out icofont-2x mx-2"></i>
                        Sair
                </a>
                </li>
                
            </ul>
        </div>
    </div>

</header>

