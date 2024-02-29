<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h5 class="m-0">Education</h5>
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
            <form id="update" wire:submit.prevent="update({{ $edu_id }})">
                <div class="row">
                    <div class="col-6">
                        <div class="group mb-3">
                            <label for="certification">Certification:</label>
                            <input type="text" class="form-control" id="certification" name="certification" placeholder="Enter your certification" wire:model="certification">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="group mb-3">
                            <label for="institution">Institution:</label>
                            <input type="text" class="form-control" id="institution" name="institution" placeholder="Enter your institution" wire:model="institution">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="group mb-3">
                            <label for="start_year">Start Year:</label>
                            <input type="text" class="form-control" id="start_year" name="start_year" placeholder="Enter your start year" wire:model="start_year">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="group mb-3">
                            <label for="end_year">End Year:</label>
                            <input type="text" class="form-control" id="end_year" name="end_year" placeholder="Enter your end year" wire:model="end_year">
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
                            <label for="certification">Certification:</label>
                            <input type="text" class="form-control" id="certification" name="certification" placeholder="Enter your certification" wire:model="certification">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="group mb-3">
                            <label for="institution">Institution:</label>
                            <input type="text" class="form-control" id="institution" name="institution" placeholder="Enter your institution" wire:model="institution">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="group mb-3">
                            <label for="start_year">Start Year:</label>
                            <input type="text" class="form-control" id="start_year" name="start_year" placeholder="Enter your start year" wire:model="start_year">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="group mb-3">
                            <label for="end_year">End Year:</label>
                            <input type="text" class="form-control" id="end_year" name="end_year" placeholder="Enter your end year" wire:model="end_year">
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
                        <th>Certification</th>
                        <th>Institution</th>
                        <th>Duration</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($edus as $edu)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $edu->certification }}</td>
                            <td>{{ $edu->institution }}</td>
                            <td>{{ $edu->start_year }} - {{ $edu->end_year }}</td>
                            <td>
                                <button wire:click="edit({{ $edu->id }})" class="btn btn-primary btn-sm">Edit</button>
                                <button wire:click="delete({{ $edu->id }})" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
