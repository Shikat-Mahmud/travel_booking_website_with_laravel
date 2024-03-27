
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="mb-4">Delete Account</h5>
                    <p class="mt-1 text-sm text-gray-600">
                        Once your account is deleted, all of its resources and data will be permanently deleted.
                        Before deleting your account, please download any data or information that you wish to retain.
                    </p>

                    <form method="post" action="{{ route('profile.destroy') }}" enctype="multipart/form-data">
                        @csrf
                        @method('delete')
                        <a class="btn btn-danger" onclick="return confirm('Are you sure?')"
                            href="{{ route('profile.destroy', $user->id) }}">Delete</a>
                        <a class="btn btn-secondary" href="{{ route('profile.edit') }}">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
   
