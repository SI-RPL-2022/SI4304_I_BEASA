<x-app-layout>
    <x-slot name="header">
        <h2>Feedback</h2>
        <p>
            Please provide your feedback below:
        </p>
        @if (session('success'))
            <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger border-left-danger" role="alert">
                <ul class="pl-4 my-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('feedback.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label>How do you rate your overall experience?</label>
                    <p>
                        <label class="radio-inline">
                            <input type="radio" name="experience" id="radio_experience" value="bad">
                            Bad
                        </label>

                        <label class="radio-inline">
                            <input type="radio" name="experience" id="radio_experience" value="average">
                            Average
                        </label>

                        <label class="radio-inline">
                            <input type="radio" name="experience" id="radio_experience" value="good">
                            Good
                        </label>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="comments">
                        Comments:</label>
                    <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments"
                        maxlength="6000" rows="7"></textarea>
                </div>
            </div>
            @if (!Auth::check())
                {{-- <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="name">
                            Your Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="email">
                            Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div> --}}
            @endif

            <div class="row">
                <div class="col-sm-12 form-group">
                    <button type="submit" class="btn btn-lg btn-secondary btn-block">Post </button>
                </div>
            </div>

        </form>

        <hr>

        <div class="row">
            <div class="col-sm-12">
                <h3>All Feedback</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            {{-- <th>Name</th>
                            <th>Email</th> --}}
                            <th>Experience</th>
                            <th>Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @foreach ($feedbacks as $feedback)
                            <tr>
                                <td>{{ ++$no }}</td>
                                {{-- @if ($feedback->id_user)
                                    <?php $user = \App\Models\User::find($feedback->id_user); ?>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                @else
                                    <td>{{ $feedback->name ? $feedback->name : 'Anonymous' }}</td>
                                    <td>{{ $feedback->email ? $feedback->email : 'Anonymous' }}</td>
                                @endif --}}
                                <td>{{ $feedback->rate }}</td>
                                <td>{{ $feedback->feedback }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>



            <div id="success_message" style="width:100%; height:100%; display:none; ">
                <h3>Posted your feedback successfully!</h3>
            </div>
            <div id="error_message" style="width:100%; height:100%; display:none; ">
                <h3>Error</h3>
                Sorry there was an error sending your form.

            </div>
    </x-slot>
    <section class="section mt-4">
    </section>
</x-app-layout>
