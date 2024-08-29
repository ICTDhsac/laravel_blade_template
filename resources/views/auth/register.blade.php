<x-layout>
    <h1 class="title">Register Page</h1>

    <div class="mx-auto max-w-screen-sm card">

        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="username">Username</label>
                <input type="text" name="username" value="{{old('username')}}" class="input">
                <p id="usernameError" class="error"></p>
            </div>
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="input">
                <p id="emailError" class="error"></p>
            </div>
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="input">
                <p id="passwordError" class="error"></p>
            </div>
            <div class="mb-8">
                <label for="password_confirmation">Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="input">
            </div>

            <button class="btn">Register</button>

        </form>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);

            sendAjaxRequest('{{ route("register") }}', 'POST', formData, 
                function(data) {
                    console.log(data);
                    // Handle success
                    // window.location.href = data.redirect || '/';
                }, 
                function(error) {
                    console.log(error)
                    // Handle validation errors
                    if (error.errors) {
                        Object.keys(error.errors).forEach(field => {
                            document.getElementById(`${field}Error`).textContent = error.errors[field][0];
                            document.querySelector(`input[name=${field}]`).classList.add('!ring-red-500');
                        });
                    } else {
                        console.error('An unexpected error occurred:', error);
                    }
                }
            );
        });
    </script>
    

</x-layout>