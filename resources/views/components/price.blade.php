
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <em> <h4 class="my-0 font-weight-normal">{{ $title }}</h4></em>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">{{ $price }} <small class="text-muted"></small></h1>
            <ul class="list-unstyled font-weight-bold text-muted mt-3 mb-4">
              {{ $slot }}
             <li class="text-success">Cada credito tiene duracion de 1 mes</li>
             <li>2 conecciones simultaneas</li>
             <li>Mas de 40TB de contenido</li>
             <li>Actualizaciones diarias</li>
            </ul>
          
           <a class="btn btn-lg btn-block btn-{{ $type ?? 'info' }}" href="{{ $url ?? 'https://t.me/compraplex' }}">{{ $btn ?? 'Inicia hoy' }}</a>

          </div>
        </div>
       
