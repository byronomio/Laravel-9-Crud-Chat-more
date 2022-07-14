@extends('layouts/head')
@section('title', 'Online Users')
@section('content')
    <div class="w-100">
        <div class="card p-0">
         
            <div class="card-body">
                <ul id="users">
                </ul>
            </div>
        </div>
    @endsection
    @push('scripts')
        <script>
            // const axios = require('axios');
            window.axios.get('/api/users?api_token=eZFxukZVdIC6CqoQMoGUX42viQ6IBkl9zRtXYAV7uJSpbOuoUJiqEuV2JIst')
            
                .then((response) => {
                    const usersElement = document.getElementById('users');
                    let users = response.data;
                    users.forEach((user, index) => {
                        let element = document.createElement('li');
                        element.setAttribute('id', user.id);
                        element.innerText = user.name;
                        usersElement.appendChild(element);
                    });
                });
        </script>
        <script>
            Echo.channel('users')
                .listen('UserCreated', (e) => {
                    const usersElement = document.getElementById('users');
                    let element = document.createElement('li');
                    element.setAttribute('id', e.user.id);
                    element.innerText = e.user.name;
                    usersElement.appendChild(element);
                })
                .listen('UserUpdated', (e) => {
                    const element = document.getElementById(e.user.id);
                    element.innerText = e.user.name;
                })
                .listen('UserDeleted', (e) => {
                    const element = document.getElementById(e.user.id);
                    element.parentNode.removeChild(element);
                });
        </script>
    @endpush
