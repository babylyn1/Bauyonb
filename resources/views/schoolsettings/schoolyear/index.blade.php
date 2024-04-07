@extends('layouts.master')
@section('breadcrumbs')
    <ul class="navbar-nav mr-lg-2">
        <li class="nav-item ml-0">
            <h4 class="mb-0">SCHOOL YEAR</h4>
        </li>
        <li class="nav-item">
            <div class="d-flex align-items-baseline">
                <p class="mb-0">KCCF SMS</p>
                <i class="typcn typcn-chevron-right"></i>
                <p class="mb-0">School Year</p>
            </div>
        </li>
    </ul>
@endsection
@section('content')
<div class="card card-custom card-fit card-border">

            	<div class="card-header">
            		<div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-pin text-primary"></i>
                        </span>
            			<h3 class="card-label">
            				School Year
            				<small>sub title</small>
            			</h3>
            		</div>
                    <div class="col">
                            <div class="float-right">
                                <a type="button" class="btn btn-success" href="{{ route('schoolyear.create') }}">Add School Year</a>
                            </div>
                        </div>
                        </div>
            	<div class="card-body pt-2">
            	
            	</div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-striped project-orders-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>School Year</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $num = 1; @endphp
                                @foreach ($items as $item)
                                    <tr id="row{{ $item->id }}">
                                        <td>{{ $num }}</td>
                                        <td>{{ $item->startyear . ' - ' . $item->endyear }}</td>
                                        <td>{{ $item->desc }}</td>
                                        <td>
                                            <a href="{{ route('schoolyear.edit', ['schoolyear' => $item->id]) }}">
                                                <button class="btn btn-sm btn-success"><i class="flaticon-edit"></i></button>
                                            </a>
                                            <button class="btn btn-sm btn-danger btndelete" data-url="{{ route('schoolyear.destroy', ['schoolyear' => $item->id]) }}" data-id="{{ $item->id }}">
                                                <i class="flaticon-delete"></i>
                                            </button>
                                        </td>
                                    </tr>
                                 
                                    @php $num++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                        {{ $items->links() }} <!-- Pagination links -->
                    </div>
                </div>
            </div>

   
@endsection

@section('css')
@endsection
@section('script')
    @if(session('function'))
        @if(session('function') == 'store')
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "School Year successfully Saved",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @else
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "School Year successfully Updated",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @endif

        <?php session()->forget('function'); ?>
    @endif
@endsection