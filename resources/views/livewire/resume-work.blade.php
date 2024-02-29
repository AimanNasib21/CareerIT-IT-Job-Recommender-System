<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h5 class="m-0">Work Experience</h5>
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
            <form id="update" wire:submit.prevent="update({{ $work_id }})">
                <div class="row">
                    <div class="col-6">
                        <div class="group mb-3">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter your title" wire:model="title">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="group mb-3">
                            <label for="company">Company:</label>
                            <input type="text" class="form-control" id="company" name="company" placeholder="Enter your company" wire:model="company">
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
                <div class="group mb-3">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Enter your description" wire:model="description"></textarea>
                </div>
                <div class="group mb-3">
                    <label for="achievement">Achievements:</label>
                    <textarea class="form-control" id="achievement" name="achievement" placeholder="Enter your achievements" wire:model="achievements"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
                <button wire:click="cancel" class="btn btn-danger btn-block">Cancel</button>
            </form>
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
                            <label for="company">Company:</label>
                            <input type="text" class="form-control" id="company" name="company" placeholder="Enter your company" wire:model="company">
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
                <div class="group mb-3">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Enter your description" wire:model="description"></textarea>
                </div>
                <div class="group mb-3">
                    <label for="achievement">Achievements:</label>
                    <textarea class="form-control" id="achievement" name="achievement" placeholder="Enter your achievements" wire:model="achievements"></textarea>
                </div>

                <div class=" add-input">
                    <div class="row mb-3">
                        <div class="col-8">
                            <label for="technologies">Technologies:</label>
                            <input type="text" class="form-control" wire:model="technologies.0" placeholder="Enter Technologies">
                        </div>
                        <div class="col-4">
                            <br>
                            <button class="btn text-white btn-info" wire:click.prevent="add({{$i}})">Add</button>
                        </div>
                    </div>
                </div>

                @foreach($inputs as $key => $value)
                    <div class=" add-input">
                        <div class="row mb-3">
                            <div class="col-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Name" wire:model="technologies.{{ $value }}">
                                    @error('technologies.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                            </div>
                        </div>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
            @endif

            <table class="table-bordered mt-5 table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title - Company</th>
                        <th>Duration</th>
                        <th>Description - Achievements</th>
                        <th>Technologies</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($works as $work)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $work->title }} - {{ $work->company }}</td>
                            <td>{{ $work->start_year }} - {{ $work->end_year }}</td>
                            <td>{{ $work->description }} - {{ $work->achievements }}</td>
                            <td>
                                @php
                                    // Assuming $data contains the JSON string fetched from the database
                                    $jsonString = $work->technologies;
                                    // Decode the JSON string into an array
                                    $arrayTechnologies = json_decode($jsonString);
                                @endphp
                                @forelse ($arrayTechnologies as $technology)
                                    <span class="badge bg-primary">{{ $technology }}</span>
                                @empty
                                    <span class="badge bg-danger">No Technologies</span>
                                @endforelse
                            </td>
                            <td>
                                <button wire:click="edit({{ $work->id }})" class="btn btn-primary btn-sm">Edit</button>
                                <button wire:click="delete({{ $work->id }})" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
