@extends('layout.Navbar')
@section('user')
    <button type="submit" class="btn btn-primary" id="userModalbtn">Thêm</button>
@endsection
@section('Users')
    CHỈNH SỬA TÀI KHOẢN
@endsection
@section('main')
    {{-- Container --}}
    <div class="container">
        <div class="row">
            <div>
                <form action="{{ route('UpdateUser') }}" method="POST" >
                    @csrf
                    <div class="mb-3 mt-3">
                        <input type="text" name="id" class="form-control" id="UserId"
                            value="{{ old('name', $user->id) }}" hidden>
                        Tên
                        <input type="text" name="name" class="form-control" id="UserName"
                            value="{{ old('name', $user->name) }}" >
                        Email
                        <input type="text" name="email" class="form-control" id="UserEmail"
                        value="{{ old('email', $user->email) }}"readonly>
                        Loại tài khoản hiện tại
                        <input type="text" name="" class="form-control" id="" value="{{ old('role', $user->rolename) }}" readonly>
                        Loại tài khản mới
                        <select name="role" class="form-control mb-2"  id="Roleid">
                            @foreach ($role as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                        +84
                        <input type="text" class="form-control" name="phone" id="UserPhone"
                        value="{{ old('phone', $user->phone) }}">
                        Địa chỉ
                        <input type="text" class="form-control" name="address" id="UserPhone"
                        value="{{ old('address', $user->address) }}"> 

                    </div>
                        <button type="submit" class="btn btn-primary" id="submitUser">xác nhận</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        
    </script>


    @include('main.users.js')
@endsection
