<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h2>Contact Us</h2>
            </div>
            <div class="card-body">
                <!-- Formulario de contacto -->
                <form action="{{ route('contact.form') }}" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="message" class="col-md-4 col-form-label text-md-end text-start">Message</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" required></textarea>
                            @error('message')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" style="background-color: #007bff; border: none; color: white; padding: 10px 20px; font-size: 16px; border-radius: 4px;">
                                Send
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>