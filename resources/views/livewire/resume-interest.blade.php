<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h5 class="m-0">Interests</h5>
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

            <form id="store" wire:submit.prevent="store">
                <div class="row">
                    <div class="col-12">
                        <div class="group mb-3">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter your title" wire:model="title">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            </form>

            <table class="table-bordered mt-5 table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($interests as $interest)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $interest->title }}</td>
                            <td>
                                <button wire:click="delete({{ $interest->id }})" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
