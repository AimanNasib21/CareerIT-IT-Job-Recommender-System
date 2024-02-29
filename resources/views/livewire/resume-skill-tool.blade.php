<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h5 class="m-0">Skill & Tools</h5>
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
            @else

            <form id="store" wire:submit.prevent="store">
                <div class="row">
                    <div class="col-4">
                        <div class="group mb-3">
                            <label for="type">Type:</label>
                            <select class="form-control" id="type" name="type" wire:model="type">
                                <option value="">Select type</option>
                                <option value="frontend">Frontend</option>
                                <option value="backend">Backend</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="group mb-3">
                            <label for="technology">Technology:</label>
                            <input type="text" class="form-control" id="technology" name="technology" placeholder="Enter your technology" wire:model="technology">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="group mb-3">
                            <label for="percentage">Percentage:</label>
                            <input type="number" class="form-control" id="percentage" name="percentage" placeholder="Enter your percentage" wire:model="percentage">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            </form>
            @endif

            <table class="table-bordered mt-5 table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Type</th>
                        <th>Technologies</th>
                        <th>Percentage</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skills as $skill)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $skill->type }}</td>
                            <td>{{ $skill->technology }}</td>
                            <td>{{ $skill->percentage }}</td>
                            <td>
                                <button wire:click="delete({{ $skill->id }})" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
