@extends('layouts.appHome')

@section('content')
 <form method="POST">
    @csrf
     <div class="form-group">
        <i class="fas fa-at"></i>
         <label class="text-muted">Email PLEX:</label>
         <input type="text" name="email" required name="" class="form-control" placeholder="Enter Email">
         <small>This email has to be register in <a href="https://plex.tv">PLEX</a></small>
     </div>
     <div class="form-group">
        <i class="fas fa-calendar-day"></i>
         <label class="text-muted">Add months:</label>
         <select class="form-control" name="month">
         	<option value="1">1 Month</option> 
         	<option value="3">3 Month</option> 
         	<option value="6">6 Month</option> 
         	<option value="12">12 Month</option> 
         </select>
         <small></small>
     </div>
     <div class="form-group">
        <i class="fas fa-user"></i>
         <label class="text-muted">Name:</label>
         <input type="text" name="name" required class="form-control" placeholder="Enter Name">
         <small>Name Plex User</small>
     </div>

     <div class="form-group">
         <i class="fas fa-sticky-note"></i>
         <label class="text-muted">Note:</label>
         <input type="text" name="note" required class="form-control" placeholder="Enter Note ">
         <small>Note For User</small>
     </div>

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-user-plus"></i>
        Add
    </button>

    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Ver librerias
      </a>
    
    <div class="collapse" id="collapseExample">
      <div class="card card-body">
          <div class="form-group pt-4">
              <div class="row offset-3">
              @for ($i = 0; $i < count($library[1]); $i++)
                  @php
                    $checked='checked';
                    $color="info";
                    $mayor="";
                    if(strpos($library[2][$i],"xxx")){
                      $checked="";
                      $color="danger";
                      $mayor="Solo mayores de 18+";
                    } 
                  @endphp
                  <div class="col-12 col-md-3 mb-1 text-center ml-1 btn-{{$color}}">
                   <label class="btn ">
                   <input type="checkbox" name="library[]"{{$checked}} value="{{$library[1][$i]}}">{{$mayor}}<br> {{$library[2][$i]}}
                   </label>
                  </div>
               @endfor
               </div>
           </div>
       
      </div>
    </div>

 </form>
@stop