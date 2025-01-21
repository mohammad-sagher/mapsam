
@if(session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="alert-icon">
            <i class="icon-check"></i>
        </div>
        <div class="alert-message">
            <span><strong>Success!</strong> {{ session('success') }}</span>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="alert-icon">
            <i class="icon-close"></i>
        </div>
        <div class="alert-message">
            <span><strong>Error!</strong> {{ session('error') }}</span>
        </div>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="alert-icon">
            <i class="icon-close"></i>
        </div>
        <div class="alert-message">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
