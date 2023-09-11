@extends('home');
@section('user')

    <div class="container">
        <div class="card mt-5">
            <h5 class="card-header">User List</h5>


            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 d-flex justify-content-end mb-2">
                    <a type="submit" class="btn btn-primary content-add-btn " href="{{ route('admin.user.create') }}">Add
                        User</a>
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
                            <th>Email</th>
                            <th>Type</th>

                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if ($userList)
                            <?php $sl = 1; ?>
                            @foreach ($userList as $item)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    {{-- <td>{{ $item->phone }}</td> --}}
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->user_type }}</td>
                                   
                                    <td>

                                        <a href="{{ route('admin.user.edit', $item->id) }}"
                                            class="btn  btn-info bx bx-edit-alt">edit</a>
                                        <a href="{{ route('admin.user.delete', $item->id) }}"
                                            class="btn  btn-danger bx bx-trash" onclick="return confirm('Are You sure want to delete..?')">delete</a>



                                        {{-- <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="bx bx-trash me-1"></i>
                                                    Delete</a>
                                            </div>
                                        </div> --}}
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
