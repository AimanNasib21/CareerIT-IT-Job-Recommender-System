<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h5 class="m-0">Personal Information</h5>
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form wire:submit.prevent="saveOrUpdate">
                <div class="row">
                    <div class="col-6">
                        <div class="group mb-3">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" readonly wire:model="name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="group mb-3">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" readonly wire:model="email">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="group mb-3">
                            <label for="title">Job Title:</label>
                            <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Enter your job title" wire:model="job_title">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="group mb-3">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" id="phone" placeholder="Enter your phone number" wire:model="phone">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="group mb-3">
                            <label for="linkedin">LinkedIn:</label>
                            <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Enter your LinkedIn profile" wire:model="linkedin">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="group mb-3">
                            <label for="github">GitHub:</label>
                            <input type="text" class="form-control" id="github" name="github" placeholder="Enter your GitHub profile" wire:model="github">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="group mb-3">
                            <label for="codepen">CodePen:</label>
                            <input type="text" class="form-control" id="codepen" name="codepen" placeholder="Enter your CodePen profile" wire:model="codepen">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="group mb-3">
                            <label for="website">Website:</label>
                            <input type="text" class="form-control" id="website" name="website" placeholder="Enter your website" wire:model="website">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="group mb-3">
                        <label for="summary">Summary:</label>
                        <textarea class="form-control" id="summary" name="summary" placeholder="Enter your summary" wire:model="summary"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
</div>
