<div class="page-header-menu">
    <div class="container-fluid">
        <!-- BEGIN MEGA MENU -->
        <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
        <!-- DOC: Remover data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
        <div class="hor-menu  ">
            <ul class="nav navbar-nav">
                @if($user->is_admin == 1)
                    <li class="menu-dropdown classic-menu-dropdown {{$superAdminMenu or ''}}">
                        <a href="{{route('gym-admin.superadmin.dashboard')}}"><i class="font-green fa fa-dashboard"></i> Dashboard
                        </a>
                    </li>
                @endif
                @if($user->can("view_dashboard"))
                    <li class="menu-dropdown classic-menu-dropdown {{$dashboardMenu or ''}}">
                        <a href="{{route('gym-admin.dashboard.index')}}"><i class="font-green fa fa-dashboard"></i> Assistente
                        </a>
                    </li>
                @endif
                @if($user->can("view_customers") || $user->can("add_attendance") || $user->can("my_gym") || $user->can("view_enquiry")
                || $user->can("view_targets") || $user->can("view_subscriptions") || $user->can("view_membership") || $user->can("task"))
                    <li class="menu-dropdown mega-menu-dropdown {{$manageMenu or ''}}">
                        <a href="javascript:;"><i class="font-green fa fa-gear"></i> Gerencial <i class="fa fa-angle-down hidden-xs hidden-sm"></i>
                            <span class="arrow"></span>
                        </a>
                        <ul class="dropdown-menu" style="min-width: 400px">
                            <li>
                                <div class="mega-menu-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="mega-menu-submenu ">
                                                @if($user->can("view_customers"))
                                                    <li class="{{$customerMenu or ''}}">
                                                        <a href="{{route('gym-admin.client.index')}}" class="nav-link  ">
                                                            <i class="icon-users"></i>  Clientes
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($user->can("add_attendance"))
                                                    <li class="{{$attendanceMenu or ''}} ">
                                                        <a href="{{route('gym-admin.attendance.create')}}" class="nav-link  ">
                                                            <i class="icon-plus"></i> Check-ins
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($user->can("my_gym"))
                                                    <li class="{{$gymMenu or ''}} ">
                                                        <a href="{{route('gym-admin.my-gym.index')}}" class="nav-link  ">
                                                            <i class="fa fa-heartbeat"></i> Dados da Empresa
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($user->can("view_enquiry"))
                                                    <li class="{{$enuriryMenu or ''}} ">
                                                        <a href="{{route('gym-admin.enquiry.index')}}" class="nav-link">
                                                            <i class="font-green icon-earphones-alt"></i>  Inquéritos
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($user->can("message"))
                                                    <li class="{{$messageMenu or ''}} ">
                                                        <a href="{{route('gym-admin.message.index')}}" class="nav-link">
                                                            <i class="fa fa-envelope"></i>  Mensagens
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="mega-menu-submenu">
                                                @if($user->can("view_targets"))
                                                    <li class="{{$targetMenu or ''}}">
                                                        <a href="{{route('gym-admin.target.index')}}" class="nav-link  ">
                                                            <i class="fa fa-bullseye"></i>  Objetivos
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($user->can("view_subscriptions"))
                                                    <li class="{{$subscriptionMenu or ''}}">
                                                        <a href="{{route('gym-admin.client-purchase.index')}}" class="nav-link  ">
                                                                <i class="fa {{ $gymSettings->currency->symbol }}"></i>  Assinaturas
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($user->can("view_membership"))
                                                    <li class="{{$membershipMenu or ''}}">
                                                        <a href="{{route('gym-admin.membership.index')}}" class="nav-link nav-toggle">
                                                            <i class="icon-badge"></i> Planos de Assinatura
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($user->can("task"))
                                                    <li class="{{$taskMenu or ''}}">
                                                        <a href="{{route('gym-admin.task.index')}}" class="nav-link nav-toggle">
                                                            <i class="fa fa-tasks"></i> Tarefas
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif
                @if($user->can("view_payments") || $user->can("view_due_payments") || $user->can("view_due_payments")
                || $user->can("view_invoice") || $user->can("expense"))
                    <li class="menu-dropdown classic-menu-dropdown {{$paymentMenu or ''}} ">
                        <a href="javascript:;" ><i class="font-green fa {{ $gymSettings->currency->symbol }}"></i> Financeiro  <i class="fa fa-angle-down hidden-xs hidden-sm"></i>
                            <span class="arrow"></span>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            <li class="dropdown-submenu {{$account or ''}}">
                                <a href="{{ route('gym-admin.membership-payment.index') }}" class="nav-link  ">
                                    <i class="fa {{ $gymSettings->currency->symbol }}"></i> Pagamentos
                                </a>
                                <ul class="dropdown-menu">
                                    @if($user->can("view_payments"))
                                        <li class="{{$showpaymentMenu or ''}}">
                                            <a href="{{ route('gym-admin.membership-payment.index') }}" class="nav-link ">
                                                <i class="fa {{ $gymSettings->currency->symbol }}"></i> Pagamentos
                                            </a>
                                        </li>
                                    @endif
                                    @if($user->can("view_due_payments"))
                                        <li class="{{$paymentreminderMenu or ''}}">
                                            <a href="{{route('gym-admin.client-purchase.paymentreminder')}}" class="nav-link ">
                                                <i class="fa fa-bullhorn"></i> Vencimentos
                                            </a>
                                        </li>
                                    @endif
                                    @if($user->can("view_due_payments"))
                                        <li class="{{$paymentreminderHistoryMenu or ''}}">
                                            <a href="{{route('gym-admin.client-purchase.reminder-history')}}" class="nav-link ">
                                                <i class="fa fa-list"></i> Alerta de Vencimentos
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                            @if($user->can("view_invoice"))
                                <li class="{{$invoiceMenu or ''}}">
                                    <a href="{{route('gym-admin.gym-invoice.index')}}" class="nav-link  ">
                                        <i class="fa fa-file"></i> Faturas
                                    </a>
                                </li>
                            @endif
                            @if($user->can("expense"))
                                <li class="{{$expenseMenu or ''}}">
                                    <a href="{{ route('gym-admin.expense.index') }}" class="nav-link">
                                        <i class="fa fa-money"></i> Despesas
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if($user->can("view_target_report") || $user->can("view_client_report") || $user->can("view_booking_report")
                || $user->can("view_finance_report") || $user->can("view_attendance_report") || $user->can("view_enquiry_report")
                || $user->can("balance_report"))
                    <li class="menu-dropdown mega-menu-dropdown {{$reportMenu or ''}}  ">
                        <a href="javascript:;"><i class="font-green icon-notebook"></i> Relatórios <i class="fa fa-angle-down hidden-xs hidden-sm"></i>
                            <span class="arrow"></span>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            @if($user->can("view_target_report"))
                                <li class="{{$targetreportMenu or ''}}">
                                    <a href="{{route('gym-admin.target-report.index')}}" class="nav-link  ">
                                        <i class="fa fa-bullseye"></i> Relatório de Objetivos
                                    </a>
                                </li>
                            @endif
                            @if($user->can("view_client_report"))
                                <li class="{{$clientreportMenu or ''}}">
                                    <a href="{{route('gym-admin.client-report.index')}}" class="nav-link  ">
                                        <i class="icon-users"></i> Relatório de Clientes
                                    </a>
                                </li>
                            @endif
                            @if($user->can("view_booking_report"))
                                <li class="{{$bookingreportMenu or ''}}">
                                    <a href="{{route('gym-admin.booking-report.index')}}" class="nav-link  ">
                                        <i class="icon-notebook"></i> Relatório de Assinaturas
                                    </a>
                                </li>
                            @endif
                            @if($user->can("view_finance_report"))
                                <li class="{{$financialreportMenu or ''}}">
                                    <a href="{{route('gym-admin.finance-report.index')}}" class="nav-link  ">
                                        <i class="fa fa-money"></i> Relátorio Financeiro
                                    </a>
                                </li>
                            @endif
                            @if($user->can("view_attendance_report"))
                                <li class="{{$attendancereportMenu or ''}}">
                                    <a href="{{route('gym-admin.attendance-report.index')}}" class="nav-link  ">
                                        <i class="fa fa-tasks"></i> Relátorio de Check-in
                                    </a>
                                </li>
                            @endif
                            @if($user->can("view_enquiry_report"))
                                <li class="{{$enquiryreportMenu or ''}}">
                                    <a href="{{route('gym-admin.enquiry-report.index')}}" class="nav-link  ">
                                        <i class="fa fa-question-circle"></i> Relatorio de Orcamentos
                                    </a>
                                </li>
                            @endif
                            @if($user->can("balance_report"))
                                <li class="{{$balancereportMenu or ''}}">
                                    <a href="{{ route('gym-admin.balance-report.index') }}" class="nav-link  ">
                                        <i class="fa fa-balance-scale"></i> Balanço Financeiro
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if($user->can("view_previous_promotions"))
                    <li class="menu-dropdown classic-menu-dropdown  {{$promotionMenu or ''}} ">
                        <a href="javascript:;"><i class="font-green icon-paper-plane"></i> Promoções & Novidades <i class="fa fa-angle-down hidden-xs hidden-sm"></i>
                            <span class="arrow"></span>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            @if($user->can("view_previous_promotions"))
                                <li class="{{$promotionEmailMenu or ''}}">
                                    <a href="{{ route('gym-admin.email-promotion.index') }}" class="nav-link ">
                                        <i class="icon-paper-plane"></i> Email Promocional </a>
                                </li>
                            @endif
                            @if($user->can("view_previous_promotions"))
                                <li class="{{$promotionDbMenu or ''}}">
                                    <a href="{{ route('gym-admin.promotion-db.index') }}" class="nav-link ">
                                        <i class="fa fa-database"></i> Dados de Contatos </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                <!-- @if($user->can("view_software_updates"))
                    <li class="menu-dropdown mega-menu-dropdown {{$updatesMenu or ''}}  ">
                        <a href="{{route('gym-admin.upcoming.index')}}">
                            @if(!is_null($gymSwUpdates) &&  (\Carbon\Carbon::now('Asia/Calcutta')->diffInDays($gymSwUpdates->date, false) >= -3))
                                <i class="font-yellow-crusta fa fa-magic faa-tada animated"></i>
                            @else
                                <i class="font-green fa fa-magic"></i>
                            @endif
                            S/W Updates
                        </a>
                    </li>
                @endif -->
                @if($user->is_admin == 1)
                        <li class="menu-dropdown mega-menu-dropdown {{$indexSuperAdmin or ''}}  ">
                            <a href="{{ route('gym-admin.superadmin.index') }}">
                                <i class="font-green fa fa-cogs"></i>
                                Gerenciar Filiais
                            </a>
                        </li>
                @endif
            </ul>
        </div>
        <!-- END MEGA MENU -->
    </div>
</div>