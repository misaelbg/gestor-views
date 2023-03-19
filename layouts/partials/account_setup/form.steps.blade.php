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
  <div class="form-wizard">
    <div class="form-body">
        <ul class="nav nav-pills nav-justified steps">
        @foreach($STEPS as $key => $step)
        <li>
            <a href="{{ route($step->route) }}" class="step {{ isActive($key) }}">
                <span class="number"> {{ $key }} </span>
                <span class="desc">
                    <i class="fa fa-check"></i> {{ $step->name }}
                </span>
            </a>
        </li>
        @endforeach