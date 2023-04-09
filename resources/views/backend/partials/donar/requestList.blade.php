@extends('master')
@section('main')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Received Requests</h5>
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    {{ session()->get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- error message --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- @dd($allPatients) --}}
            <!-- Table with hoverable rows -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Patient/Admin Names</th>
                        <th scope="col">Patient/Admin Emails</th>
                        <th scope="col">Patient Mobiles</th>
                        <th scope="col">Reason</th>
                        <th scope="col">Blood need date</th>
                        <th scope="col">Action</th>
                        <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brTableMyId as $key =>$item)

                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        @if ($item->patient_id == !null)
                        <td>{{ $item->patients->patient_name }}</td>
                        @else
                        <td>Admin</td>
                        @endif
                        
                        <td>{{ App\Models\User::where('id',$item->user_id)->pluck('email')->first() }}</td>

                        @if ($item->patient_id == !null)
                        <td>{{ $item->patients->patient_mobile }}</td>
                        @else
                        <td>Null</td>
                        @endif

                        

                        @if ($item->patient_id == !null)
                        <td>{{ $item->patients->patient_reason }}</td>
                        @else
                        <td>Null</td>
                        @endif

                        
                        


                        <td>{{ $item->created_at }}</td>



                        <td>
                            @if ($item->action == 'confirmed')

                            <a href="#" onclick="return alert('You have already confirmed this request!')" class="btn btn-sm btn-success text-white"> Confirmed <i
                                class="bi bi-check-all"></i></a>
                            @else



                                @if ($item->patient_id == !null)

                                
                                <a href="{{ route('confirm.request',$item->user_id) }}" class="btn btn-sm btn-primary">Confirm Request</a>
                            
                                @else
                                <a href="{{ route('confirm.request',$item->user_id) }}" class="btn btn-sm btn-primary">Confirm Request</a>
                            
                                @endif
                            
                            
                            @endif



                            <a href="{{ route('donar.delete.request',$item->user_id) }}" class="btn btn-sm btn-danger mt-2">Delete Request</a>

                        </td>
                        @if ($item->patient_id == !null)
                        <td>{{ $item->patients->patient_address }}</td>
                        @else
                        <td>Null</td>
                        @endif
                    </tr>
                    
                        
                   
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $bank_donar->links() }} --}}
            <!-- End Table with hoverable rows -->
        </div>
    </div>
@endsection
