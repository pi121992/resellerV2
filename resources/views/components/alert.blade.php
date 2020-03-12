<div class="alert alert-{{ $type }}" role="alert">
  @if ($type=="success")
  	Invitacion Enviada con exito
  @endif
  @if ($type=="danger")
  	No tienes creditos
  @endif
  @if ($type=="warning")
  	Email ya existe en el servidor
  @endif
  @if ($type=="dark")
  	Email invalido
  @endif
</div>