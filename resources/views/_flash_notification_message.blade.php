@if(Session::has('notification'))
    <div class="alert alert-{{ Session::get('notification.level', 'info') }}" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('notification.message') }}
    </div>
@endif