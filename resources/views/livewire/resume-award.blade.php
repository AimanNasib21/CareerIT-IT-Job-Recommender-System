<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h5 class="m-0">Awards</h5>
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

            @if ($updateMode)
                <form id="update" wire:submit.prevent="update({{ $award_id }})">
                    <div class="row">
                        <div class="col-6">
                            <div class="group mb-3">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter your title" wire:model="title">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="group mb-3">
                                <label for="description">Description:</label>
                                <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter your description" wire:model="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
                <button wire:click="cancel" class="btn btn-danger btn-block">Cancel</button>
            @else
                <form id="store" wire:submit.prevent="store">
                    <div class="row">
                        <div class="col-6">
                            <div class="group mb-3">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter your title" wire:model="title">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="group mb-3">
                                <label for="description">Description:</label>
                                <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter your description" wire:model="description"></textarea>
                            </div>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            @endif

            <table class="table-bordered mt-5 table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($awards as $award)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $award->title }}</td>
                            <td>{{ $award->description }}</td>
                            <td>
                                <button wire:click="edit({{ $award->id }})" class="btn btn-primary btn-sm">Edit</button>
                                <button wire:click="delete({{ $award->id }})" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
