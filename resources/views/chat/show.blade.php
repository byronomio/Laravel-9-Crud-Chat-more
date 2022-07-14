@extends('layouts/head')

@section('title', 'Chat')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="w-100">
                <div class="card" style="border: 1px solid #28c76f;">
                    <div class="d-flex">
                        <div class="col-10" style="border-right: 1px solid #28c76f;">
                            <div class="row">
                                <div class="col-12 w-100 p-2">
                                    <ul id="messages" class="list-unstyled overflow-auto"
                                        style="height:100vh;max-height:340px;">
                                    </ul>
                                </div>
                            </div>
                            <div class="entermessage p-2">
                                <form class="m-0">
                                    <div class="row">
                                        <div class="col-10 p-0">
                                            <input id="message" class="form-control w-100 rounded-0" type="text">
                                        </div>
                                        <div class="col-2 p-0">
                                            <button id="send" type="submit"
                                                class="btn btn-primary w-100 rounded-0">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-2 pt-2">
                            <p><strong>Online Now</strong></p>
                            <ul id="users" class="list-unstyled overflow-auto text-info mb-0" style="height:45vh">
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
    @push('scripts')
        <script>
      
            Echo.join('chat')
                .here((users) => {
                    users.forEach((user, index) => {
                        const usersElement = document.getElementById('users');
                        let element = document.createElement('li');
                        element.setAttribute('id', user.id);
                        element.innerText = user.name;
                        usersElement.appendChild(element);
                    });
                })
                .joining((user) => {
                    const usersElement = document.getElementById('users');
                    let element = document.createElement('li');
                    element.setAttribute('id', user.id);
                    element.innerText = user.name;
                    usersElement.appendChild(element);
                })
                .leaving((user) => {
                    const element = document.getElementById(user.id);
                    element.parentNode.removeChild(element);
                })
                .listen('MessageSent', (e) => {
                    const messageElement = document.getElementById('messages');
                    let element = document.createElement('li');
                    element.innerText = e.user.name + ': ' + e.message;
                    messageElement.appendChild(element);
                });
        </script>
        <script>
            const messageElement = document.getElementById('message');
            const sendElement = document.getElementById('send');
            sendElement.addEventListener('click', (e) => {
                e.preventDefault();
                window.axios.post('/chat/message', {
                    message: messageElement.value,
                });
                messageElement.value = '';
            });
        </script>
    @endpush

    <style scoped>
        input#message {
            border-top-left-radius: 5px !important;
            border-bottom-left-radius: 5px !important;
        }

        #messages li {
            background: #161d31;
            padding: 5px 10px;
            border-radius: 5px;
            margin-bottom: 4px;
            color: #33c76f;
        }

        button#send {
            border-top-right-radius: 5px !important;
            border-bottom-right-radius: 5px !important;
        }

        #users li {
            padding: 5px 10px;
            background: #161e31;
            color: #33c76f;
            font-weight: bold;
            border-radius: 5px;
            margin-bottom: 5px;
        }
    </style>
