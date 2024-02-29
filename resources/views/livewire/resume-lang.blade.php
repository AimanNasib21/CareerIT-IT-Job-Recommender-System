<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h5 class="m-0">Language</h5>
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
                <form id="update" wire:submit.prevent="update({{ $lang_id }})">
                    <div class="row">
                        <div class="col-6">
                            <div class="group mb-3">
                                <label for="language">Language:</label>
                                <input type="text" class="form-control" id="language" name="language" placeholder="Enter your language" wire:model="language">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="group mb-3">
                                <label for="level">Level:</label>
                                <select class="form-control" id="level" name="level" wire:model="level">
                                    <option value="">Select level</option>
                                    <option value="beginner">Beginner</option>
                                    <option value="intermediate">Intermediate</option>
                                    <option value="advanced">Advanced</option>
                                </select>
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
                                <label for="language">Language:</label>
                                <input type="text" class="form-control" id="language" name="language" placeholder="Enter your language" wire:model="language">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="group mb-3">
                                <label for="level">Level:</label>
                                <select class="form-control" id="level" name="level" wire:model="level">
                                    <option value="">Select level</option>
                                    <option value="beginner">Beginner</option>
                                    <option value="intermediate">Intermediate</option>
                                    <option value="advanced">Advanced</option>
                                </select>
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
                        <th>Language</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($langs as $lang)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $lang->language }}</td>
                            <td>{{ $lang->level }}</td>
                            <td>
                                <button wire:click="edit({{ $lang->id }})" class="btn btn-primary btn-sm">Edit</button>
                                <button wire:click="delete({{ $lang->id }})" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
