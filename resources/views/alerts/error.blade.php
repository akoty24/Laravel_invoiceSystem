@if(Session::has('error'))
    <div class="row mr-2 ml-2">
        <button type="text" style="color:white;background-color: #dd4b39;" class="btn btn-lg btn-block btn-outline-danger" id="type-error">
            {{Session::get('error')}}
        </button>
    </div>


@endif
