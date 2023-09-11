@extends('home');
@section('category')

    <div class="container">
        <div class="card mt-5">
            <h5 class="card-header">Categoyr List</h5>


            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 d-flex justify-content-end mb-2">
                    <a type="submit" class="btn btn-primary content-add-btn " href="{{ route('admin.category.create') }}">Add
                        Category</a>
                </div>
            </div>


            <?php
            $ses_msg = Session::has('success');
            if (!empty($ses_msg)) {
                ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <p><i class="fa fa-bell-o fa-fw"></i> <?php echo Session::get('success'); ?></p>
            </div>
            <?php
            }// 
            $ses_msg = Session::has('error');
            if (!empty($ses_msg)) {
                ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <p><i class="fa fa-bell-o fa-fw"></i> <?php echo Session::get('error'); ?></p>
            </div>
            <?php
            }// ?>


            <div class="table-responsive text-nowrap">
                <table class="table">
                    {{-- @if (Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif --}}
                    <thead class="table-light">
                        <tr>
                            <th>Serial</th>
                            <th>Name</th>

                            <th>status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if ($categoryList)
                            <?php $sl = 1; ?>
                            @foreach ($categoryList as $item)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $item->category_name }}</td>
                                    
                                    @if ($item->status == 'active')
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    @else
                                        <td><span class="badge bg-label-danger me-1">Inactive</span></td>
                                    @endif
                                    <td>

                                        <a href="{{ route('admin.category.edit', $item->id) }}"
                                            class="btn  btn-info bx bx-edit-alt">edit</a>
                                        <a href="{{ route('admin.category.delete', $item->id) }}"
                                            class="btn  btn-danger bx bx-trash" onclick="return confirm('Are You sure want to delete..?')">delete</a>


                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
