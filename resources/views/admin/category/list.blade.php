@extends('layouts.master_')

@section('title')
  Category List
@endsection

@section('content')

<div class="col-md-10 offset-md-1 pt-4">
    @if(Session::has('success'))
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <div id="message" class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
    </div>
    @endif

    <div class="card">
        <div class="card-header">
      
          <h3 class="card-title">

            Latest Categories
            
          <a href="{{ route('category.new') }}">
                <button type="button" class="btn btn-primary btn-sm">Add New <i class="fas fa-plus"></i></button>
            </a>

          </h3>
        
      
          <div class="card-tools">
            <ul class="pagination pagination-sm m-0 float-right">
              <li class="page-item">
                {{ $categories->links() }}
              </li>
            </ul>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Actions</th>
                <th>Created at</th>
                <th>Created at</th>
            </tr>
            @if($categories)
            @foreach($categories as $category)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $category->cat_name }}</td>
                    <td>
                        <a href="
                        {{ route('category.edit_category', ['id' => $category->id]) }}
                        ">
                            <i class="fas fa-edit"></i>
                        </a>
                        / 
                        <a data-confirm='Are you sure you want to delete this Category ?' 
                        href="{{ route('category.delete_category', ['id' => $category->id]) }}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                    <td>{{ Carbon\Carbon::parse($category->created_at)->format('d-m-Y')  }}</td>
                    <td>{{ Carbon\Carbon::parse($category->updated_at)->format('d-m-Y')  }}</td>
                </tr>
            @endforeach
        @else
            <p class="text-center text-primary">No Posts created Yet!</p>
        @endif
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
</div>



    <script>
$(document).ready(function(){
    $('[data-confirm]').on('click', function(e){
        e.preventDefault(); //cancel default action

        //Recuperate href value
        var href = $(this).attr('href');
        var message = $(this).data('confirm');

        //pop up
        swal({
            title: "Are you sure  you want to delete this category??",
            text: message, 
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Your category has been deleted!", {
              icon: "success",
            });
            window.location.href = href;
          } else {
            swal("Your category is not deleted");
          }
        });
    });
});
    </script>

@endsection