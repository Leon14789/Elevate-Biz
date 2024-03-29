    <aside class="sidebar">
        <nav class="menu mt-3">
            <ul class="nav-list">
        
                <li class="nav-item">
                        <a href="{{route('registerPoint')}}">
                    <i class="icofont-duotone icofont-mouse-pointer-highlighter icofont-2x mr-2"></i>
                        Registrar Ponto
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('reportsMonthly')}}">
                    <i class="icofont-files-stack"></i>
                    <i class="icofont-duotone icofont-articles icofont-2x mr-2"></i>
                        Relatorio Mensal
                    </a>
                </li>
    @if($user->is_admin)
                <li class="nav-item">
                    <a href="{{route('reportManagement')}}">
                    <i class="icofont-pie-chart"></i>
                    <i class="icofont-duotone icofont-sourcetree icofont-2x mr-2"></i>
                        Relatorio Gerencial
                    </a>
                </li>

                <li class="nav-item">
                <a href="{{route('users')}}">
                    <i class="icofont-duotone icofont-users icofont-2x mr-2"></i>
                    <i class="icofont-company"></i>
                        Usuarios
                    </a>
                </li>
    @endif
                
            </ul>
        </nav>

        <div class="sidebar-widgets">
            <div class="sidebar-widget">
                <i class="icon icofont-duotone icofont-play-circle icofont-2x mr-2" id="icon"></i>
                <div class="information">
                    <span class="information-main text-primary" {{ $nextTime === 'WorkedInterval' ? 'active-clock' : '' }}> 
                        
                    {{ $result['workedInterval'] }}  </span>
                    <span class="label">Horas Trabalhadas</span>
                </div>
            </div>

            <div class="division my-3" ></div>
            
            <div class="sidebar-widget">
                <i class="icon icofont-duotone icofont-pause icofont-2x mr-2" id="icon"></i>
                <div class="information">
                    <span class="information-main text-danger"  {{ $nextTime === 'exitTime' ? 'active-clock' : '' }}>
                        {{ $result['exitTime'] }}</span>
                    <span class="label">Hora de Saida</span>
                </div>
            </div>
            
       
    </aside>
        
