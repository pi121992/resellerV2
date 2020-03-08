
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">{{ $title }}</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">{{ $price }} <small class="text-muted"></small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              {{ $slot }}
            </ul>
          
           <a class="btn btn-lg btn-block btn-{{ $type ?? 'info' }}" href="{{ $url ?? 'https://t.me/compraplex' }}">{{ $btn ?? 'Inicia hoy' }}</a>

          </div>
        </div>
       
