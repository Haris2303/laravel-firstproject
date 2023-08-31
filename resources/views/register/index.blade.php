@extends('layouts.main')

@section('main')
    <div class="row justify-content-center">
        <div class="col-lg-6 shadow-sm rounded-lg">
            <main class="form-registration w-100 m-auto">
                <h1 class="h3 my-5 fw-normal text-center">Register</h1>
                <form>
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control rounded-top" id="name" placeholder="name">
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control" id="username" placeholder="username">
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="name@example.com">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control rounded-bottom" id="password2" placeholder="password2">
                        <label for="password2">Konfirmasi Password</label>
                    </div>
                    <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Register</button>
                </form>
                <div class="my-3 text-center">
                    <small>Have an Account? <a href="/login" class="text-decoration-none">Login!</a></small>
                </div>
            </main>
        </div>
    </div>
@endsection
