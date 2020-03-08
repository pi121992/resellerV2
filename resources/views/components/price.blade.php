
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">{{ $title }}</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">{{ $price }} <small class="text-muted"></small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              {{ $slot }}
             <li>Cada credito tiene duracion de 1 mes</li>
             <li>Tu tienes el control de tu cuenta</li>
             <li>2 conecciones simultaneas</li>
             <li>Mas de 40TB de contenido</li>
             <li>Actualizaciones diarias</li>
            </ul>
          
           <a class="btn btn-lg btn-block btn-{{ $type ?? 'info' }}" href="{{ $url ?? 'https://t.me/compraplex' }}">{{ $btn ?? 'Inicia hoy' }}</a>

          </div>
        </div>
       
