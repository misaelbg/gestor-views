@{
  $STEPS = array([
    1 => ['name' => 'Configuração de Perfil', 'route' => 'gym-admin.account-setup.profile'],
    2 => ['name' => 'Criar Assinatura', 'route' => 'gym-admin.account-setup.membership'],
    3 => ['name' => 'Adicionar Cliente', 'route' => 'javascript:;'],
    4 => ['name' => 'Adicionar Assinatura', 'route' => 'javascript:;'],
    5 => ['name' => 'Adicionar Pagamento', 'route' => 'javascript:;'],
  ]);
  function isActive($step) {
    if ($STEP_NUMBER == $step) return 'active'
  }
}}
<!-- BEGIN PAGE BREADCRUMBS -->
<ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="{{route('gym-admin.dashboard.index')}}">Painel</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Criação de Conta {{ $STEP_NUMBER }} de {{ $STEP_NUMBER }}</span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMBS -->
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="page-content-inner">


            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-layers font-red"></i>
                                <span class="caption-subject font-red bold uppercase"> Assistente de criação de conta</span>
                            </div>
                            <div class="actions">
                                <span class="caption-subject font-red bold uppercase"> ETAPA {{ $STEP_NUMBER }} de {{ $STEP_NUMBER }}</span>
                            </div>
                        </div>
                        <div class="portlet-body">

                            <div class="col-md-12">
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar"
                                         aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                         style="width: {{ ($completedItems*(100/$completedItemsRequired)) }}%">
									<span class="sr-only">
									{{ ($completedItems*(100/$completedItemsRequired)) }}% Completo </span>
                                    </div>
                                </div>
                            </div>

                            {!! Form::open(['route'=>'gym-admin.profile.store','id'=>'storePayments','class'=>'ajax-form ','method'=>'POST','files' => true]) !!}
                            <div class="form-wizard">
                                <div class="form-body">
                                    <ul class="nav nav-pills nav-justified steps">
                                    @foreach($STEPS as $key => $step)
                                    <li>
                                        <a href="{{ route($step->route) }}" class="step">
                                            <span class="number"> {{ $key }} </span>
                                            <span class="desc">
                                                <i class="fa fa-check"></i> {{ $step->name }}
                                            </span>
                                        </a>
                                    </li>
                                    @endforeach