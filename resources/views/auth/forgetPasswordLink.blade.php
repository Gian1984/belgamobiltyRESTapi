<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.17/tailwind.min.css" integrity="sha512-yXagpXH0ulYCN8G/Wl7GK+XIpdnkh5fGHM5rOzG8Kb9Is5Ua8nZWRx5/RaKypcbSHc56mQe0GBG0HQIGTmd8bw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">




</head>
<body class="antialiased">

<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
                            <div class="max-w-md w-full space-y-8">
                                <div>
                                    <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow" />
                                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                                        Insert new password
                                    </h2>
                                    <p class="mt-2 text-center text-sm text-gray-600">
                                        Please fill the following field
                                    </p>
                                </div>
                                <form class="mt-8 space-y-6" action="{{ route('reset.password.post') }}" method="POST">
                                    @csrf
<!--                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />-->
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="rounded-md shadow-sm -space-y-px">
                                        <div>
                                            <label for="email-address" class="sr-only">Email address</label>
                                            <input id="email-address" name="email" type="email" autocomplete="email" required="" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address" />
                                        </div>
                                        <div>
                                            <label for="password" class="sr-only">Password</label>
                                            <input id="password" name="password" type="password" required="" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password" />
                                        </div>
                                        <div>
                                            <label for="password" class="sr-only">Password</label>
                                            <input id="password-confirm" name="password_confirmation" type="password" autocomplete="current-password" required="" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password" />
                                        </div>
                                    </div>

                                    <div>
                                        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <span class="absolute left-0 inset-y-0 flex items-center pl-3"></span>
                                            Change password
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



</body>
</html>
