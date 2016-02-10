@if(Session::has('flash_message'))
          
          <div class="alert alert-success {{ Session::has('flash_message_important')?'alert-important':''}}">

              @if(Session::has('flash_message_important'))
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              @endif

          {{ session('flash_message') }}
          </div>
 @endif