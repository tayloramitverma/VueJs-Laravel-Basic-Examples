{{ Session::get("insert_success") }}
{{ Session::get("update_success") }}
{{ Session::get("delete_success") }}
{{ Session::get("db_error") }}
{{ Session::get("success") }}

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
        	<li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif